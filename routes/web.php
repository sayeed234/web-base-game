<?php


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('forgetepass', 'ForgetpassController@forgetepass')->name('forgetepass');

Route::post('forgetepassreset', 'ForgetpassController@forgetepassreset')->name('forgetepassreset');

Route::get('referrer/{ref}', 'ForgetpassController@referlog');

Auth::routes();

// admin route for dashboard
Route::group(["namespace"=>"App\Http\Controllers"],function() {
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::resource('agentcode', 'Admin\AgentCodeController');
    Route::get('beating', 'Admin\AgentCodeController@beating')->name('beating');
    Route::get('beating-create', 'Admin\AgentCodeController@betingCreate')->name('beating.create');
    Route::post('beating-create', 'Admin\AgentCodeController@beatingStore')->name('beating.store');
    Route::get('beating-edit/{id}', 'Admin\AgentCodeController@beatingEdit')->name('beating.edit');
    Route::post('beating-edit', 'Admin\AgentCodeController@beatingUpdate')->name('beating.update');
    Route::get('admin-fund', 'Admin\AgentCodeController@getAdminFund')->name('admin.fund');

    Route::post('admin-fund', 'Admin\AgentCodeController@postAdminFund')->name('admin.fund.store');

    Route::any('show-agent-fund-transfer', 'Admin\AgentCodeController@showAgentFund')->name('show.agent.fund.transfer');
    Route::get('agent-fund-transfer', 'Admin\AgentCodeController@getAgentFund')->name('agent.fund.transfer');

    Route::post('agent-fund-transfer', 'Admin\AgentCodeController@postAgentFund')->name('agent.fund.store');

    Route::any('agent-fund-history', 'Admin\AgentCodeController@agentFundHistory')->name('agent.fund.history');
    
    Route::any('client-fund-history', 'Admin\AgentCodeController@clientFundHistory')->name('client.fund.history');

    Route::any('client-fund-client', 'Admin\AgentCodeController@clientFundclient')->name('client.fund.client');

    Route::get('bet-hold-history', 'Admin\AgentCodeController@betHoldHistory')->name('bet.hold.history');

    Route::get('bet-wins', 'Admin\AgentCodeController@betwins')->name('bet.wins');

    Route::post('bet-hold-history', 'Admin\AgentCodeController@betHoldWin')->name('bet.win');

    Route::any('bet-win-history', 'Admin\AgentCodeController@betWinHistory')->name('bet.win.history');

    Route::any('withdraw-history', 'Admin\AgentCodeController@withdrawHistory')->name('withdraw.history');

    Route::post('withdraw-approve', 'Admin\AgentCodeController@withdrawApprove')->name('withdraw.approve');

    Route::get('withdraw-approve-list', 'Admin\AgentCodeController@withdrawApprovelist')->name('withdraw.approve-list');

    Route::get('agent-client', 'Admin\AgentCodeController@agentclient')->name('agent-client');

    Route::get('/client/status/{id}',[
        'uses'=>'Admin\AgentCodeController@clientstatus',
        'as'=>'clientstatus'
        ]);

});

});
Route::group(["namespace"=>"App\Http\Controllers"],function() {
// agent login route for dashboard
Route::prefix('agent')->group(function () {
    Route::get('/login', 'Auth\AgentLoginController@showLoginForm')->name('agent.login');
    Route::post('/login', 'Auth\AgentLoginController@login')->name('agent.login.submit');
    Route::get('/dashboard', 'AgentController@index')->name('agent.dashboard');
    Route::get('/logout', 'Auth\AgentLoginController@logout')->name('agent.logout');
    Route::get('agent-commission', 'AgentController@agentcommission')->name('agent-commission');

    Route::get('agent-summery', 'AgentController@agenthistory')->name('agent-history');

    Route::get('agent-list', 'AgentController@agentlist')->name('agent-listss');

});

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    // agent route start
    Route::get('/agent/dashboard', 'AgentController@index')->name('agent.dashboard');
    Route::get('agent-profile/{id}', 'AgentController@agentProfile')->name('agent.profile');
    Route::get('agent-to-client', 'AgentController@getAgentToClient')->name('agent.to.client');
    Route::post('agent-to-client', 'AgentController@postAgentToClient')->name('agent.to.client.store');

    Route::any('agent-client-fund-history', 'AgentController@agentToClientFundHistory')->name('agent.client.fund.history');

    Route::any('admin-agent-fund-history', 'AgentController@admintoagentFundHistory')->name('admin-agent-fund-history'); 
    // client route end
    Route::get('referer_commision', 'HomeController@referercommision')->name('referer.commision');
    Route::get('referer_list', 'HomeController@refererlist')->name('referer.list');

    Route::get('referer_history', 'HomeController@refererhistory')->name('referer.history');

    Route::get('receive_fund', 'HomeController@receivefund')->name('receivefund');

    Route::get('fund_transfer', 'HomeController@fundtransfer')->name('fundtransfer');


    Route::any('dashboard', 'HomeController@index')->name('dashboard');
    
    Route::get('update-profile', 'HomeController@getUpdateProfile')->name('get.update.profile');
    Route::post('bet-hold', 'HomeController@betHold')->name('bet.hold');

    Route::get('betEditModal/{id}','HomeController@betEditModal');

    Route::post('withdrawAmount', 'HomeController@withdrawAmount')->name('withdrawAmount');

    Route::post('transferAmount', 'HomeController@transferAmount')->name('transferAmount');

    Route::get('withdraw_history', 'HomeController@withdrawhistory')->name('withdrawhistory');

    Route::get('win_history', 'HomeController@winhistory')->name('winhistory');

    // profile update for all

    Route::post('profileUpdate', 'AgentController@profileUpdate')->name('profileUpdate');
    Route::post('passwordUpdate', 'AgentController@passwordUpdate')->name('passwordUpdate');
    //composer require intervention/image
});
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
