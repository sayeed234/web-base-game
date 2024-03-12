<?php

namespace App\Http\Controllers\Admin;

use App\Agentlogin;
use App\Http\Controllers\Controller;
use App\Model\AdintoagnetfundHistory;
use App\Model\AdminFund;
use App\Model\AdminFundhistory;
use App\Model\AdmintoAgentfund;
use App\Model\AgenttoClientfund;
use App\Model\AgenttoclientfundHistory;
use App\Model\BetHold;
use App\Model\BetTable;
use App\Model\BetWin;
use App\Model\ClientWithdraw;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AgentCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $agentcodes = User::where('roleid', 2)->get();
        return view('admin.agentcode.index', compact('agentcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ran = mt_rand(1000, 9999);
        $agentcode = 'AG' . $ran;

        $ran2 = mt_rand(10000, 99999);
        $usercode = 'REF' . $ran2;

        return view('admin.agentcode.create', compact('agentcode','usercode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
               
       
        $this->validator($request->all())->validate();

        $checkAgentcode = User::where('agentcode', $request->agentcode)->first();
        if ($checkAgentcode == null) {

            $user = $this->insertdata($request->all());

            $users= new User();
            $users->name=$request->name;
            $users->usercode=$request->usercode;
            $users->useragentcode=$request->agentcode;
            $users->password=Hash::make($request->password);
            $users->roleid=5;
            $users->save();
            
            return redirect()->route('agentcode.index')->with('success', 'Agent Create Successfully');
        }
        return redirect()->route('agentcode.create')->with('success', 'Agent code already exists!');
    }

    protected function validator(array $data)
    {
       //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'numeric', 'unique:users'],
            'agentcode' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usercode' => ['required', 'string', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function insertdata(array $data)
    {

        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'agentcode' => $data['agentcode'],
            'roleid' => $data['roleid'],
            'refcode' => $data['usercode'],
            'password' => Hash::make($data['password']),
            'showpassword' => $data['password'],
        ]);
  


}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function beating()
    {
        $beats = BetTable::all();
        return view('admin.beat.beating', compact('beats'));
    }

    public function betingCreate()
    {
        return view('admin.beat.create');
    }

    public function beatingStore(Request $request)
    {
        //dd($request->all());
        BetTable::create($request->all())->with('success', 'Successfully');

        return redirect()->route('beating')->with('success', 'Successfully');
    }

    public function beatingEdit($id)
    {
        $beat = BetTable::find($id);
        return view('admin.beat.beatingEdit', compact('beat'));
    }

    public function beatingUpdate(Request $request)
    {
        $beat = BetTable::where('id', $request->id)->first();

        $beat->name = $request->name;
        $beat->price = $request->price;

        $beat->save();

        return redirect()->route('beating')->with('success', 'Successfully');
    }

    public function getAdminFund()
    {
        $adminFunds = AdminFundhistory::all();
        
        $checkAdminAmount = AdminFund::where('id', '!=', 'null')->first();
        return view('admin.agentcode.adminFund', compact('adminFunds', 'checkAdminAmount'));
    }

    public function postAdminFund(Request $request)
    {
        $checkAdminAmount = AdminFund::where('id', $request->id)->first();

        if($checkAdminAmount == null){
            AdminFund::create($request->all());
            AdminFundhistory::create($request->all());
            return redirect()->route('admin.fund')->with('success', ' Successfully');
        }else{

            $checkAdminAmount->adminamount = $checkAdminAmount->adminamount + $request->adminamount;
            $checkAdminAmount->save();
            AdminFundhistory::create($request->all());
            return redirect()->route('admin.fund')->with('success', 'Successfully');
        }
    }

    public function showAgentFund(Request $request)
    {
        $key = $request->key;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($key != null && $from_date == '' && $to_date == '') {
           $agentfunds = AdmintoAgentfund::orderBy('created_at', 'desc')
                ->orWhereHas('agentuser', function($q) use ($key){
                    return $q->where('agentcode','like','%'. $key . '%');})
                ->get();
        }elseif ($key == '' && $from_date != null && $to_date != null) {
            $agentfunds = AdmintoAgentfund::orderBy('created_at', 'desc')
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->get();
        }else{
            $agentfunds = AdmintoAgentfund::orderBy('created_at', 'desc')->get();
        }

        return view('admin.agentcode.showAgentFund', compact('agentfunds'));
    }

    public function getAgentFund()
    {
        $agentcode = User::where('roleid', 2)->get();

        return view('admin.agentcode.agentfundtransfer', compact('agentcode'));
    }

    public function postAgentFund(Request $request)
    {
        //dd($request->all());
        $checkAgent = AdmintoAgentfund::where('to_agent', $request->to_agent)->first();
        $admiAmount = AdminFund::where('id', Auth::user()->id)->first();

        if($checkAgent == null){
            $agentfund = new AdmintoAgentfund;

            $agentfund->from_admin = Auth::user()->id;
            $agentfund->to_agent = $request->to_agent;
            $agentfund->amount = $request->amount;

            if ($agentfund->save()) {

                $agentfundHistory = new AdintoagnetfundHistory;

                $agentfundHistory->from_admin = Auth::user()->id;
                $agentfundHistory->to_agent = $request->to_agent;
                $agentfundHistory->amount = $request->amount;

                $agentfundHistory->save();

                $admiAmount->adminamount = $admiAmount->adminamount - $request->amount;
                $admiAmount->save();
            }
            
            return redirect()->route('show.agent.fund.transfer')->with('success', 'Transfer Successfully');

        }else{
            $checkAgent->amount = $checkAgent->amount + $request->amount;

            if ($checkAgent->save()) {

                $agentfundHistoryU = new AdintoagnetfundHistory;

                $agentfundHistoryU->from_admin = Auth::user()->id;
                $agentfundHistoryU->to_agent = $request->to_agent;
                $agentfundHistoryU->amount = $request->amount;

                $agentfundHistoryU->save();

                $admiAmount->adminamount = $admiAmount->adminamount - $request->amount;
                $admiAmount->save();
            }

            return redirect()->route('show.agent.fund.transfer')->with('success', 'Successfully');
        }
    }

    public function agentFundHistory(Request $request)
    {
        $key = $request->key;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($key != null && $from_date == '' && $to_date == '') {
           $agentFundhistory = AdintoagnetfundHistory::orderBy('to_agent', 'desc')
                ->orWhereHas('agentuserhistory', function($q) use ($key){
                    return $q->where('agentcode','like','%'. $key . '%');})
                ->get();
        }elseif ($key == '' && $from_date != null && $to_date != null) {
            $agentFundhistory = AdintoagnetfundHistory::orderBy('to_agent', 'desc')
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->get();
        }else{
            $agentFundhistory = AdintoagnetfundHistory::orderBy('to_agent', 'desc')->get();
        }

        return view('admin.agentcode.agentFundhistory', compact('agentFundhistory'));
    }

    public function clientFundHistory(Request $request)
    {
        $key = $request->key;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($key != null && $from_date == '' && $to_date == '') {
           $clientFundhistory = AgenttoclientfundHistory::orderBy('to_client', 'desc')
                ->orWhereHas('agentuserh', function($q) use ($key){
                    return $q->where('name','like','%'. $key . '%');})
                ->orWhereHas('clientuserhistory', function($q) use ($key){
                    return $q->where('name','like','%'. $key . '%');})
                ->get();
        }elseif ($key == '' && $from_date != null && $to_date != null) {
            $clientFundhistory = AgenttoclientfundHistory::orderBy('to_client', 'desc')
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->get();
        }else{
            $clientFundhistory = AgenttoclientfundHistory::orderBy('to_client', 'desc')->get();
        }
        
        return view('admin.agentcode.clientFundhistory', compact('clientFundhistory'));
    }

    public function betHoldHistory()
    {

        $betEarn = DB::select(DB::raw("SELECT distinct bet.betname, bet.betid, bcount, bamount, date(us.created_at) created_at from ( SELECT betname, betid, sum(quantity) bcount, sum(betprice) bamount FROM `bet_holds` WHERE DATE(`created_at`) = CURDATE() GROUP BY betname, betid) bet INNER JOIN bet_holds us on us.betid = bet.betid WHERE DATE(`created_at`) = CURDATE()"));

        $betHold = collect($betEarn);

        // return view('admin.agentcode.betHold', compact('betHold'));
        return view('admin.agentcode.betHold', compact('betHold'));
    }

    public function betHoldWin(Request $request)
    {
       $currentDate = date('Y-m-d');
       $betid =  $request->betid;
       //$currentDate = date('Y-m-d',strtotime("-2 days"));
        $userCheck = BetHold::whereDate('created_at', $currentDate)
                    ->where('betid', $request->betid)->get();

        $betEarn = DB::select(DB::raw("SELECT  betid, clientid, sum(quantity) bcount, sum(betprice) bamount FROM `bet_holds` WHERE DATE(`created_at`) = '$currentDate' and betid = '$betid' GROUP BY betid, clientid "));

        $betHold = collect($betEarn);
        $bet = $betHold->toArray();
        //$betUser = $betHold->pluck('clientid')->toArray();
        //dd($bet);
        $winCheck = BetWin::whereDate('created_at', $currentDate)->first();

        if ($winCheck == null) {

            foreach ($bet as $key => $value) {
                $winuserSave = new BetWin;
                $winuserSave->betid = $value->betid;
                $winuserSave->clientid = $value->clientid;
                $winuserSave->bcount = $value->bcount;
                $winuserSave->bamount = $value->bamount * 5;
                $winuserSave->save();

                $values= $value->bamount * 5;

                AgenttoClientfund::where('to_client', $value->clientid)->update(['amount' => DB::Raw("amount + $values")]);
            }

            return redirect()->route('bet.win.history')->with('success', 'Bet win this client');
        }else{
            return redirect()->route('bet.hold.history')->with('success', 'Bet win already exists for this days!');
        }


    }

    public function betWinHistory(Request $request)
    {
        $key = $request->key;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($key != null && $from_date == '' && $to_date == '') {
           $betWinHistory = BetWin::orderBy('created_at', 'desc')
                ->orWhereHas('clientWinInfo', function($q) use ($key){
                    return $q->where('name','like','%'. $key . '%');})
                ->orWhereHas('clientWinInfo', function($q) use ($key){
                    return $q->where('usercode','like','%'. $key . '%');})
                ->get();
        }elseif ($key == '' && $from_date != null && $to_date != null) {
            $betWinHistory = BetWin::orderBy('created_at', 'desc')
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->get();
        }else{
            $date = new DateTime("now");
            $betWinHistory = BetWin::orderBy('created_at', 'desc')
                           ->get();
        }
        
     //  dd($betWinHistory);

        return view('admin.agentcode.betWinHistory', compact('betWinHistory'));
    }

    public function withdrawHistory(Request $request)
    {
        $key = $request->key;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if ($key != null && $from_date == '' && $to_date == '') {
           $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                ->orWhereHas('agentWinInfo', function($q) use ($key){
                    return $q->where('name','like','%'. $key . '%');})
                ->orWhereHas('clientWinInfo', function($q) use ($key){
                    return $q->where('name','like','%'. $key . '%');})
                ->get();
        }elseif ($key == '' && $from_date != null && $to_date != null) {
            $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->get();
        }else{
            $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
            ->where('status',0)                 
            ->get();
        }
        
        return view('admin.agentcode.withdrawHistory', compact('withdraws'));
    }

public function withdrawApprovelist(){
           $withdraws = ClientWithdraw::orderBy('created_at', 'DESC')
                      ->where('status',1)
                    ->get();

    return view('admin.agentcode.approve', compact('withdraws'));
}




    public function withdrawApprove(Request $request)
    {

        // dd($request->all());
        $withdraws = ClientWithdraw::where('id', $request->winid)
                    ->where('clientid', $request->clientid)->first();
            //dd($withdraws);  
        $withdraws->update(['status' => $request->status ]);
       // dd($withdraws);
        return redirect()->route('withdraw.history')->with('success', 'Data Update');
    }

    public function betwins(){

    $betWins=DB::table('bet_wins')
             ->join('bet_tables','bet_tables.id','=','bet_wins.betid')
             ->select('bet_wins.*', 'bet_tables.name', 'bet_wins.created_at')
             ->select('bet_tables.name','bet_wins.created_at', DB::raw('sum(bcount) as totalbet'),DB::raw('sum(bamount) as totalbetamount'))
             ->groupBy('bet_tables.name', 'bet_wins.created_at') 
             ->orderBy('created_at', 'desc')
             ->get();

//dd($betWins);
        return view('admin.agentcode.betwins',compact('betWins'));
    }

    public function agentclient(){
                  $result=DB::table('users')
                         ->where('roleid',2)
                         ->get();
          // dd($result);         
        return view('admin.agentcode.agent_client',compact('result'));
    }
public function clientFundclient(){

          $result=DB::table('client_transfers')->get();

               //dd($result);
    return view('admin.agentcode.clienttoclient',compact('result'));
}

public function clientstatus($id){
    $user_status= User::find($id);
    if ($user_status->roleid==0) {
      $user_status->roleid=1;
      $user_status->save();
      return redirect()->back();
    }else if($user_status->roleid==1){
      $user_status->roleid=0;
      $user_status->save();
      return redirect()->back();
    }  
  }
   
}