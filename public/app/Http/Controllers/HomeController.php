<?php

namespace App\Http\Controllers;

use App\Model\AgenttoClientfund;
use App\Model\AdmintoAgentfund;
use App\Model\BetHold;
use App\Model\BetTable;
use App\Model\BetWin;
use App\Model\ClientWithdraw;
use App\Model\ClientTransfer;
use App\User;
use App\Commision;
use App\AGCommision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $bets = BetTable::all();

        $currentDate = date('Y-m-d');
        $count1 = BetHold::where('clientid', Auth::user()->id)
                        ->where('betid', 1)
                        ->whereDate('created_at', $currentDate)
                        ->get()->sum('quantity');
        $count2 = BetHold::where('clientid', Auth::user()->id)
                        ->where('betid', 2)
                        ->whereDate('created_at', $currentDate)
                        ->get()->sum('quantity');
        $count3 = BetHold::where('clientid', Auth::user()->id)
                        ->where('betid', 3)
                        ->whereDate('created_at', $currentDate)
                        ->get()->sum('quantity');
        $count4 = BetHold::where('clientid', Auth::user()->id)
                        ->where('betid', 4)
                        ->whereDate('created_at', $currentDate)
                        ->get()->sum('quantity');
        $count5 = BetHold::where('clientid', Auth::user()->id)
                        ->where('betid', 5)
                        ->whereDate('created_at', $currentDate)
                        ->get()->sum('quantity');

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($request->key == 2) {
            if ($from_date != null && $to_date != null) {
                $betWin = BetWin::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date)
                    ->get();
                $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)->get();
            }else{
                $betWin = BetWin::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)->get();
                $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)->get();
            }
        }elseif ($request->key == 1) {
            if ($from_date != null && $to_date != null) {
                $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date)
                    ->get();
                $betWin = BetWin::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)->get();
            }else{
                $betWin = BetWin::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)->get();
                $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                    ->where('clientid', Auth::user()->id)->get();
            }
        }else{
            $betWin = BetWin::orderBy('created_at', 'DESC')
                ->where('clientid', Auth::user()->id)->get();
            $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                ->where('clientid', Auth::user()->id)->get();
        }

        return view('client.home', compact('bets', 'count1', 'count2', 'count3', 'count4', 'count5', 'betWin', 'withdraws'));
    }

    public function getUpdateProfile()
    {
        $updateProfile = User::find(Auth::user()->id);
        
        return view('client.pages.updateProfile', compact('updateProfile'));
    }

    public function betHold(Request $request)
    {
        $user = Auth::user();   //get db User data   
     // dd($user);
      $currentDate = date('Y-m-d');
        $commisionp = Commision::where('referercode',$user->refcode)
                  ->where('userscode',$user->usercode)
                  ->where('cdate',$currentDate)
                  ->first();

       $agcommision=AGCommision::where('agentscode',$user->useragentcode)
                    ->where('referrercode',$user->usercode)
                    ->where('comdate',$currentDate)
                    ->first();

       // dd($agcommision);
        $agents=User::where('agentcode',$user->useragentcode)->first();
//dd($agents);
        $agentsfund=AdmintoAgentfund::where('to_agent',$agents->id)->first();
       // dd($agentsfund);


     $refer= User::where('usercode',$user->refcode)->first();
   //dd($refer);
    $referFund = AgenttoClientfund::where('to_client', $refer->id)->first();
    // dd($referFund);
   // $nowdate= new DateTime("now");


        if(Hash::check($request->password, $user->password)) {   

             $checkClientFund = AgenttoClientfund::where('to_client', Auth::user()->id)->first();

              
               // dd($currentDate);
                $checkBetCount = BetHold::where('clientid', Auth::user()->id)
                                        ->where('betid', $request->bet_id)
                                        ->whereDate('created_at', $currentDate)
                                        ->get()->sum('quantity');

                $checkBetC = $checkBetCount + $request->quantity;

                if ($checkClientFund != null) {
                    if ($checkClientFund->amount > $request->total_price) {
                        if ($checkBetC < 6) {                           
                            $bethold = new BetHold;
                            $bethold->betid = $request->bet_id;
                            $bethold->betname = $request->bet_name;
                            $bethold->betprice = $request->total_price;
                            $bethold->clientid = Auth::user()->id;
                            $bethold->quantity = $request->quantity;

                            if ($bethold->save()) {
                            $checkClientFund->amount = $checkClientFund->amount - $request->total_price;
                            $checkClientFund->save();

                        //refer commision
                           
                          if($referFund==''){

                          }else{
                            $referFund->amount =($referFund->amount)+($request->total_price*.2);
                            $referFund->save(); 
                          }
                                                    
                            if($commisionp== ''){
                                $commision= new Commision;
                                $commision->referercode =$user->refcode;
                                $commision->userscode=$user->usercode;
                                $commision->commision = $request->total_price*.2;
                                $commision->cdate=$currentDate;
                                $commision->save();
                            }
                           
                            else{
                                $commisionp->commision=$commisionp->commision+$request->total_price*.2;
                                $commisionp->save();
                            }
                            //agent comission

                            $agentsfund->amount=$agentsfund->amount+$request->total_price*.02;
                            $agentsfund->save();

                            if($agcommision==''){
                                $agentcommision= new AGCommision;
                                $agentcommision->agentscode=$user->useragentcode;
                                $agentcommision->referrercode=$user->usercode;
                                $agentcommision->amount=$request->total_price*.02;
                                $agentcommision->comdate=$currentDate;
                                $agentcommision->save();
                            }else{
                                $agcommision->amount=$agcommision->amount+$request->total_price*.02;
                                $agcommision->save();
                            }
                             
                             
                            return redirect()->route('dashboard')->with('success', 'Bet Hold Successfully');
                            }
                        }else{
                            return redirect()->route('dashboard')->with('success', 'Maximum five times hold');
                        }
                        
                    }else{
                        return redirect()->route('dashboard')->with('success', 'Amount Not available');
                    }
                }else{
                    return redirect()->route('dashboard')->with('success', 'Amount Not available');
                }
            } else {
                return redirect()->route('dashboard')->with('success', 'Password not matched ');
        }

        
        
        return view('client.pages.updateProfile', compact('updateProfile'));
    }

    public function withdrawAmount(Request $request)
    {
         // dd($request->all());

        $agent = User::where('agentcode', Auth::user()->useragentcode)->first();

        $checkClientFund = AgenttoClientfund::where('to_client', Auth::user()->id)->first();

        if ( Hash::check($request->password,$agent->password)) {
            if ($checkClientFund->amount > $request->withdrawamount) {
            
                $withdraw = new ClientWithdraw;
                $withdraw->agentid = $agent->id;
                $withdraw->clientid = Auth::user()->id;
                $withdraw->withdrawamount = $request->withdrawamount;
                $withdraw->payment = $request->payment;
                $withdraw->number = $request->number;
                $withdraw->actualamount = $request->withdrawamount - ($request->withdrawamount * .1);
                $withdraw->chargeamount = ($request->withdrawamount * .1);
    
                if ($withdraw->save()) {
                    $checkClientFund->amount = $checkClientFund->amount - $request->withdrawamount;
                    $checkClientFund->save();
                    return redirect()->route('dashboard')->with('success', 'Withdraw Successfully ');
                }
    
            }else{
                return redirect()->route('dashboard')->with('success', 'Amount Not available ');
            }
        }else{
            return redirect()->route('dashboard')->with('success', ' Please Enter Your User Password');
        }

        

    }

    public function transferAmount(Request $request)
    {
       //dd($request->all());
          $fromclient = User::where('mobile', Auth::user()->mobile)->first();

          $toclient = User::where('mobile',$request->toid)->first();
       // dd($toclient);

      if($toclient==''){
        return redirect()->route('dashboard')->with('success', ' Wrong User ID');
       }elseif($toclient->id==Auth::user()->id){
        return redirect()->route('dashboard')->with('success', 'Please Try to Another ID');
       }elseif($toclient->roleid==2){
        return redirect()->route('dashboard')->with('success', 'Transfer Only Client ID');
       }else{        
        $fromagent = User::where('agentcode',$toclient->useragentcode)->first();             
        $fromClientFund = AgenttoClientfund::where('to_client', $fromclient->id)->first();
        $toClientFund = AgenttoClientfund::where('to_client', $toclient->id)->first();

        if ( Hash::check($request->password,$fromclient->password)) {
            if ($fromClientFund->amount >= $request->transferamount) {

                $fromClientFund->amount=$fromClientFund->amount-$request->transferamount;
                $fromClientFund->save();
           
                if($toClientFund==''){
                    $toClientFund=new AgenttoClientfund();
                    $toClientFund->from_agent =$fromagent->id;
                    $toClientFund->to_client =$toclient->id;
                    $toClientFund->amount=$request->transferamount;
                    $toClientFund->status=0;
                    $toClientFund->save();
                }
                else{
                    $toClientFund->amount=$toClientFund->amount+$request->transferamount;
                    $toClientFund->save();
                }
                $ClientFund=new ClientTransfer();
                $ClientFund->fromid=Auth::user()->id;
                $ClientFund->toid=$toclient->id;
                $ClientFund->transferamount=$request->transferamount;
                $ClientFund->save();
                 
                return redirect()->route('dashboard')->with('success', ' Successfully Transfer Fund');
         }else{
            return redirect()->route('dashboard')->with('success', ' Amount Not available');
         }
       }else{ 
         return redirect()->route('dashboard')->with('success', ' Wrong Password');
       }
      }
     }




    public function betEditModal($id)
    {
        $bet = BetTable::find($id);
        return view('client.betHold', compact('bet'));

        //return response()->json($bet);
    }

    public function refererlist(){
        $ref=DB::table('users')
               ->where('users.refcode',Auth::user()->usercode)
                ->get();
        return view('client.pages.referer',compact('ref'));
    }

    public function referercommision(){
                   $comission=DB::table('commisions')
                          ->join('users','users.usercode','=','commisions.userscode')
                           ->where('referercode',Auth::user()->usercode) 
                           ->select('users.name','users.mobile','commisions.userscode',DB::raw('sum(commision) as total'))
                           ->groupBy('users.name','users.mobile','commisions.userscode')                       
                           ->get();
               //  dd($comission);
        return view('client.pages.commision',compact('comission'));
    }

         public function refererhistory(){

            $result=DB::table('commisions')
                   ->join('users', 'users.usercode', '=', 'commisions.userscode')
                    ->where('referercode',Auth::user()->usercode)
                    ->select('commisions.*', 'users.name','users.mobile')
                     ->orderBy('updated_at','DESC')
                    ->get();

                  //  dd($result);
            return view('client.pages.comhistory',compact('result'));
         }
    
    public function withdrawhistory(){

        $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
        ->where('clientid', Auth::user()->id)->get();
        return view('client.pages.withdrawhistory',compact('withdraws'));
    }
    
    public function winhistory(){

        $betWin = BetWin::orderBy('created_at', 'DESC')
        ->where('clientid', Auth::user()->id)->get();
   
        return view('client.pages.winhistory',compact('betWin'));
    }

    public function receivefund(){

        $recive=DB::table('agenttoclientfund_histories')
                ->join('users','users.id','=','agenttoclientfund_histories.from_agent')
                ->where('to_client', Auth::user()->id)
                ->select('agenttoclientfund_histories.*', 'users.mobile','users.agentcode')
               ->get();
               //dd($recive);
        return view('client.pages.recivehis',compact('recive'));
    }

    public function fundtransfer(){

        $transfer =DB::table('client_transfers')
                 ->join('users','users.id','=','client_transfers.toid')
                  ->where('fromid', Auth::user()->id)
                  ->select('client_transfers.*','users.mobile','users.name','useragentcode')
                  ->orderBy('created_at', 'DESC')
                  ->paginate(20);
                //   ->get();

                 // dd($transfer);
     $receive =DB::table('client_transfers')
                  ->join('users','users.id','=','client_transfers.fromid')
                   ->where('toid', Auth::user()->id)
                   ->select('client_transfers.*','users.mobile','users.name','useragentcode')
                   ->orderBy('created_at', 'DESC')
                   ->get();
           // dd($receive);
        return view('client.pages.transferfund',compact('transfer','receive'));
    }

    
}
