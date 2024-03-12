<?php

namespace App\Http\Controllers;

use App\Model\AdmintoAgentfund;
use App\Model\AgenttoClientfund;
use App\Model\AgenttoclientfundHistory;
use App\Model\AdintoagnetfundHistory;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use Image;
use Intervention\Image\ImageManager;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function user()
    {
        return Auth::user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $agent = User::with('agentfund')->findOrFail(Auth::user()->id);
        //dd($agent);
        return view('agent.dashboard', compact('agent'));

    }

    public function agentProfile($id)
    {
        $agent = User::findOrFail($id);
       // dd($agent);
        return view('agent.pages.agentProfile');
    }

    public function getAgentToClient()
    {
        $clients = User::where('roleid', 1)
                    ->where('useragentcode', Auth::user()->agentcode)                
                    ->get();

              //dd($clients );      
        return view('agent.pages.agenttoclientFund', compact('clients'));
    }

    public function postAgentToClient(Request $request)
    {
        //dd($request->all());
        $checkClient = AgenttoClientfund::where('to_client', $request->to_client)->first();
        $agentAmount = AdmintoAgentfund::where('to_agent', Auth::user()->id)->first();

        if($agentAmount->amount > $request->amount) {
            if($checkClient == null){
                $agentfund = new AgenttoClientfund;

                $agentfund->from_agent = Auth::user()->id;
                $agentfund->to_client = $request->to_client;
                $agentfund->amount = $request->amount;

                if ($agentfund->save()) {

                    $clientfundHistory = new AgenttoclientfundHistory;

                    $clientfundHistory->from_agent = Auth::user()->id;
                    $clientfundHistory->to_client = $request->to_client;
                    $clientfundHistory->amount = $request->amount;
                    $clientfundHistory->save();
                    $agentAmount->amount = $agentAmount->amount - $request->amount;
                    $agentAmount->save();
                }
                
                return redirect()->route('agent.dashboard')->with('status', 'Fund Transfer Successfully');

            }else{
                $checkClient->amount = $checkClient->amount + $request->amount;

                if ($checkClient->save()) {

                    $clientfundHistoryU = new AgenttoclientfundHistory;
                    $clientfundHistoryU->from_agent = Auth::user()->id;
                    $clientfundHistoryU->to_client = $request->to_client;
                    $clientfundHistoryU->amount = $request->amount;
                    $clientfundHistoryU->save();

                    $agentAmount->amount = $agentAmount->amount - $request->amount;
                    $agentAmount->save();
                }
            }

                return redirect()->route('agent.dashboard')->with('status', 'Fund Transfer Successfully');
        }else{
            return redirect()->route('agent.dashboard')->with('status', 'Fund Not Available');
        }
    }

    public function agentToClientFundHistory(Request $request)
    {
        $key = $request->key;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($key != null && $from_date == '' && $to_date == '') {
           $clientFundhistory = AgenttoclientfundHistory::orderBy('created_at', 'desc')
                ->orWhereHas('clientuserhistory', function($q) use ($key){
                    return $q->where('name','like','%'. $key . '%');})
                ->orWhereHas('clientuserhistory', function($q) use ($key){
                    return $q->where('usercode','like','%'. $key . '%');})
                ->get();
        }elseif ($key == '' && $from_date != null && $to_date != null) {
            $clientFundhistory = AgenttoclientfundHistory::orderBy('created_at', 'desc')
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->get();
        }else{
            $clientFundhistory = AgenttoclientfundHistory::orderBy('created_at', 'desc')
                               ->where('from_agent',Auth::user()->id)
                               ->get();

                             //  dd($clientFundhistory);
        }

        return view('agent.pages.clientFundHistory', compact('clientFundhistory'));
    }


    public function profileUpdate(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            //'mobile' => 'required|string|max:255|unique:users,mobile,' . $this->user()->id,
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg'

        ]);

        if ($this->user()->roleid == 2) {
            $agent = User::find(Auth::user()->id);

            // for agent image update
            $agentImg = $agent->profileimage;

            if($profileimage = $request->file('profileimage')){
                $agentImg = rand(10,100) . time().'.'.$profileimage->getClientOriginalExtension();
                $location = 'coinbase/agent/'. $agentImg;
                Image::make($profileimage)->resize(600 , 600)->save($location);
                $oldFilename = $agent->profileimage;
                $agent->profileimage = $agentImg;
                Storage::delete('coinbase/agent/'. $oldFilename);
            }
            // agent info update
            $agent->update($request->except('profileimage')+['profileimage' => $agentImg]);

            return redirect()->route('agent.dashboard')->with('status', 'Profile  Updated Successfully');
        }else{
            $client = User::find(Auth::user()->id);

            // for client image update
            $clientImg = $client->profileimage;

            if($profileimage = $request->file('profileimage')){
                $clientImg = rand(10,100) . time().'.'.$profileimage->getClientOriginalExtension();
                $location = 'coinbase/client/'. $clientImg;
                Image::make($profileimage)->resize(600 , 600)->save($location);
                $oldFilename = $client->profileimage;
                $client->profileimage = $clientImg;
                Storage::delete('coinbase/client/'. $oldFilename);
            }
            // client info update
            $client->update($request->except('profileimage')+['profileimage' => $clientImg]);

            return redirect()->route('get.update.profile')->with('status', 'Profile Successfully Updated');
        }
        
        
    }

    public function passwordUpdate(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|same:new_password',
        ]);

        if ($this->user()->roleid == 2) {
            $data = $request->old_password;
    
            $client = $this->user();
            if(!\Hash::check($data, $client->password)){
                 return back()
                            ->with('error','The specified password does not match the database password');
            }else{
               $client->password = bcrypt($request->new_password);
               $client->save();
            }
            return redirect()->route('agent.dashboard')->with('successp', 'Agent password have been changed successfully !');
        }else{
            $data = $request->old_password;
    
            $client = $this->user();
            if(!\Hash::check($data, $client->password)){
                 return back()
                            ->with('error','The specified password does not match the database password');
            }else{
               $client->password = bcrypt($request->new_password);
               $client->save();
            }
            return redirect()->route('get.update.profile')->with('successp', 'Client password have been changed successfully !');
        }

        
    }
    public function admintoagentFundHistory(){

            $adminFundhistory = AdintoagnetfundHistory::orderBy('created_at', 'desc')
                               ->where('to_agent',Auth::user()->id)
                               ->get();
                             // dd($adminFundhistory);
       

        return view('agent.pages.admintoagent',compact('adminFundhistory'));
    }
    public function agentcommission(){
        
                  $result=DB::table('a_g_commisions')
                        ->join('users', 'users.usercode', '=', 'a_g_commisions.referrercode')
                        ->where('agentscode',Auth::user()->agentcode)
                         ->select('users.name','users.mobile','a_g_commisions.referrercode',DB::raw('sum(amount) as total'))
                        ->groupBy('users.name','users.mobile','a_g_commisions.referrercode')
                        ->get();
                      // dd($result);
        return view('agent.pages.ref_commission',compact('result'));
    }

    public function agentlist(){
        return view('agent.pages.referlistr');
    }
    public function agenthistory(){
        $result=DB::table('a_g_commisions')
               ->join('users', 'users.usercode', '=', 'a_g_commisions.referrercode')
               ->where('agentscode',Auth::user()->agentcode)
               ->select('a_g_commisions.*', 'users.name','users.mobile')
               ->orderBy('created_at','DESC')
               ->get();

         // dd($result);
        return view('agent.pages.comhistory',compact('result'));
    }
}
