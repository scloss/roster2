<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DB;
use App\MailHelpers\phpMailer;
use Mail;
use Request;
use DateTime;
use Date;
use \Input as Input;
use File;
use App\Http\Controllers\ZipArchive;
use DateTimezone;
session_start();

class RosterController extends Controller {
	
	//$_SESSION['pass'];
	//$userIdCheck = $_SESSION['dashboard_user_id'];

	// public function is_admin(){
	// 	$passCheck   = 1;
	// 	if($passCheck == 1){
	// 		$userId = 'showmen.barua';
	// 		$adminQuery = "select * from rosterdb.admintable where user_id='$userId'";
	// 		$adminLists = \DB::select(\DB::raw($adminQuery));
	// 		if($adminLists != null){
	// 			return 'true';
	// 		}
	// 		else{
	// 			return 'false';
	// 		}
	// 	}
	// 	else{
	// 		return 'nopass';
	// 	}
	    
	// }


	public function is_admin(){
		//$_SESSION['pass'] = 1;
		// if(isset($_SESSION['pass']))
  //       {
  //           if($_SESSION['pass'] != 1)
  //           {
  //               header('Location:../../login_plugin/login.php');
  //               exit();
  //           }
  //       }
  //       else
  //       {
  //           header('Location:../../login_plugin/login.php');
  //           exit();
  //       }
		$ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    //echo $ipaddress;
	    // if($ipaddress == '172.16.136.1'){
	    // 	header('Location:http://103.15.245.78:8005/login_plugin/login.php');
	    // 	exit();
	    // }

		$passCheck   = 1;
		
		if(isset($_SESSION['dashboard_user_id'])){
			$userId = $_SESSION['dashboard_user_id'];
			$adminQuery = "select * from rosterdb.admintable where user_id='$userId'";
			$adminLists = \DB::select(\DB::raw($adminQuery));
			if($adminLists != null){
				return 'true';
			}
			else{
				return 'false';
			}
		}
		else{
			return 'nopass';
		}
	    
	}

	public function roster_create(){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
           		exit();
				$app = 'appUser';
			}
		}
		$monthListArr = ['January','February','March','April','May','June','July','August','September','October','November','December'];
		$month = Request::get('month');
		$year = Request::get('year');
		date_default_timezone_set('Asia/Dhaka');
		$currentYear = date('Y', time());
		if(!$month){
			$month = (int)(date("m"));
			$year = $currentYear;
		}
		$yearListArr = array();
		//return $year-5;
		$initialValue = $currentYear-1;
		$limit = $year +5;
		for($i=$initialValue;$i<$limit;$i++){
			array_push($yearListArr, $i);
			//echo $i;
		}
		return view('roster.roster_create',compact('app','yearListArr','year','month','monthListArr'));
	}
	public function user_list_json(){
		$rosterUserQuery = "select * from login_plugin_db.login_table where dept='NOC' && user_id !='md.shariful' && user_id !='razib.hasan' && user_id !='raihan.parvez' && user_id !='sajal.kumar' AND account_status !='blocked'";
		$rosterUserList = \DB::select(\DB::raw($rosterUserQuery));

		$userListJson ='{"records":'.json_encode($rosterUserList).'}';
		return $userListJson;
	} 
	public function message($msg){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				$app = 'appUser';
			}
		}

		return view('roster.message',compact('msg','app'));
	}
	public function report(){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				$app = 'appUser';
			}
		}
		$leave_type = Request::get('leaveType');
		if($leave_type == 'general'){

		}
		else
		{
			date_default_timezone_set('Asia/Dhaka');
			$currentYear = date('Y', time());
			$month = Request::get('month');
			$year = Request::get('year');
			$monthListArr = ['January','February','March','April','May','June','July','August','September','October','November','December','All'];

			if(!$month){
				$month = (int)(date("m"));
				$year = $currentYear;
			}
			if($month == '13'){
				//$month = (int)(date("m"));
				$get_all_year_query = "SELECT DISTINCT YEAR(shift_date) as years FROM rosterdb.rostertable";
				$get_all_year_lists= \DB::select(\DB::raw($get_all_year_query));

				$all_year_arr = array();
				$is_year_exists = false;

				foreach($get_all_year_lists as $get_all_year_list){
					array_push($all_year_arr, $get_all_year_list->years);
					if($get_all_year_list->years == $year){
						$is_year_exists = true;
					}
				}
				if($is_year_exists == false){
					$year = $currentYear;
					//echo 'asdf';
				}

				//$year = $currentYear;
				$get_all_month_query = "SELECT DISTINCT month(shift_date) as months FROM rosterdb.rostertable WHERE YEAR(shift_date)='$year'";
				$get_all_month_lists= \DB::select(\DB::raw($get_all_month_query));

				$all_month_arr = array();

				foreach($get_all_month_lists as $get_all_month_list){
					array_push($all_month_arr, $get_all_month_list->months);
				}
			}
			$yearListArr = array();
			//return $year-5;
			//print_r($all_month_arr);
			$initialValue = $currentYear-1;
			$limit = $year +5;
			for($i=$initialValue;$i<$limit;$i++){
				array_push($yearListArr, $i);
				//echo $i;
			}
			if($month ==''){
				$month = '04';
				$year = '2017';
			}

			$rosterUserQuery = "select * from login_plugin_db.login_table where dept='NOC' && user_id !='md.shariful' && user_id !='razib.hasan' && user_id !='raihan.parvez' && user_id !='sajal.kumar'  AND account_status='active'";
			$userLists= \DB::select(\DB::raw($rosterUserQuery));
			//$userLists = $rosterUserLists;

			$holidayQuery = "select *  from rosterdb.holidaytable";
			$holidayLists = \DB::select(\DB::raw($holidayQuery));
			

			if($month == '13'){
				$totalShiftCountArr = array();
				$totalDayArr = array();
				$totalNightArr = array();
				$totalEveningArr = array();
				$totalSwapArr = array();
				$totalSwapAttemptArr = array();
				$totalLeaveArr = array();
				$totalLeaveAttemptArr = array();
				$totalIIGArr = array();
				$totalICXArr = array();
				$totalSurArr = array();
				$totalBOArr = array();
				$totalShiftLeaderArr = array();
				$totalHolidayArr = array();
				$totalLeaveDurationArr = array();
				foreach($userLists as $userList){
					$totalShiftCount = 0;
						$totalDay = 0;
						$totalNight = 0;
						$totalEvening = 0;
						$totalSwap = 0;
						$totalSwapAttempt = 0;
						$totalLeave = 0;
						$totalLeaveAttempt = 0;
						$totalIIG = 0;
						$totalICX = 0;
						$totalSur = 0;
						$totalBO = 0;
						$totalShiftLeader = 0;
						$totalHoliday = 0;
						$totalDuration = 0;
					for($k=0;$k<count($all_month_arr);$k++){
						$username = $userList->user_id;
						$selectAllShiftsQuery = "select * from rosterdb.rostertable where roster_table_id IN (select MAX(roster_table_id) from rosterdb.rostertable where user_id='$username' and MONTH(shift_date)='$all_month_arr[$k]' and YEAR(shift_date)='$year' GROUP BY shift_date)";
						$selectAllShiftsLists = \DB::select(\DB::raw($selectAllShiftsQuery));					
						//echo $selectAllShiftsQuery;
						foreach($selectAllShiftsLists as $selectAllShiftsList){
							$totalShiftCount++;
							if($selectAllShiftsList->shift_time == 'day'){
								$totalDay++;

							}
							if($selectAllShiftsList->shift_time == 'evening'){
								$totalEvening++;
							}
							if($selectAllShiftsList->shift_time == 'night'){
								$totalNight++;
							}
							if($selectAllShiftsList->shift_position == 'shift_leader'){
								$totalShiftLeader++;
							}
							if($selectAllShiftsList->shift_position == 'bo'){
								$totalBO++;
							}
							if($selectAllShiftsList->shift_position == 'sur'){
								$totalSur++;
							}
							if($selectAllShiftsList->shift_position == 'iig'){
								$totalIIG++;
							}
							if($selectAllShiftsList->shift_position == 'icx'){
								$totalICX++;
							}
							foreach($holidayLists as $holidayList){
								if($holidayList->date == $selectAllShiftsList->shift_date){
									$totalHoliday++;
								}
							}

						}

						$selectAllSwapQuery = "select * from rosterdb.swaptable where swapRequester='$username' and MONTH(swapShift1)='$all_month_arr[$k]' and YEAR(swapShift1)='$year'";
						$selectAllSwapLists = \DB::select(\DB::raw($selectAllSwapQuery));
						if($selectAllSwapLists != ''){
							foreach($selectAllSwapLists as $selectSwapList){
								if($selectSwapList->swapStatus == 'Approved'){
									$totalSwap++;

								}
								else{
									$totalSwapAttempt++;
								}
							}
						}
						else{
							$totalSwap = 0;
							$totalSwapAttempt = 0;
						}

						$selectAllLeaveQuery = "select * from rosterdb.leavetable where leave_requester='$username' and MONTH(leave_date_from)='$all_month_arr[$k]' and YEAR(leave_date_from)='$year'";
						$selectAllLeaveLists = \DB::select(\DB::raw($selectAllLeaveQuery));
						if($selectAllLeaveLists != ''){
							foreach($selectAllLeaveLists as $selectLeaveList){
								if($selectLeaveList->leave_status == 'Approved'){
									$totalLeave++;

									$datetime1 = new DateTime($selectLeaveList->leave_date_from);
									$datetime2 = new DateTime($selectLeaveList->leave_date_to);
									$difference = $datetime1->diff($datetime2);	
									$duration = $difference->d;

									$totalDuration = $totalDuration + $duration + 1;

								}
								else{
									$totalLeaveAttempt++;
								}
							}
						}
						else{
							$totalLeave = 0;
							$totalLeaveAttempt = 0;
						}
					}
						$totalShiftCountArr[$username] = $totalShiftCount;
						$totalDayArr[$username] = $totalDay;
						$totalNightArr[$username] = $totalNight;
						$totalEveningArr[$username] = $totalEvening;
						$totalSwapArr[$username] = $totalSwap;
						$totalSwapAttemptArr[$username] = $totalSwapAttempt;
						$totalLeaveArr[$username] = $totalLeave;
						$totalLeaveAttemptArr[$username] = $totalLeaveAttempt;
						$totalIIGArr[$username] = $totalIIG;
						$totalICXArr[$username] = $totalICX;
						$totalSurArr[$username] = $totalSur;
						$totalBOArr[$username] = $totalBO;
						$totalShiftLeaderArr[$username] = $totalShiftLeader;
						$totalHolidayArr[$username] = $totalHoliday;
						$totalLeaveDurationArr[$username] = $totalDuration; 
				}


			}
			
					
				
			
			else{
				// echo 'asdf';
				$totalShiftCountArr = array();
				$totalDayArr = array();
				$totalNightArr = array();
				$totalEveningArr = array();
				$totalSwapArr = array();
				$totalSwapAttemptArr = array();
				$totalLeaveArr = array();
				$totalLeaveAttemptArr = array();
				$totalIIGArr = array();
				$totalICXArr = array();
				$totalSurArr = array();
				$totalBOArr = array();
				$totalShiftLeaderArr = array();
				$totalHolidayArr = array();
				$totalLeaveDurationArr = array();
				foreach($userLists as $userList){
					$username = $userList->user_id;
					$selectAllShiftsQuery = "select * from rosterdb.rostertable where roster_table_id IN (select MAX(roster_table_id) from rosterdb.rostertable where user_id='$username' and MONTH(shift_date)='$month' and YEAR(shift_date)='$year'  GROUP BY shift_date)";
					//echo $selectAllShiftsQuery;
					$selectAllShiftsLists = \DB::select(\DB::raw($selectAllShiftsQuery));
					$totalShiftCount = 0;
					$totalDay = 0;
					$totalNight = 0;
					$totalEvening = 0;
					$totalSwap = 0;
					$totalSwapAttempt = 0;
					$totalLeave = 0;
					$totalLeaveAttempt = 0;
					$totalIIG = 0;
					$totalICX = 0;
					$totalSur = 0;
					$totalBO = 0;
					$totalShiftLeader = 0;
					$totalHoliday = 0;
					$totalDuration = 0;

					$selectTotalNightQuery = "select GROUP_CONCAT(shift_id) as shift_ids,count(roster_table_id),shift_time from rosterdb.rostertable where roster_table_id IN (select MAX(roster_table_id) from rosterdb.rostertable where user_id='$username' and MONTH(shift_date)='$month' and YEAR(shift_date)='$year' GROUP BY shift_date) and shift_time='night' group by shift_time";
					//return $selectTotalNightQuery;
					$selectedGroupByShiftIdLists = \DB::select(\DB::raw($selectTotalNightQuery));
					if(count($selectedGroupByShiftIdLists) > 0 ){
						$selectedGroupByShiftId = $selectedGroupByShiftIdLists[0]->shift_ids;
						$select_night_query = "select count(night_row_id) as night_count from nighttable where shift_id in ($selectedGroupByShiftId) and  shift_member like '%".$username."%'";
						$selectNightShiftsLists = \DB::select(\DB::raw($select_night_query));
						if(count($selectNightShiftsLists) > 0){
							$totalNight = $selectNightShiftsLists[0]->night_count;
						}
						else{
							$totalNight = 0;
						}
						
					}
					else{
						$totalNight = 0;
					}
					

					

					foreach($selectAllShiftsLists as $selectAllShiftsList){
						$totalShiftCount++;
						if($selectAllShiftsList->shift_time == 'day'){
							$totalDay++;

						}
						if($selectAllShiftsList->shift_time == 'evening'){
							$totalEvening++;
						}
						// if($selectAllShiftsList->shift_time == 'night'){
							
						// }
						if($selectAllShiftsList->shift_position == 'shift_leader'){
							$totalShiftLeader++;
						}
						if($selectAllShiftsList->shift_position == 'bo'){
							$totalBO++;
						}
						if($selectAllShiftsList->shift_position == 'sur'){
							$totalSur++;
						}
						if($selectAllShiftsList->shift_position == 'iig'){
							$totalIIG++;
						}
						if($selectAllShiftsList->shift_position == 'icx'){
							$totalICX++;
						}
						foreach($holidayLists as $holidayList){
							if($holidayList->date == $selectAllShiftsList->shift_date){
								$totalHoliday++;
							}
						}

					}

					$selectAllSwapQuery = "select * from rosterdb.swaptable where swapRequester='$username' and MONTH(swapShift1)='$month' and YEAR(swapShift1)='$year'";
					$selectAllSwapLists = \DB::select(\DB::raw($selectAllSwapQuery));
					if($selectAllSwapLists != ''){
						foreach($selectAllSwapLists as $selectSwapList){
							if($selectSwapList->swapStatus == 'Approved'){
								$totalSwap++;

							}
							else{
								$totalSwapAttempt++;
							}
						}
					}
					else{
						$totalSwap = 0;
						$totalSwapAttempt = 0;
					}

					$selectAllLeaveQuery = "select * from rosterdb.leavetable where leave_requester='$username' and MONTH(leave_date_from)='$month' and YEAR(leave_date_from)='$year'";
					$selectAllLeaveLists = \DB::select(\DB::raw($selectAllLeaveQuery));
					if($selectAllLeaveLists != ''){
						foreach($selectAllLeaveLists as $selectLeaveList){
							if($selectLeaveList->leave_status == 'Approved'){
								$totalLeave++;

								$datetime1 = new DateTime($selectLeaveList->leave_date_from);
								$datetime2 = new DateTime($selectLeaveList->leave_date_to);
								$difference = $datetime1->diff($datetime2);	
								$duration = $difference->d;

								$totalDuration = $totalDuration + $duration + 1;

							}
							else{
								$totalLeaveAttempt++;
							}
						}
					}
					else{
						$totalLeave = 0;
						$totalLeaveAttempt = 0;
					}
					$totalShiftCountArr[$username] = $totalShiftCount;
					$totalDayArr[$username] = $totalDay;
					$totalNightArr[$username] = $totalNight;
					$totalEveningArr[$username] = $totalEvening;
					$totalSwapArr[$username] = $totalSwap;
					$totalSwapAttemptArr[$username] = $totalSwapAttempt;
					$totalLeaveArr[$username] = $totalLeave;
					$totalLeaveAttemptArr[$username] = $totalLeaveAttempt;
					$totalIIGArr[$username] = $totalIIG;
					$totalICXArr[$username] = $totalICX;
					$totalSurArr[$username] = $totalSur;
					$totalBOArr[$username] = $totalBO;
					$totalShiftLeaderArr[$username] = $totalShiftLeader;
					$totalHolidayArr[$username] = $totalHoliday;
					$totalLeaveDurationArr[$username] = $totalDuration; 

				}

			}
		}

		
		// $selectAllShiftsQuery = "select * from rosterdb.rostertable where user_id='etanvir.ahmed' and MONTH(shift_date)='08' and YEAR(shift_date)='2016'";
		// 	$selectAllShiftsLists = \DB::select(\DB::raw($selectAllShiftsQuery));

		//print_r( $selectAllShiftsLists);
		return view('roster.report',compact('yearListArr','month','year','totalShiftCountArr','totalDayArr','totalNightArr','totalEveningArr','totalSwapArr','totalSwapAttemptArr','totalLeaveArr','totalLeaveAttemptArr','totalIIGArr','totalICXArr','totalSurArr','totalBOArr','totalShiftLeaderArr','totalHolidayArr','userLists','monthListArr','app','totalLeaveDurationArr'));
	}
	public function profile(){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				$app = 'appUser';
			}
		}
		$monthListArr = ['January','February','March','April','May','June','July','August','September','October','November','December','All'];
		$username = Request::get('userName');
		$month = Request::get('month');
		$year = Request::get('year');
		date_default_timezone_set('Asia/Dhaka');
		$currentYear = date('Y', time());
		if($username ==''){
			$username = $_SESSION['dashboard_user_id'];
			
			$month = (int)(date("m"));
			$year = $currentYear;
		}
		if($month == '13'){
			//$month = (int)(date("m"));
			$get_all_year_query = "SELECT DISTINCT YEAR(shift_date) as years FROM rosterdb.rostertable";
			$get_all_year_lists= \DB::select(\DB::raw($get_all_year_query));

			$all_year_arr = array();
			$is_year_exists = false;

			foreach($get_all_year_lists as $get_all_year_list){
				array_push($all_year_arr, $get_all_year_list->years);
				if($get_all_year_list->years == $year){
					$is_year_exists = true;
				}
			}
			if($is_year_exists == false){
				$year = $currentYear;
			}

			$year = $currentYear;
			$get_all_month_query = "SELECT DISTINCT month(shift_date) as months FROM rosterdb.rostertable WHERE YEAR(shift_date)='$year'";
			$get_all_month_lists= \DB::select(\DB::raw($get_all_month_query));

			$all_month_arr = array();

			foreach($get_all_month_lists as $get_all_month_list){
				array_push($all_month_arr, $get_all_month_list->months);
			}
		}
		if($month == '13'){

				$totalShiftCount = 0;
				$totalDay = 0;
				$totalNight = 0;
				$totalEvening = 0;
				$totalSwap = 0;
				$totalSwapAttempt = 0;
				$totalLeave = 0;
				$totalLeaveAttempt = 0;
				$totalIIG = 0;
				$totalICX = 0;
				$totalSur = 0;
				$totalBO = 0;
				$totalShiftLeader = 0;
			for($k=0;$k<count($all_month_arr);$k++){
				$selectAllShiftsQuery = "select * from rosterdb.rostertable where roster_table_id IN (select MAX(roster_table_id) from rosterdb.rostertable where user_id='$username' and MONTH(shift_date)='$all_month_arr[$k]' and YEAR(shift_date)='$year' GROUP BY shift_date)";
				$selectAllShiftsLists = \DB::select(\DB::raw($selectAllShiftsQuery));
				foreach($selectAllShiftsLists as $selectAllShiftsList){
					$totalShiftCount++;
					if($selectAllShiftsList->shift_time == 'day'){
						$totalDay++;
					}
					if($selectAllShiftsList->shift_time == 'evening'){
						$totalEvening++;
					}
					if($selectAllShiftsList->shift_time == 'night'){
						$totalNight++;
					}
					if($selectAllShiftsList->shift_position == 'shift_leader'){
						$totalShiftLeader++;
					}
					if($selectAllShiftsList->shift_position == 'bo'){
						$totalBO++;
					}
					if($selectAllShiftsList->shift_position == 'sur'){
						$totalSur++;
					}
					if($selectAllShiftsList->shift_position == 'iig'){
						$totalIIG++;
					}
					if($selectAllShiftsList->shift_position == 'icx'){
						$totalICX++;
					}

				}

				$selectAllSwapQuery = "select * from rosterdb.swaptable where swapRequester='$username' and MONTH(swapShift1)='$all_month_arr[$k]' and YEAR(swapShift1)='$year'";
				$selectAllSwapLists = \DB::select(\DB::raw($selectAllSwapQuery));
				foreach($selectAllSwapLists as $selectSwapList){
					if($selectSwapList->swapStatus == 'Approved'){
						$totalSwap++;
					}
					else{
						$totalSwapAttempt++;
					}
				}

				$selectAllLeaveQuery = "select * from rosterdb.leavetable where leave_requester='$username' and MONTH(leave_date_from)='$all_month_arr[$k]' and YEAR(leave_date_from)='$year'";
				$selectAllLeaveLists = \DB::select(\DB::raw($selectAllLeaveQuery));
				foreach($selectAllLeaveLists as $selectLeaveList){
					if($selectLeaveList->leave_status == 'Approved'){
						$totalLeave++;
					}
					else{
						$totalLeaveAttempt++;
					}
				}
			}
		}
		else{
			$selectShiftsQuery = "select shift_id from shiftTable where MONTH(shift_date)='$month' order by shift_id desc limit ".cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$selectedShiftLists = \DB::select(\DB::raw($selectShiftsQuery));
			//echo $selectShiftsQuery;
			$shiftids = '';
			foreach($selectedShiftLists as $selectedShiftList){
				$shiftids .= $selectedShiftList->shift_id.',';
			}
			$shiftids = trim($shiftids,',');
			//echo $shiftids;
			$selectAllShiftsQuery = "select * from rosterdb.rostertable where roster_table_id IN (select MAX(roster_table_id) from rosterdb.rostertable where user_id='$username' and MONTH(shift_date)='$month' and YEAR(shift_date)='$year' and shift_id in ($shiftids) GROUP BY shift_date)";
			echo $selectAllShiftsQuery;
			$selectAllShiftsLists = \DB::select(\DB::raw($selectAllShiftsQuery));
			$totalShiftCount = 0;
			$totalDay = 0;
			$totalNight = 0;
			$totalEvening = 0;
			$totalSwap = 0;
			$totalSwapAttempt = 0;
			$totalLeave = 0;
			$totalLeaveAttempt = 0;
			$totalIIG = 0;
			$totalICX = 0;
			$totalSur = 0;
			$totalBO = 0;
			$totalShiftLeader = 0;

			foreach($selectAllShiftsLists as $selectAllShiftsList){
				$totalShiftCount++;
				if($selectAllShiftsList->shift_time == 'day'){
					$totalDay++;
				}
				if($selectAllShiftsList->shift_time == 'evening'){
					$totalEvening++;
				}
				if($selectAllShiftsList->shift_time == 'night'){
					$totalNight++;
				}
				if($selectAllShiftsList->shift_position == 'shift_leader'){
					$totalShiftLeader++;
				}
				if($selectAllShiftsList->shift_position == 'bo'){
					$totalBO++;
				}
				if($selectAllShiftsList->shift_position == 'sur'){
					$totalSur++;
				}
				if($selectAllShiftsList->shift_position == 'iig'){
					$totalIIG++;
				}
				if($selectAllShiftsList->shift_position == 'icx'){
					$totalICX++;
				}

			}

			$selectAllSwapQuery = "select * from rosterdb.swaptable where swapRequester='$username' and MONTH(swapShift1)='$month' and YEAR(swapShift1)='$year'";
			$selectAllSwapLists = \DB::select(\DB::raw($selectAllSwapQuery));
			foreach($selectAllSwapLists as $selectSwapList){
				if($selectSwapList->swapStatus == 'Approved'){
					$totalSwap++;
				}
				else{
					$totalSwapAttempt++;
				}
			}

			$selectAllLeaveQuery = "select * from rosterdb.leavetable where leave_requester='$username' and MONTH(leave_date_from)='$month' and YEAR(leave_date_from)='$year'";
			$selectAllLeaveLists = \DB::select(\DB::raw($selectAllLeaveQuery));
			foreach($selectAllLeaveLists as $selectLeaveList){
				if($selectLeaveList->leave_status == 'Approved'){
					$totalLeave++;
				}
				else{
					$totalLeaveAttempt++;
				}
			}
		}

		

		date_default_timezone_set('Asia/Dhaka');
		$currentYear = date('Y', time());
		if(!$month){
			$month = (int)(date("m"));
			$year = $currentYear;
		}
		$yearListArr = array();
		//return $year-5;
		$initialValue = $currentYear-1;
		$limit = $year +5;
		for($i=$initialValue;$i<$limit;$i++){
			array_push($yearListArr, $i);
			//echo $i;
		}
		$rosterUserQuery = "select * from login_plugin_db.login_table where dept='NOC'";
		$rosterUserList = \DB::select(\DB::raw($rosterUserQuery));
		return view('roster.profile',compact('totalShiftCount','totalDay','totalEvening','totalNight','totalSwap','totalSwapAttempt','totalLeave','totalLeaveAttempt','totalSwapAttempt','totalLeave','totalShiftLeader','totalBO','totalSur','totalIIG','totalICX','yearListArr','rosterUserList','year','month','username','monthListArr','app'));
		// return 'totalShiftCount '.$totalShiftCount.'  totalDay '.$totalDay.'  totalEvening '.$totalEvening.'  totalSwap '.$totalSwap.'  totalSwapAttempt '.$totalSwapAttempt.'  totalLeave '.$totalLeave.'  totalLeaveAttempt '.$totalLeaveAttempt;
		
		
	}
	public function swap_view(){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				$app = 'appUser';
			}
		}
		$rosterUserQuery = "select * from login_plugin_db.login_table where dept='NOC'";
		$rosterUserList = \DB::select(\DB::raw($rosterUserQuery));
		return view('roster.swap',compact('rosterUserList','app'));
	}
	public function leave_view(){
		$val = $this->is_admin();
		$user_id = $_SESSION['dashboard_user_id'];
		date_default_timezone_set('Asia/Dhaka');
		$year = date('Y', time());
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				$app = 'appUser';
			}
		}
		$rosterUserQuery = "select * from login_plugin_db.login_table where dept='NOC'";
		$rosterUserList = \DB::select(\DB::raw($rosterUserQuery));
		$selectLeaveCountQuery = "SELECT sum(DATEDIFF(leave_date_to,leave_date_from)+1) as duration FROM `leavetable` where leave_requester = '$user_id' and year(leave_date_from) =$year and year(leave_date_to) = $year and leave_status='Approved'";
		$leaveCountLists = \DB::select(\DB::raw($selectLeaveCountQuery));
		if(count($leaveCountLists)>0){
			$leaveCount = $leaveCountLists[0]->duration;
		}
		else{
			$leaveCount = 0;
		}
		//echo $selectLeaveCountQuery;
		//return $leaveCount;
		return view('roster.leave',compact('rosterUserList','app','leaveCount'));
	}
	public function swap_requested(){
		$swapRequester = Request::get('firstUser');
		$swapAccepter = Request::get('secondUser');
		$swapReason =addslashes( Request::get('swapReason'));
		$swapRequester = $_SESSION['dashboard_user_id'];

		$requesterSwapDate = Request::get('firstSwapDate');
		$requesterSwapDate = date('Y-m-d', strtotime( $requesterSwapDate));

		$requesterCheckQuery = "select user_id from rosterdb.rostertable where user_id='$swapRequester' and shift_date='$requesterSwapDate'";
		$requesterCheckLists = \DB::select(\DB::raw($requesterCheckQuery));
		if($requesterCheckLists == null){
			$msg = "Swap requester not found at $requesterSwapDate";
			return $this->message($msg);
		}
		//echo $date;
		//$requesterSwapDate = new DateTime($requesterSwapDate);
		date_default_timezone_set('Asia/Dhaka');
		$year = date('Y', time());
		$month = (int)(date("m"));

		$accepterSwapDate = Request::get('secondSwapDate');
		$accepterSwapDate = date('Y-m-d', strtotime( $accepterSwapDate));

		$accepterCheckQuery = "select user_id from rosterdb.rostertable where user_id='$swapAccepter' and shift_date='$accepterSwapDate'";
		$accepterCheckLists = \DB::select(\DB::raw($accepterCheckQuery));
		if($accepterCheckLists == null){
			$msg = "Swap accepter not found at $accepterSwapDate";
			return $this->message($msg);
		}
		$totalSwap = 0;
		$selectAllSwapQuery = "select * from rosterdb.swaptable where swapRequester='$swapRequester' and MONTH(swapShift1)='$month' and YEAR(swapShift1)='$year'";
			$selectAllSwapLists = \DB::select(\DB::raw($selectAllSwapQuery));
			if($selectAllSwapLists != ''){
				foreach($selectAllSwapLists as $selectSwapList){
					if($selectSwapList->swapStatus == 'Approved'){
						$totalSwap++;
					}
				}
			}
		if($totalSwap > 2){
			$msg = "You cannot swap more than 2 times in a month.";
			return $this->message($msg);
		}

		$insertSwapQuery = "insert into rosterdb.swaptable (swapRequester,swapAccepter,swapShift1,swapShift2,swapStatus,reason) values ('$swapRequester','$swapAccepter','$requesterSwapDate','$accepterSwapDate','Pending','$swapReason')";

		\DB::insert(\DB::raw($insertSwapQuery));

		$msg = "Your Request is sent to the Authority";
		return $this->message($msg);
	}
	public function leave_requested(){
		$leaveRequester = Request::get('userName');
		$leaveRequester = $_SESSION['dashboard_user_id'];
		$leave_type = Request::get('leaveType');
		$leaveDateFrom = Request::get('leaveDateFrom');
		$leaveDateTo = Request::get('leaveDateTo');
		$leaveReason = addslashes(Request::get('leaveReason'));
		$leaveDateFrom = date('Y-m-d', strtotime( $leaveDateFrom));
		$leaveDateTo = date('Y-m-d', strtotime( $leaveDateTo));
		//$leaveAccepter = Request::get('secondUser');
		if($leave_type =='roster'){

			$requesterCheckQuery = "select user_id from rosterdb.rostertable where user_id='$leaveRequester' and shift_date='$leaveDateFrom'";
			$requesterCheckLists = \DB::select(\DB::raw($requesterCheckQuery));
			if(count($requesterCheckLists) < '1'){
				$msg = "Leave person not found at $leaveDateFrom";
				return $this->message($msg);
			}
			$insertSwapQuery = "insert into rosterdb.leavetable (leave_requester,leave_date_from,leave_date_to,leave_status,reason,leave_type) values ('$leaveRequester','$leaveDateFrom','$leaveDateTo','Pending','$leaveReason','$leave_type')";

			\DB::insert(\DB::raw($insertSwapQuery));
			$msg = "Your Request is sent to the Authority";
			return $this->message($msg);
		}
		else{
			$insertSwapQuery = "insert into rosterdb.leavetable (leave_requester,leave_date_from,leave_date_to,leave_status,reason,leave_type) values ('$leaveRequester','$leaveDateFrom','$leaveDateTo','Pending','$leaveReason','$leave_type')";

			\DB::insert(\DB::raw($insertSwapQuery));
			$msg = "Your Request is sent to the Authority";
			return $this->message($msg);

		}

		//echo $date;
		//$requesterSwapDate = new DateTime($requesterSwapDate);
		//$accepterSwapDate = Request::get('secondSwapDate');
		//$accepterSwapDate = date('Y-m-d', strtotime( $accepterSwapDate));
		
	}
	public function swap_pending_view(){
		$val = $this->is_admin();
		$userId = $_SESSION['dashboard_user_id'];
		if($userId == "kazi.bozle"){
			$msg = "You are not authorized to see this page";
			return $this->message($msg);
		}

		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
            	exit();
				$app = 'appUser';
			}
		}
		$selectPendingSwapQuery = "select * from rosterdb.swaptable where swapStatus='Pending'";
		$pendingSwapLists = \DB::select(\DB::raw($selectPendingSwapQuery));

		return view('roster.swap_pending_view',compact('pendingSwapLists','app'));
	}
	public function leave_pending_view(){
		$val = $this->is_admin();
		$userId = $_SESSION['dashboard_user_id'];
		if($userId == "kazi.bozle"){
			$msg = "You are not authorized to see this page";
			return $this->message($msg);
		}
		date_default_timezone_set('Asia/Dhaka');
		$year = date('Y', time());
		//return $year;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
            	exit();
				$app = 'appUser';
			}
		}
		$selectPendingLeaveQuery = "select ll.*,(SELECT sum(DATEDIFF(l.leave_date_to,l.leave_date_from)+1) as duration FROM `leavetable` l where l.leave_requester = ll.leave_requester and year(l.leave_date_from) =$year and year(l.leave_date_to) =$year and l.leave_status='Approved') as leave_time from rosterdb.leavetable ll where ll.leave_status='Pending'";
		$pendingLeaveLists = \DB::select(\DB::raw($selectPendingLeaveQuery));
		//echo $selectPendingLeaveQuery;
		return view('roster.leave_pending_view',compact('pendingLeaveLists','app'));
	}
	public function swap_taken_view(){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
            	exit();
				$app = 'appUser';
			}
		}
		$selectPendingSwapQuery = "select * from rosterdb.swaptable order by swap_row_id desc";
		$pendingSwapLists = \DB::select(\DB::raw($selectPendingSwapQuery));

		return view('roster.swap_view',compact('pendingSwapLists','app'));
	}
	public function leave_taken_view(){
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
            	exit();
				$app = 'appUser';
			}
		}
		$selectPendingLeaveQuery = "select * from rosterdb.leavetable order by leave_row_id desc";
		$pendingLeaveLists = \DB::select(\DB::raw($selectPendingLeaveQuery));

		

		return view('roster.leave_view',compact('pendingLeaveLists','app'));
	}
	public function leave_update(){
		$userId = $_SESSION['dashboard_user_id'];
		$isApproved = Request::get('isApproved');
		$leaveRequester = Request::get('userName');
		$leaveId = Request::get('leave_id');
		$leave_type = Request::get('leaveType');

		$leaveDateFrom = Request::get('leaveDateFrom');
		//$leaveDateFrom = date('Y-m-d', strtotime( $leaveDateFrom));
			//echo $date;
			//$requesterSwapDate = new DateTime($requesterSwapDate);
		$leaveDateTo = Request::get('leaveDateTo');
		//$leaveDateTo = date('Y-m-d', strtotime( $leaveDateTo));

		$begin = new DateTime($leaveDateFrom);
		$end = new DateTime($leaveDateTo);
		$end = $end->modify( '+1 day' ); 

		$interval = new \DateInterval('P1D');
		$daterange = new \DatePeriod($begin, $interval ,$end);
		// $date_test_str = date_format($end, 'Y-m-d');
		// echo $date_test_str;
		$isPersonExisted = false;
		$isAtleastOne = false;
		if($leaveRequester =='sakib.ullah' || $leaveRequester =='imtiaz.hossain' || $leaveRequester =='mir.raihan' || $leaveRequester =='saeed.naser' || $leaveRequester =='sadaf.mahmud' || $leaveRequester =='biplob.barua' || $leaveRequester =='tanveer.ahmed'){
			if($userId != 'md.shariful' && $userId != 'razib.hasan' && $userId != 'raihan.parvez' && $userId != 'sajal.kumar'){
				$msg = "You are not authorized to accept this request";
				return $this->message($msg);
			}

		}
		//return $leave_type;
		if($leave_type=='roster'){
				
		
			if($isApproved == 'yes'){



				foreach($daterange as $date){
				    $leaveDate =  $date->format("Y-m-d");
				
				
					$selectRequesterInfoQuery ="select roster_table_id,shift_id,shift_position,shift_time from rosterdb.rostertable where user_id ='$leaveRequester' and shift_date ='$leaveDate'";
					$selectRequesterInfoLists = \DB::select(\DB::raw($selectRequesterInfoQuery));
					
					if($selectRequesterInfoLists == null){
						$isPersonExisted = true;
						
					}
					//return 'asdf';
					//return $selectRequesterInfoLists;
					if($isPersonExisted == false){
						foreach($selectRequesterInfoLists AS $selectRequesterInfoList){
							$requester_roster_table_id = $selectRequesterInfoList->roster_table_id;
							$requester_shift_id = $selectRequesterInfoList->shift_id;
							$requester_shift_position = $selectRequesterInfoList->shift_position;
							$requester_shift_time = $selectRequesterInfoList->shift_time;
						}
						//return $selectRequesterInfoQuery;
						$table_name = 'rosterdb.'.$requester_shift_time.'table';

						$selectUserFromTable = "select shift_member from $table_name where shift_id=$requester_shift_id and shift_position='$requester_shift_position'";
						$selectUserLists = \DB::select(\DB::raw($selectUserFromTable));
						//return $selectUserLists;
						foreach($selectUserLists as $selectUserList){
							$shift_member = $selectUserList->shift_member;
						}
						if($shift_member != ''){
							if (strpos($shift_member, ',') != FALSE){
								$shift_memberArr = explode(',', $shift_member);
								$tempStr = '';
								for($i=0;$i<count($shift_memberArr);$i++){
									if($shift_memberArr[$i] == $leaveRequester){
										//$tempStr .= $swapRequester.',';
									}
									else{
										$tempStr .= $shift_memberArr[$i].','; 
									}
								}
								$tempStr = trim($tempStr,',');
							}
							else{
								$tempStr = '';
							}				
						}
						else{
							$tempStr = '';
						}
						$isAtleastOne = true;
						
						$updateQuery = "update $table_name set shift_member='$tempStr' where shift_id=$requester_shift_id and shift_position='$requester_shift_position'";
						//return $updateQuery;
						\DB::update(\DB::raw($updateQuery));

						$updateRostertableRequesterQuery ="update rosterdb.rostertable set user_id = '' where user_id='$leaveRequester' and shift_date='$leaveDate'";
						\DB::update(\DB::raw($updateRostertableRequesterQuery));
					}
					
				}
				if($isAtleastOne == false){
					$msg = "Leave person not found. Please reject the request";
					//return $this->message($msg);
				}
				else{
					$updateLeaveTableQuery = "update rosterdb.leavetable set leave_status='Approved',approved_by='$userId' where leave_row_id='$leaveId'";
					\DB::update(\DB::raw($updateLeaveTableQuery));
					$msg = "Leave Approved Successfully";
				}
				
			}
			else{
				$updateLeaveTableQuery = "update rosterdb.leavetable set leave_status='Rejected',approved_by='$userId' where leave_row_id='$leaveId'";
				\DB::update(\DB::raw($updateLeaveTableQuery));
				$msg = "Leave rejected Successfully";
				//return $this->message($msg);
			}
		}
		else{
			if($isApproved == 'yes'){
				$updateLeaveTableQuery = "update rosterdb.leavetable set leave_status='Approved',approved_by='$userId' where leave_row_id='$leaveId'";
					\DB::update(\DB::raw($updateLeaveTableQuery));
					$msg = "Leave Approved Successfully";
			}
			else{
				$updateLeaveTableQuery = "update rosterdb.leavetable set leave_status='Rejected',approved_by='$userId' where leave_row_id='$leaveId'";
				\DB::update(\DB::raw($updateLeaveTableQuery));
				$msg = "Leave rejected Successfully";
			}
		}
		//return 'asdf 4';
		return $this->message($msg);
	}
	public function swap_update(){
		$userId = $_SESSION['dashboard_user_id'];
		$isApproved = Request::get('isApproved');
		$swapRequester = Request::get('firstUser');
		$swapAccepter = Request::get('secondUser');
		$swapId = Request::get('swap_id');

		$requesterSwapDate = Request::get('firstSwapDate');
		$requesterSwapDate = date('Y-m-d', strtotime( $requesterSwapDate));
			//echo $date;
			//$requesterSwapDate = new DateTime($requesterSwapDate);
		$accepterSwapDate = Request::get('secondSwapDate');
		$accepterSwapDate = date('Y-m-d', strtotime( $accepterSwapDate));

		if($swapRequester =='sakib.ullah' || $swapRequester =='imtiaz.hossain' || $swapRequester =='mir.raihan' || $swapRequester =='mahbub.hasan' || $swapRequester =='saeed.naser' || $swapRequester =='sadaf.mahmud' || $swapRequester =='biplob.barua'){
			if($userId != 'md.shariful' && $userId != 'razib.hasan' && $userId != 'raihan.parvez' && $userId != 'sajal.kumar'){
				$msg = "You are not authorized to accept this request";
				return $this->message($msg);
			}

		}
		if($isApproved == 'yes'){
			
			//echo $date;
			//$accepterSwapDate = new DateTime($accepterSwapDate);

			$selectAccepterInfoQuery ="select roster_table_id,shift_id,shift_position,shift_time from rosterdb.rostertable where user_id ='$swapAccepter' and shift_date ='$accepterSwapDate'";
			$selectAccepterInfoLists = \DB::select(\DB::raw($selectAccepterInfoQuery));
			if(count($selectAccepterInfoLists) < 1){
					$msg = "Swap person not found please reject the request Successfully";
					return $this->message($msg);
				}
			//return $selectAccepterInfoQuery;
			foreach($selectAccepterInfoLists AS $selectAccepterInfoList){
				$accepter_roster_table_id = $selectAccepterInfoList->roster_table_id;
				$accepter_shift_id = $selectAccepterInfoList->shift_id;
				$accepter_shift_position = $selectAccepterInfoList->shift_position;
				$accepter_shift_time = $selectAccepterInfoList->shift_time;
			}

			$table_name = 'rosterdb.'.$accepter_shift_time.'table';
			//return $table_name;
			$selectUserFromTable = "select shift_member from $table_name where shift_id=$accepter_shift_id and shift_position='$accepter_shift_position'";
			$selectUserLists = \DB::select(\DB::raw($selectUserFromTable));
			//return $selectUserLists;
			foreach($selectUserLists as $selectUserList){
				$shift_member = $selectUserList->shift_member;
			}
			if($shift_member != ''){
				if (strpos($shift_member, ',') != FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						if($shift_memberArr[$i] == $swapAccepter){
							$tempStr .= $swapRequester.',';
						}
						else{
							$tempStr .= $shift_memberArr[$i].','; 
						}
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStr = $swapRequester;
				}				
			}
			else{
				$tempStr = '';
			}
			
			

			$updateQuery = "update $table_name set shift_member='$tempStr' where shift_id=$accepter_shift_id and shift_position='$accepter_shift_position'";
			//return $updateQuery;
			\DB::update(\DB::raw($updateQuery));

			$selectRequesterInfoQuery ="select roster_table_id,shift_id,shift_position,shift_time from rosterdb.rostertable where user_id='$swapRequester' and shift_date='$requesterSwapDate'";
			$selectRequesterInfoLists = \DB::select(\DB::raw($selectRequesterInfoQuery));
			//return $selectRequesterInfoLists;
			foreach($selectRequesterInfoLists AS $selectRequesterInfoList){
				$requester_roster_table_id = $selectRequesterInfoList->roster_table_id;
				$requester_shift_id = $selectRequesterInfoList->shift_id;
				$requester_shift_position = $selectRequesterInfoList->shift_position;
				$requester_shift_time = $selectRequesterInfoList->shift_time;
			}
			$table_name = 'rosterdb.'.$requester_shift_time.'table';
			$selectUserFromTable = "select shift_member from $table_name where shift_id=$requester_shift_id and shift_position='$requester_shift_position'";
			$selectUserLists = \DB::select(\DB::raw($selectUserFromTable));

			foreach($selectUserLists as $selectUserList){
				$shift_member = $selectUserList->shift_member;
			}
			// if($shift_member != ''){
			// 	$shift_memberArr = explode(',', $shift_member);
			// }
			if($shift_member != ''){
				if (strpos($shift_member, ',') != FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						if($shift_memberArr[$i] == $swapRequester){
							$tempStr .= $swapAccepter.',';
						}
						else{
							$tempStr .= $shift_memberArr[$i].','; 
						}
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStr = $swapAccepter;
				}		
			}
			else{
				$tempStr = '';
			}
	 
			$updateQuery = "update $table_name set shift_member='$tempStr' where shift_id=$requester_shift_id and shift_position='$requester_shift_position'";
			\DB::update(\DB::raw($updateQuery));
			//return $updateQuery;
			$updateRostertableRequesterQuery ="update rosterdb.rostertable set user_id = '$swapAccepter' where user_id='$swapRequester' and shift_date='$requesterSwapDate'";
			\DB::update(\DB::raw($updateRostertableRequesterQuery));

			$updateRostertableRequesterQuery ="update rosterdb.rostertable set user_id = '$swapRequester' where user_id='$swapAccepter' and shift_date='$accepterSwapDate'";
			\DB::update(\DB::raw($updateRostertableRequesterQuery));

			$updateSwapTableQuery = "update rosterdb.swaptable set swapStatus='Approved',approved_by='$userId' where swap_row_id='$swapId'";
			\DB::update(\DB::raw($updateSwapTableQuery));
			$msg = "Swap Approved Successfully";
		}
		else{
			$updateSwapTableQuery = "update rosterdb.swaptable set swapStatus='Rejected',approved_by='$userId' where swap_row_id='$swapId'";
			\DB::update(\DB::raw($updateSwapTableQuery));
			$msg = "Swap rejected Successfully";
		}
		
		return $this->message($msg);
	}
	public function insert_roster(){
		$cell = 'cell';
		$rosterDate = Request::get('rosterDate');
		$yearDate = date('Y', strtotime( $rosterDate));
		$monthDate = date('m',strtotime($rosterDate));
		$rosterDate = $yearDate.'-'.$monthDate.'-01';

		$date = date('Y-m-d', strtotime( $rosterDate));
		$checkQuery = "select roster_table_id from rosterdb.rostertable where shift_date='$date';";
		$checkQueryLists =\DB::select(\DB::raw($checkQuery));
		//return $checkQuery;
		if($checkQueryLists != null){
			$msg = "Roster already exists";
			return $this->message($msg);
		}
		//return 'asdf';
		$dayTableQuery = 'insert into rosterdb.daytable(shift_id,shift_member,shift_position,day_last_updated) values';
		$eveningTableQuery = 'insert into rosterdb.eveningtable (shift_id,shift_member,shift_position,evening_last_updated) values';
		$nightTableQuery = 'insert into rosterdb.nighttable(shift_id,shift_member,shift_position,night_last_updated) values';
		$rosterTableQuery = 'insert into rosterdb.rostertable(user_id,shift_id,shift_date,shift_position,shift_time) values';

		$count = 1;
		$weekdayArr = array();

		$saturdayArr = array();
		$count = 1;
		for($i=1;$i<16;$i++){
			 $saturdayArr[$count] = Request::get('cell'.$count);
			 $count++;
		}

		$sundayArr = array();
		for($i=1;$i<16;$i++){
			$sundayArr[$i] = Request::get('cell'.$count);
			$count++;
		}
		
		$mondayArr = array();
		for($i=1;$i<16;$i++){
			$mondayArr[$i] = Request::get('cell'.$count);
			$count++;
		}
		
		$tuesdayArr = array();
		for($i=1;$i<16;$i++){
			$tuesdayArr[$i] = Request::get('cell'.$count);
			$count++;
		}

		$wednesdayArr = array();
		for($i=1;$i<16;$i++){
			$wednesdayArr[$i] = Request::get('cell'.$count);
			$count++;
		}

		$thursdayArr = array();
		for($i=1;$i<16;$i++){
			$thursdayArr[$i] = Request::get('cell'.$count);
			$count++;
		}

		$fridayArr = array();
		for($i=1;$i<16;$i++){
			$fridayArr[$i] = Request::get('cell'.$count);
			$count++;
		}
		$arrangeArr[1] = $saturdayArr;
		$arrangeArr[2] = $sundayArr;
		$arrangeArr[3] = $mondayArr;
		$arrangeArr[4] = $tuesdayArr;
		$arrangeArr[5] = $wednesdayArr;
		$arrangeArr[6] = $thursdayArr;
		$arrangeArr[7] = $fridayArr;

		$dayArr[1] = 'Saturday';
		$dayArr[2] = 'Sunday';
		$dayArr[3] = 'Monday';
		$dayArr[4] = 'Tuesday';
		$dayArr[5] = 'Wednesday';
		$dayArr[6] = 'Thursday';
		$dayArr[7] = 'Friday';

		//$tempDate = '2016-03-13';
		//$rosterDate = Request::get('rosterDate');
		$currentDay = date('l', strtotime( $rosterDate));
		//return $rosterDate;

		$indexNum = 0;

		for($i = 1;$i<8;$i++){
			if($dayArr[$i] == $currentDay){
				$indexNum = $i;
			}
		}
		$limit = $indexNum;

		$numIndex = 0;
		$rearrangedArr = array();
		$tempCount = 1;
		for($i=$indexNum;$i<8;$i++){
			$rearrangedArr[$tempCount] = $arrangeArr[$i];
			$tempCount++;
		}
		//return $tempCount;
		for($i=1;$i<$limit;$i++){
			$rearrangedArr[$tempCount] = $arrangeArr[$i];
			$tempCount++;
		}
		// $limit = 7-$indexNum;

		// $numIndex = 0;
		// $rearrangedArr = array();
		// $tempCount = 1;
		// for($i=$indexNum;$i<8;$i++){
		// 	$rearrangedArr[$tempCount] = $arrangeArr[$i];
		// 	$tempCount++;
		// }
		// for($i=1;$i<$limit+1;$i++){
		// 	$rearrangedArr[$tempCount] = $arrangeArr[$i];
		// 	$tempCount++;
		// }
		$date = date('Y/m/d', strtotime( $rosterDate));
		//echo $date;
		$date_test = new DateTime($date);
		$year = date_format($date_test, 'Y');
		$month = date_format($date_test, 'm');
		$day = date_format($date_test, 'd');
		$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		$numOfDaysRoster = $numOfDays - $day;
		$dayCount = $day;
		$loopLimit = ceil($numOfDaysRoster/7);
		date_default_timezone_set('Asia/Dhaka');
		$currentDate = date('Y/m/d h:i:s', time());
		//echo $currentDate;

		for($i=1;$i<$loopLimit+1;$i++){
			for($j=1;$j<8;$j++){
				$shiftDateStr = $year.'-'.$month.'-'.$dayCount;
				$shiftTableQuery = "insert into rosterdb.shifttable (shift_date) values ('".$shiftDateStr."')";
				$insertShiftTable =\DB::insert(\DB::raw($shiftTableQuery));
				$getLatestShiftIdQuery = 'select shift_id from rosterdb.shifttable order by shift_id desc limit 1';
				$getLatestShiftIdLists =\DB::select(\DB::raw($getLatestShiftIdQuery));
				$getLatestShiftId = '';
				foreach($getLatestShiftIdLists as $getLatestShiftIdList){
					$getLatestShiftId = $getLatestShiftIdList->shift_id;
				}
				// echo $getLatestShiftId;
				for($k=1;$k<16;$k++){
					//echo $rearrangedArr[$j][$k].'<br>';
					$singleValueArr = explode('-', $rearrangedArr[$j][$k]);
					if($singleValueArr[1] == 'day'){
						$shiftMembersArr = explode(',', $singleValueArr[0]);
						$dayTableQuery .= '(';
						$shiftMembersStr = ''; 
						for($m=0;$m<count($shiftMembersArr);$m++){
							$shiftMembersStr .= $shiftMembersArr[$m].',';
							$rosterTableQuery .= "('$shiftMembersArr[$m]','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
						}
						$shiftMembersStr = trim($shiftMembersStr,',');
						$dayTableQuery .= "'$getLatestShiftId',";
						$dayTableQuery .= "'$shiftMembersStr',";
						$dayTableQuery .= "'$singleValueArr[2]',";
						$dayTableQuery .= "'$currentDate'";
						$dayTableQuery .= '),'; 
						
					}
					if($singleValueArr[1] == 'evening'){
						$shiftMembersArr = explode(',', $singleValueArr[0]);
						$eveningTableQuery .= '(';
						$shiftMembersStr = ''; 
						for($m=0;$m<count($shiftMembersArr);$m++){
							$shiftMembersStr .= $shiftMembersArr[$m].',';
							$rosterTableQuery .= "('$shiftMembersArr[$m]','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
						}
						$shiftMembersStr = trim($shiftMembersStr,',');
						$eveningTableQuery .= "'$getLatestShiftId',";
						$eveningTableQuery .= "'$shiftMembersStr',";
						$eveningTableQuery .= "'$singleValueArr[2]',";
						$eveningTableQuery .= "'$currentDate'";
						$eveningTableQuery .= '),'; 
						
					}
					if($singleValueArr[1] == 'night'){
						$shiftMembersArr = explode(',', $singleValueArr[0]);
						$nightTableQuery .= '(';
						$shiftMembersStr = ''; 
						for($m=0;$m<count($shiftMembersArr);$m++){
							$shiftMembersStr .= $shiftMembersArr[$m].',';
							$rosterTableQuery .= "('$shiftMembersArr[$m]','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
						}
						$shiftMembersStr = trim($shiftMembersStr,',');
						$nightTableQuery .= "'$getLatestShiftId',";
						$nightTableQuery .= "'$shiftMembersStr',";
						$nightTableQuery .= "'$singleValueArr[2]',";
						$nightTableQuery .= "'$currentDate'";
						$nightTableQuery .= '),'; 
					}
				}

				$dayCount++;
				if($dayCount > $numOfDays){
					break;
				}
			}	
		}
		$dayTableQuery = trim($dayTableQuery,',');
		//return $dayTableQuery;
		$rosterTableQuery = trim($rosterTableQuery,',');
		$eveningTableQuery = trim($eveningTableQuery,',');
		$nightTableQuery = trim($nightTableQuery,',');

		$insertDayTable =\DB::insert(\DB::raw($dayTableQuery));
		$inserteveningTable=\DB::insert(\DB::raw($eveningTableQuery));
		$insertnightTable =\DB::insert(\DB::raw($nightTableQuery));
		$insertrosterTable =\DB::insert(\DB::raw($rosterTableQuery));
		
		$msg = "Roster Created Successfully";
		return $this->message($msg);
	}

	public function edit_roster(){
		$userId = $_SESSION['dashboard_user_id'];
		if($userId != 'sakib.ullah'  && $userId !='biplob.barua'&& $userId != 'raihan.parvez' && $userId != 'md.shariful' && $userId != 'razib.hasan'  && $userId != 'ahnaf.muttaki'){

			$msg = 'Editing is blocked by management';
			return $this->message($msg);

		}

		
		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
           		exit();
				$app = 'appUser';
			}
		}
		$monthListArr = ['January','February','March','April','May','June','July','August','September','October','November','December'];
		$month = Request::get('month');
		$year = Request::get('year');
		date_default_timezone_set('Asia/Dhaka');
		$currentYear = date('Y', time());
		if(!$month){
			$month = (int)(date("m"));
			$year = $currentYear;
		}
		$yearListArr = array();
		//return $year-5;
		$initialValue = $currentYear-1;
		$limit = $year +5;
		for($i=$initialValue;$i<$limit;$i++){
			array_push($yearListArr, $i);
			//echo $i;
		}
		// $response->header('Access-Control-Allow-Origin', '*');
		//return $currentYear;
		return view('roster.edit_roster',compact('shiftValues','yearListArr','year','month','monthListArr','app'));
	}
	public function return_roster_single(){
		$editDate = Request::get('editDate');
		$editDateArr = explode('<br>', $editDate);
		$editDate = $editDateArr[0];

		$shiftQuery = "select shift_id,shift_date from rosterdb.shifttable where shift_date='$editDate'";
		$shiftLists =\DB::select(\DB::raw($shiftQuery));
		//return $shiftLists;
		foreach($shiftLists as $shiftList){
			$shift_id = $shiftList->shift_id;
		}

		$daytableQuery = "select shift_member,shift_position from rosterdb.daytable where shift_id = $shift_id";
		$daytableLists  = \DB::select(\DB::raw($daytableQuery));

		$shiftValues = array();

		foreach($daytableLists as $daytableList){
			$tempValue = array("dropbox"=>$daytableList->shift_member);
			$shiftValues[] = $tempValue;
			// $dayShiftLeader = $daytableList->shift_member;
			// $daySur = $daytableList->sur;
			// $dayBO = $daytableList->bo;
			// $dayIIG = $daytableList->iig;
			// $dayICX = $daytableList->icx;
		}

		$eveningtableQuery = "select shift_member,shift_position from rosterdb.eveningtable where shift_id = $shift_id";
		$eveningtableLists  = \DB::select(\DB::raw($eveningtableQuery));

		foreach($eveningtableLists as $eveningtableList){
			$tempValue = array("dropbox"=>$eveningtableList->shift_member);
			$shiftValues[] = $tempValue;
			// $eveningShiftLeader = $eveningtableList->shift_member;
			// $eveningSur = $eveningtableList->sur;
			// $eveningBO = $eveningtableList->bo;
			// $eveningIIG = $eveningtableList->iig;
			// $eveningICX = $eveningtableList->icx;
		}

		$nighttableQuery = "select shift_member,shift_position from rosterdb.nighttable where shift_id = $shift_id";
		$nighttableLists  = \DB::select(\DB::raw($nighttableQuery));

		foreach($nighttableLists as $nighttableList){
			$tempValue = array("dropbox"=>$nighttableList->shift_member);
			$shiftValues[] = $tempValue;
			// $nightShiftLeader = $nighttableList->shift_member;
			// $nightSur = $nighttableList->sur;
			// $nightBO = $nighttableList->bo;
			// $nightIIG = $nighttableList->iig;
			// $nightICX = $nighttableList->icx;
		}
		$json ='{"records":'.json_encode($shiftValues).'}';
		return $json;
	}
	public function edit_single_view(){
		$userId = $_SESSION['dashboard_user_id'];
		if($userId != 'sakib.ullah' &&  $userId !='mahbub.hasan' && $userId !='kazi.bozle' && $userId != 'biplob.barua' && $userId != 'raihan.parvez' && $userId != 'ali.mehraj' && $userId != 'niaz.mithu' && $userId != 'md.shariful' && $userId != 'razib.hasan' && $userId != 'ahnaf.muttaki'){

			$msg = 'Editing is blocked by management';
			return $this->message($msg);

		}

		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				header('Location:../../login_plugin/login.php');
           		exit();
				$app = 'appUser';
			}
		}
		$editDate = Request::get('editDate');
		$editDateArr = explode('<br>', $editDate);
		$editDate = $editDateArr[0];
		//$editDate = '2016-03-01';
		//return $editDate;

		$shiftQuery = "select shift_id,shift_date from rosterdb.shifttable where shift_date='$editDate'";
		$shiftLists =\DB::select(\DB::raw($shiftQuery));
		//return $shiftQuery;

		foreach($shiftLists as $shiftList){
			$shift_id = $shiftList->shift_id;
		}
		return view('roster.roster_single_edit',compact('editDate','shift_id','app'));
		// return view('roster.roster_single_edit',compact('editDate','dayShiftLeader','daySur','dayBO','dayIIG','dayICX','eveningShiftLeader','eveningSur','eveningBO','eveningIIG','eveningICX','nightShiftLeader','nightSur','nightBO','nightIIG','nightICX'))
	}
	public function update_single_roster(){


		$editDate = Request::get('editDate');

		date_default_timezone_set('Asia/Dhaka');
		$currentDate = date('Y-m-d', time());
		//$todayTimeTemp = strtotime($currentDate);
		$date_test = new DateTime($currentDate);
		
		//////////////// Update Past Roster Day Count/////////// 
		$todayTime = $date_test->modify('-30 day');
		$todayTime = date_format($date_test, 'Y-m-d');
		//echo "Today Date : ".$todayTime;
		//echo "Edite Date : ".$edit
		$todayTime = strtotime($todayTime);

		$editTime = strtotime($editDate);
		$editMonthTime = new Datetime($editDate);
		$editTimeMonth = date("F", strtotime($editDate));
		if($editTime <= $todayTime){
			$msg = "Too Late to Edit Roster";
			return $this->message($msg);
		}
		
		$shift_id = Request::get('shift_id');
		//return $shift_id;
		$singledayArr = array();
		$count = 1;
		for($i=1;$i<16;$i++){
			 $singledayArr[$count] = Request::get('cell'.$count);
			 $count++;
		}
		//return $singledayArr;
		$inputMemberCount = 1;
		$getDayRowIdQuery = "select day_row_id from rosterdb.daytable where shift_id =$shift_id order by day_row_id asc";
		$getDayRowIdLists = \DB::select(\DB::raw($getDayRowIdQuery));
		foreach($getDayRowIdLists as $getDayRowIdList){
			$tempArr = explode('-', $singledayArr[$inputMemberCount]); 
			//$shiftMembersArr = explode(',', $tempArr[0]);
			$updateDayTableQuery = "update rosterdb.daytable set shift_member='$tempArr[0]' where day_row_id=$getDayRowIdList->day_row_id";
			\DB::update(\DB::raw($updateDayTableQuery));
			// echo $updateDayTableQuery;
			$inputMemberCount++;
		}
		//return '';
		$getEveningRowIdQuery = "select evening_row_id from rosterdb.eveningtable where shift_id =$shift_id order by evening_row_id asc";
		$getEveningRowIdLists = \DB::select(\DB::raw($getEveningRowIdQuery));
		foreach($getEveningRowIdLists as $getEveningRowIdList){
			$tempArr = explode('-', $singledayArr[$inputMemberCount]); 
			$updateEveningTableQuery = "update rosterdb.eveningtable set shift_member='$tempArr[0]' where evening_row_id=$getEveningRowIdList->evening_row_id";
			\DB::update(\DB::raw($updateEveningTableQuery));
			$inputMemberCount++;
		}

		$getNightRowIdQuery = "select night_row_id from rosterdb.nighttable where shift_id =$shift_id order by night_row_id asc";
		$getNightRowIdLists = \DB::select(\DB::raw($getNightRowIdQuery));
		foreach($getNightRowIdLists as $getNightRowIdList){
			$tempArr = explode('-', $singledayArr[$inputMemberCount]); 
			$updateNightTableQuery = "update rosterdb.nighttable set shift_member='$tempArr[0]' where night_row_id=$getNightRowIdList->night_row_id";
			\DB::update(\DB::raw($updateNightTableQuery));
			$inputMemberCount++;
		}

		for($j=1;$j<16;$j++){
			$tempStr = $singledayArr[$j];
			$tempArr = explode('-', $tempStr);
			$memberStr = $tempArr[0];
			$shift_time = $tempArr[1];
			$shift_position = $tempArr[2];
			if($memberStr != ''){
				$tempArr = explode(',', $memberStr); 
				//return $tempArr;
				for($k=0;$k<count($tempArr);$k++){
					$selectQuery = "select user_id,roster_table_id from rosterdb.rostertable where shift_date='$editDate' and shift_position='$shift_position' and shift_time='$shift_time'";
					 $userIdLists = \DB::select(\DB::raw($selectQuery));
					foreach($userIdLists as $userIdList){
						$existed_roster_table_id = $userIdList->roster_table_id;
					}
					// if($existed_user_id == $tempArr[$k]){
					// 	$updateRosterQuery = "update rosterdb.rostertable set user_id = '$tempArr[$k]' where shift_date='$editDate' and shift_position='$shift_position' and shift_time='$shift_time'";
					// 	\DB::update(\DB::raw($updateRosterQuery));
					// }
					// else{
						$deleteRowQuery= "delete from rosterdb.rostertable where roster_table_id=$existed_roster_table_id";
						\DB::delete(\DB::raw($deleteRowQuery));
						//echo $deleteRowQuery.'<br>';
					// }
					// echo $deleteRowQuery.'<br>';
					// echo $insertRosterQuery.'<br><br><br>';
					//return $updateRosterQuery;
				}
				//echo '<br>';
				for($k=0;$k<count($tempArr);$k++){
					$selectQuery = "select user_id,roster_table_id from rosterdb.rostertable where shift_date='$editDate' and shift_position='$shift_position' and shift_time='$shift_time'";
					 $userIdLists = \DB::select(\DB::raw($selectQuery));
					foreach($userIdLists as $userIdList){
						$existed_roster_table_id = $userIdList->roster_table_id;
					}
					$insertRosterQuery = "insert into rosterdb.rostertable (user_id,shift_id,shift_date,shift_position,shift_time) values ('$tempArr[$k]','$shift_id','$editDate','$shift_position','$shift_time')";
					//\DB::insert(\DB::raw($insertRosterQuery));
					// if($existed_user_id == $tempArr[$k]){
					// 	$updateRosterQuery = "update rosterdb.rostertable set user_id = '$tempArr[$k]' where shift_date='$editDate' and shift_position='$shift_position' and shift_time='$shift_time'";
					// 	\DB::update(\DB::raw($updateRosterQuery));
					// }
					// else{
						//$deleteRowQuery= "delete from rosterdb.rostertable where roster_table_id=$existed_roster_table_id";
						//\DB::delete(\DB::raw($deleteRowQuery));
						$insertRosterQuery = "insert into rosterdb.rostertable (user_id,shift_id,shift_date,shift_position,shift_time) values ('$tempArr[$k]','$shift_id','$editDate','$shift_position','$shift_time')";
						\DB::insert(\DB::raw($insertRosterQuery));
					// }
					
					//echo $insertRosterQuery.'<br>';
					//return $updateRosterQuery;
				}
			}
		}
		//return '';
		$msg = "Roster updated Successfully";
		$notice_type = 'General SMS';
		$sms = "Roster of ".$editDate." has been changed.";

		$link = "<script>window.open('http://172.16.136.80/scl_sms_system/public/create_sms?sms=$sms&fault_id=&notice_type=$notice_type&sms_group=')</script>";

        echo $link;

		return $this->message($msg);
	}
	public function view_roster(){
		//dd($_SESSION['dashboard_user_id']);


		$val = $this->is_admin();
		//return $val;
		if($val == 'nopass'){
			header('Location:../../login_plugin/login.php');
            exit();
		}
		else{
			if($val == 'true'){
				$app = 'app';
			}
			if($val == 'false'){
				$app = 'appUser';
			}
		}
		$month = Request::get('month');
		$monthListArr = ['January','February','March','April','May','June','July','August','September','October','November','December'];
		$year = Request::get('year');
		$viewType = Request::get('viewType');

		 

		date_default_timezone_set('Asia/Dhaka');
		$currentYear = date('Y', time());

		/////////////// Ahnaf made the view monthly by default /////////////////////
		$month = (int)(date("m"));
		$year = $currentYear;
		$viewType = "monthly";
		////////////////////////////////////////////////////////////////////////////
		if(!$month){
			$month = (int)(date("m"));
			$year = $currentYear;
		}
		$yearListArr = array();
		//return $year-5;
		$initialValue = $currentYear-1;
		$limit = $year +5;
		for($i=$initialValue;$i<$limit;$i++){
			array_push($yearListArr, $i);
			//echo $i;
		}
		$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		if($viewType =='monthly' ){
			$viewType ='monthly';
			$shiftQuery = "select shift_id,shift_date from rosterdb.shifttable where MONTH(shift_date) = '$month' and YEAR(shift_date) = '$year' order by shift_id asc";
			//$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		}
		if($viewType =='weekly' || $viewType == ''){
			date_default_timezone_set('Asia/Dhaka');
			$currentDay = date('d', time());
			$dateStr = $year.'-'.$month.'-'.$currentDay;
			//$middleDate = date($dateStr);
			//$middleDate2 = date($dateStr);


			$middleDate = new DateTime($dateStr);
			$middleDate2 = new DateTime($dateStr);
			$startDateObj = $middleDate->modify('-30 day');
			$endDateObj   = $middleDate2->modify('+4 day');

			$startDate = date_format($startDateObj, 'Y-m-d');
			$endDate = date_format($endDateObj, 'Y-m-d');
			$tempEndDate = $year.'/'.$month.'/'.$numOfDays;
			$tempDateObj = new DateTime($tempEndDate);

			if($endDateObj > $tempDateObj){
				$startDate = $tempDateObj->modify('-6 day');
				$startDate = date_format($startDate, 'Y-m-d');
			}

			$numOfDays = '7';


			$shiftQuery = "select shift_id,shift_date from rosterdb.shifttable where shift_date between '$startDate' and '$endDate' order by shift_id asc";
			//return $shiftQuery;
			
		}

		
		$shiftLists =\DB::select(\DB::raw($shiftQuery));
		if(!$shiftLists){
			$isExists = false;
			return view('roster.view_roster',compact('shiftArray','yearListArr','year','month','isExists','monthListArr','app','viewType'));
		}

		

		$shiftArray = array();
		$count = 1;
		$json ='{"records":[';
		foreach($shiftLists as $shiftList){

			$tempArr = array();	
			$daytableQuery = "select shift_member,shift_position from rosterdb.daytable where shift_id=$shiftList->shift_id order by day_row_id asc";
			$daytableLists = \DB::select(\DB::raw($daytableQuery));
			//array_push($shiftArray, $shiftList->shift_date);
			$currentDay = date('l', strtotime( $shiftList->shift_date));
			$tempData = $shiftList->shift_date."<br>($currentDay)";
			array_push($shiftArray, $tempData);
			//$shiftArray['shift_date'] = $shiftList->shift_date;
			// $json .='{"users":[';
			foreach($daytableLists as $daytableList){
				$tempArrInner = array();
				// $tempArrInner['shift_member'] = $daytableList->shift_member;
				// $tempArrInner['shift_position'] = $daytableList->shift_position;
				// array_push($tempArrInner, $shiftList->shift_date);
				//$tempStr = '';
				$shift_member = $daytableList->shift_member;
				if($shift_member != ''){
				if (strpos($shift_member, ',') !== FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						$tempStrArr = explode('.', $shift_memberArr[$i]);
						$tempStr .= $tempStrArr[0].','; 
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStrArr = explode('.', $shift_member);
					$tempStr = $tempStrArr[0]; 
				}		
			}
			else{
				$tempStr = '';
			}

				array_push($shiftArray, $tempStr);
				// array_push($shiftArray, $daytableList->shift_position);
				//array_push($tempArr, $tempArrInner);
				// $json .=json_encode($tempArrInner).',';
			}

			$eveningtableQuery = "select shift_member,shift_position from rosterdb.eveningtable where shift_id=$shiftList->shift_id order by evening_row_id asc";
			$eveningtableLists = \DB::select(\DB::raw($eveningtableQuery));
			foreach($eveningtableLists as $eveningtableList){
				$tempArrInner = array();
				// $tempArrInner['shift_member'] = $eveningtableList->shift_member;
				// $tempArrInner['shift_position'] = $eveningtableList->shift_position;
				// array_push($tempArrInner, $shiftList->shift_date);
				$shift_member = $eveningtableList->shift_member;
				if($shift_member != ''){
				if (strpos($shift_member, ',') !== FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						$tempStrArr = explode('.', $shift_memberArr[$i]);
						$tempStr .= $tempStrArr[0].','; 
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStrArr = explode('.', $shift_member);
					$tempStr = $tempStrArr[0]; 
				}		
			}
			else{
				$tempStr = '';
			}

				array_push($shiftArray, $tempStr);
				// array_push($shiftArray, $eveningtableList->shift_member);
				// array_push($shiftArray, $eveningtableList->shift_position);
				//array_push($tempArr, $tempArrInner);
				// $json .=json_encode($tempArrInner).',';
			}

			$nighttableQuery = "select shift_member,shift_position from rosterdb.nighttable 
			where shift_id=$shiftList->shift_id order by night_row_id asc";
			$nighttableLists = \DB::select(\DB::raw($nighttableQuery));
			foreach($nighttableLists as $nighttableList){
				$tempArrInner = array();

				// $tempArrInner['shift_member'] = $nighttableList->shift_member;
				// $tempArrInner['shift_position'] = $nighttableList->shift_position;
				// array_push($tempArrInner, $shiftList->shift_date);
				$shift_member = $nighttableList->shift_member;
				if($shift_member != ''){
				if (strpos($shift_member, ',') != FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						$tempStrArr = explode('.', $shift_memberArr[$i]);
						$tempStr .= $tempStrArr[0].','; 
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStrArr = explode('.', $shift_member);
					$tempStr = $tempStrArr[0]; 
				}		
			}
			else{
				$tempStr = '';
			}
				array_push($shiftArray, $tempStr);
				//array_push($shiftArray, $nighttableList->shift_member);
				// array_push($shiftArray, $nighttableList->shift_position);
				//array_push($tempArr, $tempArrInner);
				// $json .=json_encode($tempArrInner).',';
			}
			// $json = trim($json,',');
			// $json .=']},';
			//$tempStrJson = '{"day$count":'.json_encode($tempArr).'}';;
			// $shiftArray["day".$count."shift_date"] = $shiftList->shift_date;;
			// $shiftArray["day".$count."value"] = $tempArr;
			//$shiftArray['day'.$count] = $tempArr;
			//array_push($shiftArray, $tempArr);
			
			$count++;
		}
		if(isset($_SESSION['dashboard_user_id'])){
			$userId = $_SESSION['dashboard_user_id'];
			$logSelectQuery = "select username from rosterdb.log_user where username='$userId'";
			$logLists = \DB::select(\DB::raw($logSelectQuery));

			if(count($logLists) == 0){
				$logtableQuery = "insert into rosterdb.log_user (username) values ('$userId')";
				\DB::insert(\DB::raw($logtableQuery));
			}
			
		}
		
		//echo $numOfDays;
		//return $shiftArray;
		//return '';
		$isExists = true;
		return view('roster.view_roster',compact('shiftArray','yearListArr','year','month','isExists','numOfDays','monthListArr','app','viewType'));
	}

	// admin view done by Ahnaf
	public function admin_view(){


		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $today = $dt->format('Y-m-d');
		////////////////////////// Morning ///////////////////////////////////
		$morning = array();
        $morning_shift_members_query = 	"SELECT shift_member 
									FROM `daytable` 
									JOIN shifttable ON shifttable.shift_id = daytable.shift_id 
									WHERE shifttable.shift_date = '".$today."'";

		$morning_shift_members = \DB::select(\DB::raw($morning_shift_members_query));

		$morning_person = "";

		foreach ($morning_shift_members as $row) {
			$morning_person .= $row->shift_member.",";
		}

		$morning_person = rtrim($morning_person,",");
		$morning = explode(",",$morning_person);
		$morning_person = "";
		foreach ($morning as $person) {
			$morning_person .= "'".$person."',";
		}
		$morning_person = rtrim($morning_person,",");

		$morning_shift_address_query = "SELECT * FROM rosterdb.emp_address_table WHERE emp_id IN ($morning_person)";
		$morning_address = \DB::select(\DB::raw($morning_shift_address_query));
		////////////////////////////////////////////////////////////////////////


		////////////////////////// Evening ///////////////////////////////////
		$evening = array();

        $evening_shift_members_query = 	"SELECT shift_member 
									FROM `eveningtable` 
									JOIN shifttable ON shifttable.shift_id = eveningtable.shift_id 
									WHERE shifttable.shift_date = '".$today."'";

		$evening_shift_members = \DB::select(\DB::raw($evening_shift_members_query));

		$evening_person = "";

		foreach ($evening_shift_members as $row) {
			$evening_person .= $row->shift_member.",";
		}

		$evening_person = rtrim($evening_person,",");
		$evening = explode(",",$evening_person);
		$evening_person = "";
		foreach ($evening as $person) {
			$evening_person .= "'".$person."',";
		}
		$evening_person = rtrim($evening_person,",");

		$evening_shift_address_query = "SELECT * FROM rosterdb.emp_address_table WHERE emp_id IN ($evening_person)";
		$evening_address = \DB::select(\DB::raw($evening_shift_address_query));
		////////////////////////////////////////////////////////////////////////


		////////////////////////// Night ///////////////////////////////////
		$night = array();

        $night_shift_members_query = "SELECT shift_member 
									FROM `nighttable` 
									JOIN shifttable ON shifttable.shift_id = nighttable.shift_id 
									WHERE shifttable.shift_date = '".$today."'";

		$night_shift_members = \DB::select(\DB::raw($night_shift_members_query));

		$night_person = "";

		foreach ($night_shift_members as $row) {
			$night_person .= $row->shift_member.",";
		}

		$night_person = rtrim($night_person,",");
		$night = explode(",",$night_person);
		$night_person = "";
		foreach ($night as $person) {
			$night_person .= "'".$person."',";
		}
		$night_person = rtrim($night_person,",");

		$night_shift_address_query = "SELECT * FROM rosterdb.emp_address_table WHERE emp_id IN ($night_person)";
		$night_address = \DB::select(\DB::raw($night_shift_address_query));
		////////////////////////////////////////////////////////////////////////
		
		// print_r($morning_address);
		// echo "<br>";
		// echo "<br>";
		// print_r($evening_address);
		// echo "<br>";
		// echo "<br>";
		// print_r($night_address);




		// return "";










		// $morning_shift_query = "SELECT daytable.*,emp_address_table.*
		// 						FROM `daytable` 
		// 						JOIN shifttable ON shifttable.shift_id = daytable.shift_id
		// 						JOIN  emp_address_table ON daytable.shift_member = emp_address_table.emp_id
		// 						WHERE shifttable.shift_date = '".$today."'";

		// echo $morning_shift_query;
		// dd("Stop");							

		// $evening_shift_query = "SELECT eveningtable.*,emp_address_table.*
		// 						FROM `eveningtable` 
		// 						JOIN shifttable ON shifttable.shift_id = eveningtable.shift_id
		// 						JOIN  emp_address_table ON eveningtable.shift_member = emp_address_table.emp_id
		// 						WHERE shifttable.shift_date = '".$today."'";


		// $night_shift_query =  	"SELECT nighttable.*,emp_address_table.*
		// 						FROM `nighttable` 
		// 						JOIN shifttable ON shifttable.shift_id = nighttable.shift_id
		// 						JOIN  emp_address_table ON nighttable.shift_member = emp_address_table.emp_id
		// 						WHERE shifttable.shift_date = '".$today."'";

		// $morning = \DB::select(\DB::raw($morning_shift_query));
		// $evening = \DB::select(\DB::raw($evening_shift_query));
		// $night = \DB::select(\DB::raw($night_shift_query));
								

		return view('admin_view.view_roster',compact('morning_address','evening_address','night_address','today'));
	}
	//
	public function plain_roster_view(){
		// $val = $this->is_admin();
		// //return $val;
		// if($val == 'nopass'){
		// 	header('Location:../../login_plugin/login.php');
  //           exit();
		// }
		// else{
		// 	if($val == 'true'){
		// 		$app = 'app';
		// 	}
		// 	if($val == 'false'){
		// 		$app = 'appUser';
		// 	}
		// }
		$app = 'user_hasan';
		$session_value = 'hasan.hasan';
		$month = Request::get('month');
		$monthListArr = ['January','February','March','April','May','June','July','August','September','October','November','December'];
		$year = Request::get('year');
		$viewType = Request::get('viewType');

		date_default_timezone_set('Asia/Dhaka');
		$currentYear = date('Y', time());
		if(!$month){
			$month = (int)(date("m"));
			$year = $currentYear;
		}
		$yearListArr = array();
		//return $year-5;
		$initialValue = $currentYear-1;
		$limit = $year +5;
		for($i=$initialValue;$i<$limit;$i++){
			array_push($yearListArr, $i);
			//echo $i;
		}
		$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		if($viewType =='monthly' ){
			$viewType ='monthly';
			$shiftQuery = "select shift_id,shift_date from rosterdb.shifttable where MONTH(shift_date) = '$month' and YEAR(shift_date) = '$year' order by shift_id asc";
			//$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		}
		if($viewType =='weekly' || $viewType == ''){
			date_default_timezone_set('Asia/Dhaka');
			$currentDay = date('d', time());
			$dateStr = $year.'-'.$month.'-'.$currentDay;
			//$middleDate = date($dateStr);
			//$middleDate2 = date($dateStr);


			$middleDate = new DateTime($dateStr);
			$middleDate2 = new DateTime($dateStr);
			$startDateObj = $middleDate->modify('-3 day');
			$endDateObj   = $middleDate2->modify('+4 day');

			$startDate = date_format($startDateObj, 'Y-m-d');
			$endDate = date_format($endDateObj, 'Y-m-d');
			$tempEndDate = $year.'/'.$month.'/'.$numOfDays;
			$tempDateObj = new DateTime($tempEndDate);

			if($endDateObj > $tempDateObj){
				$startDate = $tempDateObj->modify('-6 day');
				$startDate = date_format($startDate, 'Y-m-d');
			}

			$numOfDays = '7';


			$shiftQuery = "select shift_id,shift_date from rosterdb.shifttable where shift_date between '$startDate' and '$endDate' order by shift_id asc";
			//return $shiftQuery;
			
		}

		
		$shiftLists =\DB::select(\DB::raw($shiftQuery));
		if(!$shiftLists){
			$isExists = false;
			return view('roster.plain_roster_view',compact('shiftArray','yearListArr','year','month','isExists','monthListArr','app','viewType'));
		}

		

		$shiftArray = array();
		$count = 1;
		$json ='{"records":[';
		foreach($shiftLists as $shiftList){

			$tempArr = array();	
			$daytableQuery = "select shift_member,shift_position from rosterdb.daytable where shift_id=$shiftList->shift_id order by day_row_id asc";
			$daytableLists = \DB::select(\DB::raw($daytableQuery));
			//array_push($shiftArray, $shiftList->shift_date);
			$currentDay = date('l', strtotime( $shiftList->shift_date));
			$tempData = $shiftList->shift_date."<br>($currentDay)";
			array_push($shiftArray, $tempData);
			//$shiftArray['shift_date'] = $shiftList->shift_date;
			// $json .='{"users":[';
			foreach($daytableLists as $daytableList){
				$tempArrInner = array();
				// $tempArrInner['shift_member'] = $daytableList->shift_member;
				// $tempArrInner['shift_position'] = $daytableList->shift_position;
				// array_push($tempArrInner, $shiftList->shift_date);
				//$tempStr = '';
				$shift_member = $daytableList->shift_member;
				if($shift_member != ''){
				if (strpos($shift_member, ',') !== FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						$tempStrArr = explode('.', $shift_memberArr[$i]);
						$tempStr .= $tempStrArr[0].','; 
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStrArr = explode('.', $shift_member);
					$tempStr = $tempStrArr[0]; 
				}		
			}
			else{
				$tempStr = '';
			}

				array_push($shiftArray, $tempStr);
				// array_push($shiftArray, $daytableList->shift_position);
				//array_push($tempArr, $tempArrInner);
				// $json .=json_encode($tempArrInner).',';
			}

			$eveningtableQuery = "select shift_member,shift_position from rosterdb.eveningtable where shift_id=$shiftList->shift_id order by evening_row_id asc";
			$eveningtableLists = \DB::select(\DB::raw($eveningtableQuery));
			foreach($eveningtableLists as $eveningtableList){
				$tempArrInner = array();
				// $tempArrInner['shift_member'] = $eveningtableList->shift_member;
				// $tempArrInner['shift_position'] = $eveningtableList->shift_position;
				// array_push($tempArrInner, $shiftList->shift_date);
				$shift_member = $eveningtableList->shift_member;
				if($shift_member != ''){
				if (strpos($shift_member, ',') !== FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						$tempStrArr = explode('.', $shift_memberArr[$i]);
						$tempStr .= $tempStrArr[0].','; 
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStrArr = explode('.', $shift_member);
					$tempStr = $tempStrArr[0]; 
				}		
			}
			else{
				$tempStr = '';
			}

				array_push($shiftArray, $tempStr);
				// array_push($shiftArray, $eveningtableList->shift_member);
				// array_push($shiftArray, $eveningtableList->shift_position);
				//array_push($tempArr, $tempArrInner);
				// $json .=json_encode($tempArrInner).',';
			}

			$nighttableQuery = "select shift_member,shift_position from rosterdb.nighttable where shift_id=$shiftList->shift_id order by night_row_id asc";
			$nighttableLists = \DB::select(\DB::raw($nighttableQuery));
			foreach($nighttableLists as $nighttableList){
				$tempArrInner = array();

				// $tempArrInner['shift_member'] = $nighttableList->shift_member;
				// $tempArrInner['shift_position'] = $nighttableList->shift_position;
				// array_push($tempArrInner, $shiftList->shift_date);
				$shift_member = $nighttableList->shift_member;
				if($shift_member != ''){
				if (strpos($shift_member, ',') != FALSE){
					$shift_memberArr = explode(',', $shift_member);
					$tempStr = '';
					for($i=0;$i<count($shift_memberArr);$i++){
						$tempStrArr = explode('.', $shift_memberArr[$i]);
						$tempStr .= $tempStrArr[0].','; 
					}
					$tempStr = trim($tempStr,',');
				}
				else{
					$tempStrArr = explode('.', $shift_member);
					$tempStr = $tempStrArr[0]; 
				}		
			}
			else{
				$tempStr = '';
			}
				array_push($shiftArray, $tempStr);
				//array_push($shiftArray, $nighttableList->shift_member);
				// array_push($shiftArray, $nighttableList->shift_position);
				//array_push($tempArr, $tempArrInner);
				// $json .=json_encode($tempArrInner).',';
			}
			// $json = trim($json,',');
			// $json .=']},';
			//$tempStrJson = '{"day$count":'.json_encode($tempArr).'}';;
			// $shiftArray["day".$count."shift_date"] = $shiftList->shift_date;;
			// $shiftArray["day".$count."value"] = $tempArr;
			//$shiftArray['day'.$count] = $tempArr;
			//array_push($shiftArray, $tempArr);
			
			$count++;
		}
		//return $_SESSION['dashboard_user_id'];
		if(isset($session_value)){
			$userId = $session_value;
			$logSelectQuery = "select username from rosterdb.log_user where username='$userId'";
			$logLists = \DB::select(\DB::raw($logSelectQuery));

			if(count($logLists) == 0){
				$logtableQuery = "insert into rosterdb.log_user (username) values ('$userId')";
				\DB::insert(\DB::raw($logtableQuery));
			}
			
		}
		
		//echo $numOfDays;
		//return $shiftArray;
		//return '';
		$isExists = true;
		return view('roster.plain_roster_view',compact('shiftArray','yearListArr','year','month','isExists','numOfDays','monthListArr','app','viewType'));
	}
	public function view_roster_data(){

		// $json = trim($json,',');
		// $json .= ']}';
		//return $shiftArray;

		
	}
	public function update_roster(){

		$rosterDate = Request::get('rosterDate');
		date_default_timezone_set('Asia/Dhaka');
		//$currentDate = date('Y/m/d h:i:s', time());
		$currentDate = date('Y-m-d', time());
		//$todayTimeTemp = strtotime($currentDate);
		$date_test = new DateTime($currentDate);
		
		$todayTime = $date_test->modify('-1 day');
		$todayTime = date_format($date_test, 'Y-m-d');
		//echo "Today Date : ".$todayTime;
		//echo "Edite Date : ".$edit
		$todayTime = strtotime($todayTime);
		$editTime  = strtotime($rosterDate);
		$editMonthTime = new Datetime($rosterDate);
		$editTimeMonth = date("F", strtotime($rosterDate));
		if($editTime <= $todayTime){
			$msg = "Too Late to Edit Roster";
			return $this->message($msg);
		}

		$cell = 'cell';
		$dayTableQuery = 'insert into rosterdb.daytable(shift_id,shift_member,shift_position,day_last_updated) values';
		$eveningTableQuery = 'insert into rosterdb.eveningtable (shift_id,shift_member,shift_position,evening_last_updated) values';
		$nightTableQuery = 'insert into rosterdb.nighttable(shift_id,shift_member,shift_position,night_last_updated) values';
		$rosterTableQuery = 'insert into rosterdb.rostertable(user_id,shift_id,shift_date,shift_position,shift_time) values';

		$count = 1;
		$weekdayArr = array();

		$saturdayArr = array();
		$count = 1;
		for($i=1;$i<16;$i++){
			 $saturdayArr[$count] = Request::get('cell'.$count);
			 $count++;
		}

		$sundayArr = array();
		for($i=1;$i<16;$i++){
			$sundayArr[$i] = Request::get('cell'.$count);
			$count++;
		}
		
		$mondayArr = array();
		for($i=1;$i<16;$i++){
			$mondayArr[$i] = Request::get('cell'.$count);
			$count++;
		}
		
		$tuesdayArr = array();
		for($i=1;$i<16;$i++){
			$tuesdayArr[$i] = Request::get('cell'.$count);
			$count++;
		}

		$wednesdayArr = array();
		for($i=1;$i<16;$i++){
			$wednesdayArr[$i] = Request::get('cell'.$count);
			$count++;
		}

		$thursdayArr = array();
		for($i=1;$i<16;$i++){
			$thursdayArr[$i] = Request::get('cell'.$count);
			$count++;
		}

		$fridayArr = array();
		for($i=1;$i<16;$i++){
			$fridayArr[$i] = Request::get('cell'.$count);
			$count++;
		}
		$arrangeArr[1] = $saturdayArr;
		$arrangeArr[2] = $sundayArr;
		$arrangeArr[3] = $mondayArr;
		$arrangeArr[4] = $tuesdayArr;
		$arrangeArr[5] = $wednesdayArr;
		$arrangeArr[6] = $thursdayArr;
		$arrangeArr[7] = $fridayArr;

		$dayArr[1] = 'Saturday';
		$dayArr[2] = 'Sunday';
		$dayArr[3] = 'Monday';
		$dayArr[4] = 'Tuesday';
		$dayArr[5] = 'Wednesday';
		$dayArr[6] = 'Thursday';
		$dayArr[7] = 'Friday';

		

		$indexNum = 0;
		
		//$tempDate = '2016-03-13';
		$currentDay = date('l', strtotime( $rosterDate));
		$date = date('Y-m-d', strtotime( $rosterDate));
		//return $rosterDate;
		for($i = 1;$i<8;$i++){
			if($dayArr[$i] == $currentDay){
				$indexNum = $i;
			}
		}
		$limit = $indexNum;

		$numIndex = 0;
		$rearrangedArr = array();
		$tempCount = 1;
		for($i=$indexNum;$i<8;$i++){
			$rearrangedArr[$tempCount] = $arrangeArr[$i];
			$tempCount++;
		}
		//return $tempCount;
		for($i=1;$i<$limit;$i++){
			$rearrangedArr[$tempCount] = $arrangeArr[$i];
			$tempCount++;
		}
		//return $tempCount;
		
		//echo $date;
		$date_test = new DateTime($date);
		$year = date_format($date_test, 'Y');
		$month = date_format($date_test, 'm');
		$day = date_format($date_test, 'd');
		$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		//return $numOfDays;

		$numOfDaysRoster = $numOfDays - $day;
		$dayCount = $day -1;
		//return $dayCount;
		$loopLimit = ceil($numOfDaysRoster/7);
		
		date_default_timezone_set('Asia/Dhaka');
		$currentDate = date('Y/m/d h:i:s', time());

		$startDate = $year.'-'.$month.'-'.$day;
		$endDate = $year.'-'.$month.'-'.$numOfDays;

		$getAllPrevShiftIdQuery = "select shift_id from rosterdb.shifttable where shift_date between '$startDate' and '$endDate'";
		$getAllShiftTables =\DB::select(\DB::raw($getAllPrevShiftIdQuery));

		$deleteFromShiftTableQuery = "delete from rosterdb.shifttable where shift_id IN (";
		$deleteFromDayTableQuery = "delete from rosterdb.daytable where shift_id IN (";
		$deleteFromEveningTableQuery = "delete from rosterdb.eveningtable where shift_id IN (";
		$deleteFromNightTableQuery = "delete from rosterdb.nighttable where shift_id IN (";
		$deleteFromRosterTableQuery = "delete from rosterdb.rostertable where shift_id IN (";

		foreach ($getAllShiftTables as $getAllShiftTable) {
			$deleteFromShiftTableQuery .= $getAllShiftTable->shift_id.',';
			$deleteFromDayTableQuery .= $getAllShiftTable->shift_id.',';
			$deleteFromEveningTableQuery .= $getAllShiftTable->shift_id.',';
			$deleteFromNightTableQuery .= $getAllShiftTable->shift_id.',';
			$deleteFromRosterTableQuery .= $getAllShiftTable->shift_id.',';
		}

		$deleteFromShiftTableQuery = trim($deleteFromShiftTableQuery,',');
		$deleteFromDayTableQuery = trim($deleteFromDayTableQuery,',');
		$deleteFromEveningTableQuery = trim($deleteFromEveningTableQuery,',');
		$deleteFromNightTableQuery = trim($deleteFromNightTableQuery,',');
		$deleteFromRosterTableQuery = trim($deleteFromRosterTableQuery,',');

		$deleteFromShiftTableQuery .= ')';
		$deleteFromDayTableQuery .= ')';
		$deleteFromEveningTableQuery .= ')';
		$deleteFromNightTableQuery .= ')';
		$deleteFromRosterTableQuery .= ')';

		//return $deleteFromShiftTableQuery;

		$deleteFromShiftTable =\DB::delete(\DB::raw($deleteFromShiftTableQuery));
		$deleteFromDayTable=\DB::delete(\DB::raw($deleteFromDayTableQuery));
		$deleteFromEveningTable =\DB::delete(\DB::raw($deleteFromEveningTableQuery));
		$deleteFromNightTable =\DB::delete(\DB::raw($deleteFromNightTableQuery));
		$deleteFromRosterTable =\DB::delete(\DB::raw($deleteFromRosterTableQuery));
		

		//return $getAllShiftTables;

		//echo $currentDate;
		$loopLimit = $loopLimit + 1;
		echo $loopLimit;
		if($loopLimit == '1'){
			$loopLimit = $loopLimit +1;
		}
		for($i=1;$i<$loopLimit;$i++){
			//return 'asdf';
			for($j=1;$j<8;$j++){
				$dayCount++;
				if($dayCount > $numOfDays){
					break;
				}
				$shiftDateStr = $year.'-'.$month.'-'.$dayCount;
				$shiftTableQuery = "insert into rosterdb.shifttable (shift_date) values ('".$shiftDateStr."')";
				$insertShiftTable =\DB::insert(\DB::raw($shiftTableQuery));
				//echo $shiftTableQuery;
				$getLatestShiftIdQuery = 'select shift_id from rosterdb.shifttable order by shift_id desc limit 1';
				$getLatestShiftIdLists =\DB::select(\DB::raw($getLatestShiftIdQuery));
				$getLatestShiftId = '';
				foreach($getLatestShiftIdLists as $getLatestShiftIdList){
					$getLatestShiftId = $getLatestShiftIdList->shift_id;
				}
				//echo $getLatestShiftId;
				for($k=1;$k<16;$k++){
					
					$singleValueArr = explode('-', $rearrangedArr[$j][$k]);
					//echo $rearrangedArr[$j][$k].' $singleValueArr[0]='.$singleValueArr[1].' j='.$j.' k='.$k.'.<br>';
					if($singleValueArr[1] == 'day'){
						$dayTableQuery .= '(';
						if($singleValueArr[0] != ''){
							$shiftMembersArr = explode(',', $singleValueArr[0]);
							$shiftMembersStr = ''; 
							for($m=0;$m<count($shiftMembersArr);$m++){
								$shiftMembersStr .= $shiftMembersArr[$m].',';
								$rosterTableQuery .= "('$shiftMembersArr[$m]','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
							}
						}
						else{
							$shiftMembersStr = ''; 
							$rosterTableQuery .= "('','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
						}
						$shiftMembersStr = trim($shiftMembersStr,',');
						$dayTableQuery .= "'$getLatestShiftId',";
						$dayTableQuery .= "'$shiftMembersStr',";
						$dayTableQuery .= "'$singleValueArr[2]',";
						$dayTableQuery .= "'$currentDate'";
						$dayTableQuery .= '),'; 
						//echo $dayTableQuery;
						
					}
					if($singleValueArr[1] == 'evening'){
						$shiftMembersArr = explode(',', $singleValueArr[0]);
						$eveningTableQuery .= '(';
						$shiftMembersStr = ''; 
						for($m=0;$m<count($shiftMembersArr);$m++){
							$shiftMembersStr .= $shiftMembersArr[$m].',';
							$rosterTableQuery .= "('$shiftMembersArr[$m]','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
						}
						$shiftMembersStr = trim($shiftMembersStr,',');
						$eveningTableQuery .= "'$getLatestShiftId',";
						$eveningTableQuery .= "'$shiftMembersStr',";
						$eveningTableQuery .= "'$singleValueArr[2]',";
						$eveningTableQuery .= "'$currentDate'";
						$eveningTableQuery .= '),'; 
						
					}
					if($singleValueArr[1] == 'night'){
						$shiftMembersArr = explode(',', $singleValueArr[0]);
						$nightTableQuery .= '(';
						$shiftMembersStr = ''; 
						for($m=0;$m<count($shiftMembersArr);$m++){
							$shiftMembersStr .= $shiftMembersArr[$m].',';
							$rosterTableQuery .= "('$shiftMembersArr[$m]','$getLatestShiftId','$shiftDateStr','$singleValueArr[2]','$singleValueArr[1]'),";
						}
						$shiftMembersStr = trim($shiftMembersStr,',');
						$nightTableQuery .= "'$getLatestShiftId',";
						$nightTableQuery .= "'$shiftMembersStr',";
						$nightTableQuery .= "'$singleValueArr[2]',";
						$nightTableQuery .= "'$currentDate'";
						$nightTableQuery .= '),'; 
					}
					
				}

			}	
		}
		$dayTableQuery = trim($dayTableQuery,',');
		$rosterTableQuery = trim($rosterTableQuery,',');
		$eveningTableQuery = trim($eveningTableQuery,',');
		$nightTableQuery = trim($nightTableQuery,',');

		//return $dayTableQuery;

		$insertDayTable =\DB::insert(\DB::raw($dayTableQuery));
		$inserteveningTable=\DB::insert(\DB::raw($eveningTableQuery));
		$insertnightTable =\DB::insert(\DB::raw($nightTableQuery));
		$insertrosterTable =\DB::insert(\DB::raw($rosterTableQuery));

		//return $deleteFromShiftTable;
		
		$msg = "Roster updated Successfully";
		$notice_type = 'General SMS';
		$sms = "Roster of ".$editTimeMonth." has been changed.";

		$link = "<script>window.open('http://172.16.136.80/scl_sms_system/public/create_sms?sms=$sms&fault_id=&notice_type=$notice_type&sms_group=')</script>";

        echo $link;
		return $this->message($msg);
	}
	public function return_roster(){
		$month = Request::get('month');
		$year = Request::get('year');
		$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$startDay = $numOfDays -6;
		$startDate = $year.'-'.$month.'-'.$startDay;
		$endDate = $year.'-'.$month.'-'.$numOfDays;


		$selectAllDateQuery = "select shift_id,shift_date from rosterdb.shifttable where shift_date >= '$startDate' and shift_date <= '$endDate'";
		$allDatesInMonthLists =\DB::select(\DB::raw($selectAllDateQuery));
		//return $selectAllDateQuery;

		foreach($allDatesInMonthLists as $days){
			$weekDayName = date('l', strtotime( $days->shift_date));
			if($weekDayName == 'Saturday'){
				$saturdayShiftId = $days->shift_id;
			}
			else if($weekDayName == 'Sunday'){
				$sundayShiftId = $days->shift_id;
			}
			else if($weekDayName == 'Monday'){
				$mondayShiftId = $days->shift_id;
			}
			else if($weekDayName == 'Tuesday'){
				$tuesdayShiftId = $days->shift_id;
			}
			else if($weekDayName == 'Wednesday'){
				$wednesdayShiftId = $days->shift_id;
			}
			else if($weekDayName == 'Thursday'){
				$thursdayShiftId = $days->shift_id;
			}
			else{
				$fridayShiftId = $days->shift_id;
			}
		}

		$shiftValues = array();
		$dropCount = 1;

		//return $numOfDays;



/**********************************************SATURDAY****************************************************************/
		$getSaturdayDayQuery = "select * from rosterdb.daytable where shift_id = $saturdayShiftId order by day_row_id asc";
		$getSaturdayDayValues =\DB::select(\DB::raw($getSaturdayDayQuery));

		$getSaturdayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $saturdayShiftId order by evening_row_id asc";
		$getSaturdayEveningValues =\DB::select(\DB::raw($getSaturdayEveningQuery));

		$getSaturdayNightQuery = "select * from rosterdb.nighttable where shift_id = $saturdayShiftId order by night_row_id asc";
		$getSaturdayNightValues =\DB::select(\DB::raw($getSaturdayNightQuery));
		//return $getSaturdayDayValues;
		foreach($getSaturdayDayValues as $getSaturdayDayValue){
			$tempValue = array("dropbox"=>$getSaturdayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		
		//return $json;
		foreach($getSaturdayEveningValues as $getSaturdayEveningValue){
			$tempValue = array("dropbox"=>$getSaturdayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getSaturdayNightValues as $getSaturdayNightValue){
			$tempValue = array("dropbox"=>$getSaturdayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}





/**********************************************SUNDAY****************************************************************/
		$getSundayDayQuery = "select * from rosterdb.daytable where shift_id = $sundayShiftId order by day_row_id asc";
		$getSundayDayValues =\DB::select(\DB::raw($getSundayDayQuery));

		$getSundayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $sundayShiftId order by evening_row_id asc";
		$getSundayEveningValues =\DB::select(\DB::raw($getSundayEveningQuery));

		$getSundayNightQuery = "select * from rosterdb.nighttable where shift_id = $sundayShiftId order by night_row_id asc";
		$getSundayNightValues =\DB::select(\DB::raw($getSundayNightQuery));

		foreach($getSundayDayValues as $getSundayDayValue){
			$tempValue = array("dropbox"=>$getSundayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getSundayEveningValues as $getSundayEveningValue){
			$tempValue = array("dropbox"=>$getSundayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getSundayNightValues as $getSundayNightValue){
			$tempValue = array("dropbox"=>$getSundayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}



/**********************************************MONDAY****************************************************************/
		$getMondayDayQuery = "select * from rosterdb.daytable where shift_id = $mondayShiftId order by day_row_id asc";
		$getMondayDayValues =\DB::select(\DB::raw($getMondayDayQuery));

		$getMondayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $mondayShiftId order by evening_row_id asc";
		$getMondayEveningValues =\DB::select(\DB::raw($getMondayEveningQuery));

		$getMondayNightQuery = "select * from rosterdb.nighttable where shift_id = $mondayShiftId order by night_row_id asc";
		$getMondayNightValues =\DB::select(\DB::raw($getMondayNightQuery));

		foreach($getMondayDayValues as $getMondayDayValue){
			$tempValue = array("dropbox"=>$getMondayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getMondayEveningValues as $getMondayEveningValue){
			$tempValue = array("dropbox"=>$getMondayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getMondayNightValues as $getMondayNightValue){
			$tempValue = array("dropbox"=>$getMondayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}




/**********************************************TUESDAY****************************************************************/
		$getTuesdayDayQuery = "select * from rosterdb.daytable where shift_id = $tuesdayShiftId order by day_row_id asc";
		$getTuesdayDayValues =\DB::select(\DB::raw($getTuesdayDayQuery));

		$getTuesdayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $tuesdayShiftId order by evening_row_id asc";
		$getTuesdayEveningValues =\DB::select(\DB::raw($getTuesdayEveningQuery));

		$getTuesdayNightQuery = "select * from rosterdb.nighttable where shift_id = $tuesdayShiftId order by night_row_id asc";
		$getTuesdayNightValues =\DB::select(\DB::raw($getTuesdayNightQuery));

		foreach($getTuesdayDayValues as $getTuesdayDayValue){
			$tempValue = array("dropbox"=>$getTuesdayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getTuesdayEveningValues as $getTuesdayEveningValue){
			$tempValue = array("dropbox"=>$getTuesdayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getTuesdayNightValues as $getTuesdayNightValue){
			$tempValue = array("dropbox"=>$getTuesdayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}




/**********************************************WEDNESDAY****************************************************************/
		$getWednesdayDayQuery = "select * from rosterdb.daytable where shift_id = $wednesdayShiftId order by day_row_id asc";
		$getWednesdayDayValues =\DB::select(\DB::raw($getWednesdayDayQuery));

		$getWednesdayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $wednesdayShiftId order by evening_row_id asc";
		$getWednesdayEveningValues =\DB::select(\DB::raw($getWednesdayEveningQuery));

		$getWednesdayNightQuery = "select * from rosterdb.nighttable where shift_id = $wednesdayShiftId order by night_row_id asc";
		$getWednesdayNightValues =\DB::select(\DB::raw($getWednesdayNightQuery));

		foreach($getWednesdayDayValues as $getWednesdayDayValue){
			$tempValue = array("dropbox"=>$getWednesdayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getWednesdayEveningValues as $getWednesdayEveningValue){
			$tempValue = array("dropbox"=>$getWednesdayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getWednesdayNightValues as $getWednesdayNightValue){
			$tempValue = array("dropbox"=>$getWednesdayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}




/**********************************************THURSDAY****************************************************************/
		$getThursdayDayQuery = "select * from rosterdb.daytable where shift_id = $thursdayShiftId order by day_row_id asc";
		$getThursdayDayValues =\DB::select(\DB::raw($getThursdayDayQuery));

		$getThursdayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $thursdayShiftId order by evening_row_id asc";
		$getThursdayEveningValues =\DB::select(\DB::raw($getThursdayEveningQuery));

		$getThursdayNightQuery = "select * from rosterdb.nighttable where shift_id = $thursdayShiftId order by night_row_id asc";
		$getThursdayNightValues =\DB::select(\DB::raw($getThursdayNightQuery));

		foreach($getThursdayDayValues as $getThursdayDayValue){
			$tempValue = array("dropbox"=>$getThursdayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getThursdayEveningValues as $getThursdayEveningValue){
			$tempValue = array("dropbox"=>$getThursdayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getThursdayNightValues as $getThursdayNightValue){
			$tempValue = array("dropbox"=>$getThursdayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}






/**********************************************FRIDAY****************************************************************/
		$getFridayDayQuery = "select * from rosterdb.daytable where shift_id = $fridayShiftId order by day_row_id asc";
		$getFridayDayValues =\DB::select(\DB::raw($getFridayDayQuery));

		$getFridayEveningQuery = "select * from rosterdb.eveningtable where shift_id = $fridayShiftId order by evening_row_id asc";
		$getFridayEveningValues =\DB::select(\DB::raw($getFridayEveningQuery));

		$getFridayNightQuery = "select * from rosterdb.nighttable where shift_id = $fridayShiftId order by night_row_id asc";
		$getFridayNightValues =\DB::select(\DB::raw($getFridayNightQuery));

		foreach($getFridayDayValues as $getFridayDayValue){
			$tempValue = array("dropbox"=>$getFridayDayValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getFridayEveningValues as $getFridayEveningValue){
			$tempValue = array("dropbox"=>$getFridayEveningValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}
		foreach($getFridayNightValues as $getFridayNightValue){
			$tempValue = array("dropbox"=>$getFridayNightValue->shift_member);
			$shiftValues[] = $tempValue;
			$dropCount++;
		}





		// $arrangeArr[1] = $saturdayShiftId;
		// $arrangeArr[2] = $sundayShiftId;
		// $arrangeArr[3] = $mondayShiftId;
		// $arrangeArr[4] = $tuesdayShiftId;
		// $arrangeArr[5] = $wednesdayShiftId;
		// $arrangeArr[6] = $thursdayShiftId;
		// $arrangeArr[7] = $fridayShiftId;

		// $dayArr[1] = 'Saturday';
		// $dayArr[2] = 'Sunday';
		// $dayArr[3] = 'Monday';
		// $dayArr[4] = 'Tuesday';
		// $dayArr[5] = 'Wednesday';
		// $dayArr[6] = 'Thursday';
		// $dayArr[7] = 'Friday';

		// $tempDate = '2016-03-13';
		// $currentDay = date('l', strtotime( $startDate));

		// return $allDatesInMonthLists;
		//$num = 1;
		//$shiftTest['dropbox'.$num] = 'dfdfdf'; 
		//$json ='{"records":['.json_encode($shiftValues).']}';
		$json ='{"records":'.json_encode($shiftValues).'}';
		return $json;
	}
}
