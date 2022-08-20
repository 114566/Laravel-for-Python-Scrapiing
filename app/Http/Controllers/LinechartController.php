<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class LinechartController extends Controller
{
	public $times = 24;
	public $data_table = "scrap_data";
	public $country_table = "country_list";
	public $limit_rows = 200000;
	public function index(Request $req)
	{
			$data_tb = $this->data_table;
			$country_tb = $this->country_table;
			// when rows of table is greater than 200,000, delete automatically records by 10,000row.
			$count = DB::table($data_tb)->count();
			if ($count > $this->limit_rows) {
				DB::table($data_tb)->where('id', '<', 10000)->delete();
			}
			/////////display chart///////////
			$date_list = DB::table($data_tb)->select('date')->groupBy('date')->orderBy('date', 'DESC')->get();
			$country_list = DB::table($country_tb)->get();
			return view('chart', compact(['date_list', 'country_list']));
	}
	public function linechart(Request $request)
	{
			$data_tb = $this->data_table;
			$date = $request->input('date') ?? "";
			$per_time = $request->input('per_time') ?? "1";
				if ($date && $per_time) {
					if($per_time == 1){
						$offset = DB::table($data_tb)->select('id')->where('date', $date)->orderBy('id', 'desc')->first();
						$last = $offset->id;
						$start = $last-$this->times;
							$filter_data = DB::table($data_tb)->where('id','>',$start)->where('id','<=',$last)->get();
							return response()->json($filter_data);
					} elseif ($per_time == 4) {
						$offset = DB::table($data_tb)->select('id')->where('date', $date)->orderBy('id', 'desc')->first();
						$last = $offset->id;
						$start = $last-$this->times;
						$array_id = [];
						for($i=0; $i<=6; $i++){
							array_push($array_id, ($start + (4*$i)));
						}
							$filter_data = DB::table($data_tb)->where('id','>',$start)->where('id','<=',$last)->whereIn('id', $array_id)->get();
							return response()->json($filter_data);
					} elseif ($per_time == 24) {
						$dates = explode("-", $date);
						$join = $dates[0]."-".$dates[1];
						//////////////////
						//make days of month array
						$month_day = [];
						for($day_i = 1; $day_i <= 31; $day_i++){
							if($day_i < 10){
								$day_i = '0'.$day_i;
							}
							array_push($month_day, $day_i);
						}
						$mon=[];
						foreach($month_day as $val){
							$month = DB::table($data_tb)->where('date', $join."-".$val)->orderBy('id', 'desc')->first();
							if($month){
								$mon[]=$month;
							}
						}
						$mons = array_filter($mon);
						/////////////////
						// $offset = DB::table($data_tb)->select('id')->where('date', 'like', $join."%")->orderBy('id', 'desc')->first();
						// $last = $offset->id;
						// $start = $last - ($this->times)*30;
						// $array_id = [];
						// for($i=0; $i<=30; $i++) {
						// 	array_push($array_id, ($start + (24*$i)));
						// }
						// 	$filter_data = DB::table($data_tb)->where('id','>',$start)->where('id','<=',$last)->whereIn('id', $array_id)->get();
							return response()->json($mons);
					}
				}
				else {
					$data_tb = $this->data_table;
					$last_record = DB::table($data_tb)->orderBy('id', 'desc')->first('id');
					$limit = $last_record->id - $this->times;
					$data = DB::table($data_tb)->where('id', '>', $limit)->get();
					return response()->json($data);
		}
	}
	// public function dateToMonth (Request $req)
	// {
	// 		$per_time = $req->per_time;
	// 		$date = DB::table($this->data_table)->select('date')->groupBy('date')->get();
	// 		if($per_time == 24){
	// 			// $month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
	// 			$result=[];
				
	// 			foreach($date as $key => $val){
	// 				//get month from 2022-07-30 get 2022-07
	// 				$result[] = explode('-', $val->date)[0]."-".explode('-', $val->date)[1];
	// 			}
	// 				$result = array_unique($result);
	// 				$result = array('result' =>$result, 'status'=> true);
	// 			return response()->json($result);
	// 			$result = array('result'=>$date, 'stautus' => false);
	// 			return response()->json($result);
	// 		}
	// }
}
