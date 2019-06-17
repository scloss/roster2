<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('create', 'RosterController@roster_create');
Route::get('userList', 'RosterController@user_list_json');
Route::post('insertRoster', 'RosterController@insert_roster');
Route::post('updateRoster', 'RosterController@update_roster');
Route::post('updateSingleRoster', 'RosterController@update_single_roster');
Route::get('editRoster', 'RosterController@edit_roster');
Route::get('viewRoster', 'RosterController@view_roster');
Route::get('viewRosterData', 'RosterController@view_roster_data');
Route::get('returnRoster', 'RosterController@return_roster');
Route::get('editSingleView', 'RosterController@edit_single_view');
Route::get('returnRosterSingle', 'RosterController@return_roster_single');
Route::get('swap', 'RosterController@swap_view');
Route::post('swapUpdate', 'RosterController@swap_update');
Route::post('swapRequested', 'RosterController@swap_requested');
Route::get('swapPendingView', 'RosterController@swap_pending_view');
Route::get('leave', 'RosterController@leave_view');
Route::post('leaveUpdate', 'RosterController@leave_update');
Route::post('leaveRequested', 'RosterController@leave_requested');
Route::get('leavePendingView', 'RosterController@leave_pending_view');
Route::get('leaveView', 'RosterController@leave_taken_view');
Route::get('swapView', 'RosterController@swap_taken_view');
Route::get('statView', 'RosterController@stat_view');
Route::get('reportFiltered','RosterController@report_filtered');
Route::get('profile','RosterController@profile');
Route::get('report','RosterController@report');
Route::post('message','RosterController@message');
Route::get('viewWeekly','RosterController@viewWeekly');
Route::get('nocroster','RosterController@plain_roster_view');

Route::get('view_only_roster','RosterController@admin_view');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
