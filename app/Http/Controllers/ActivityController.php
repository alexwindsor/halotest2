<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Activity;

class ActivityController extends Controller
{

	public function index(Request $request) {
		$activityrecords = Activity::get();

		return view('activity.index', compact('activityrecords'));
	}

	public function create(Request $request) {
		return view('activity.create');
	}



	public function store(Request $request) {

		$this->validate_data($request);

		Activity::create([
			'task_code' => $request->task_code,
			'date' => $request->date,
			'team_code' => $request->team_code,
			'cycle_month' => $request->cycle_month . ' ' . $request->cycle_year,
			'contract_code' => $request->contract_code,
			'activity_type' => $request->activity_type,
			'area_cleared_sqm' => $request->area_cleared_sqm,
			'num_deminers' => $request->num_deminers,
			'minutes_worked' => $request->minutes_worked,
		]);

		return redirect()->route('activity.index')->with('status', 'New activity record created');
	}




	public function edit(Request $request, $activityId) {

		if (!$activity = Activity::where('id', $activityId)->first()) abort(404);

		$activity->cycle_year = substr($activity->cycle_month, 4);
		$activity->cycle_month = substr($activity->cycle_month, 0, 3);

		if (Route::currentRouteName() == 'activity.edit') $form_action = route('activity.update', $activity->id);
		elseif (Route::currentRouteName() == 'activity.clone') $form_action = route('activity.store', $activity->id);



		return view('activity.edit', compact('activity', 'form_action'));
	}





	public function update(Request $request, $activityId) {

		$this->validate_data($request);

		$activity = Activity::find($activityId);

		$activity->task_code = $request->task_code;
		$activity->date = $request->date;
		$activity->team_code =  $request->team_code;
		$activity->cycle_month = $request->cycle_month . ' ' . $request->cycle_year;
		$activity->contract_code = $request->contract_code;
		$activity->activity_type = $request->activity_type;
		$activity->area_cleared_sqm = $request->area_cleared_sqm;
		$activity->num_deminers = $request->num_deminers;
		$activity->minutes_worked = $request->minutes_worked;

		$activity->save();


		return redirect()->route('activity.index');
	}


	private function validate_data($request) {

		$request->validate([
			'task_code' => 'required',
			'date' => ['required', 'date_format:"Y-m-d"'],
			'cycle_month' => ['required', 'string', 'min:3', 'max:3'],
			'cycle_year' => ['required', 'integer', 'min:2000', 'max:' . date('Y')],
			'team_code' => 'required',
			'contract_code' => 'required',
			'activity_type' => 'required',
			'area_cleared_sqm' => 'required|numeric',
			'num_deminers' => 'required|numeric',
			'minutes_worked' => 'required|numeric',
		]);

	}







}
