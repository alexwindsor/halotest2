@extends('app')

@Section('title', 'Edit Activity')

@section('content')

	<div class="container mt-3">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

		<form method="post" action="{{ $form_action }}" id="activityform">

			@csrf

			<div class="form-row">
				<div class="form-group">
					<label>Task code</label>
					<input type="text" name="task_code" class="form-control" placeholder="e.g. HT-001" value="{{ old('task_code') ?? $activity->task_code }}">
				</div>
			</div>

			<div class="form-row">
				<div class="col-6">
					<label>The date of the activity</label>
					<input type="date" name="date" class="form-control" form="activityform" value="{{ old('date') ?? substr($activity->date, 0, 10) }}">
				</div>
			</div>

			<div class="form-row">
				<div class="col-6">
					<label>The cycle month</label>
					<select class="form-control" name="cycle_month" form="activityform">
						<option @if(old('cycle_month') == 'Jan') selected @elseif ($activity->cycle_month == 'Jan') selected @endif value="Jan">Jan</option>
						<option @if(old('cycle_month') == 'Feb') selected @elseif ($activity->cycle_month == 'Feb') selected @endif value="Feb">Feb</option>
						<option @if(old('cycle_month') == 'Mar') selected @elseif ($activity->cycle_month == 'Mar') selected @endif value="Mar">Mar</option>
						<option @if(old('cycle_month') == 'Apr') selected @elseif ($activity->cycle_month == 'Apr') selected @endif value="Apr">Apr</option>
						<option @if(old('cycle_month') == 'May') selected @elseif ($activity->cycle_month == 'May') selected @endif value="May">May</option>
						<option @if(old('cycle_month') == 'Jun') selected @elseif ($activity->cycle_month == 'Jun') selected @endif value="Jun">Jun</option>
						<option @if(old('cycle_month') == 'Jul') selected @elseif ($activity->cycle_month == 'Jul') selected @endif value="Jul">Jul</option>
						<option @if(old('cycle_month') == 'Aug') selected @elseif ($activity->cycle_month == 'Aug') selected @endif value="Aug">Aug</option>
						<option @if(old('cycle_month') == 'Sep') selected @elseif ($activity->cycle_month == 'Sep') selected @endif value="Sep">Sep</option>
						<option @if(old('cycle_month') == 'Oct') selected @elseif ($activity->cycle_month == 'Oct') selected @endif value="Oct">Oct</option>
						<option @if(old('cycle_month') == 'Nov') selected @elseif ($activity->cycle_month == 'Nov') selected @endif value="Nov">Nov</option>
						<option @if(old('cycle_month') == 'Dec') selected @elseif ($activity->cycle_month == 'Dec') selected @endif value="Dec">Dec</option>
					</select>

					<input type="number" name="cycle_year" value="{{ old('cycle_year') ?? $activity->cycle_year }}" min="2000" max="2022" />

				</div>
			</div>

			<div class="form-row mt-2">
				<div class="col-4">
					<label>The team that did the activity</label>
					<select class="form-control" name="team_code" form="activityform">
						<option></option>
						<option @if($activity->team_code == 'MT-01') selected @endif value="MT-01">MT-01</option>
						<option @if($activity->team_code == 'MT-02') selected @endif value="MT-02">MT-02</option>
						<option @if($activity->team_code == 'MT-03') selected @endif value="MT-03">MT-03</option>
						<option @if($activity->team_code == 'MT-04') selected @endif value="MT-04">MT-04</option>
					</select>
				</div>
			</div>

			<div class="form-row mt-2">
				<div class="col-4">
					<label>Contract</label>
					<select class="form-control" name="contract_code" form="activityform">
						<option @if($activity->contract_code == 'ABC123') selected @endif value="ABC123">ABC123</option>
						<option @if($activity->contract_code == 'ABC456') selected @endif value="ABC456">ABC456</option>
						<option @if($activity->contract_code == 'DEF123') selected @endif value="DEF123">DEF123</option>
						<option @if($activity->contract_code == 'DEF456') selected @endif value="DEF456">DEF456</option>
					</select>
				</div>

			</div>

			<div class="form-row mt-2">

				<label>The type of activity</label><br>

				<select class="form-control" name="activity_type">
					<option value=""></option>
					<option @if($activity->activity_type == 'ODOL') selected @endif value="ODOL">ODOL</option>
					<option @if($activity->activity_type == 'Linear') selected @endif value="Linear">Linear</option>
					<option @if($activity->activity_type == 'Full Excavation') selected @endif value="Full Excavation">Full Excavation</option>
				</select>
			</div>

			<div class="form-row mt-2">
				<div class="form-group">
					<label>Area Cleared (SQM)</label>
					<input class="form-control" type="number" name="area_cleared_sqm" value="{{ old('area_cleared_sqm') ?? $activity->area_cleared_sqm }}">
				</div>
				<div class="form-group">
					<label>No. Deminers</label>
					<input class="form-control" type="number" name="num_deminers" value="{{ old('num_deminers') ?? $activity->num_deminers ?? null }}">
				</div>
				<div class="form-group">
					<label>Minutes worked</label>
					<input class="form-control" type="number" name="minutes_worked" value="{{ old('minutes_worked') ?? $activity->minutes_worked ?? null }}">
				</div>

			</div>

			<div class="form-row mt-2">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>

		</form>


	</div>

@endsection
