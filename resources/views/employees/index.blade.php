@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12">

@if(!empty($employees))
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered table-striped table-hover table-condensed">
			<thead>
				<tr class="bg-primary">
		              <th>S.NO</th>
		              <th>@sortablelink('id')</th> <!-- style='visibility: hidden;' -->
		              <th>@sortablelink('name')</th>
		              <th>@sortablelink('position')</th>
		              <th>@sortablelink('office')</th>
		              <th>@sortablelink('age')</th>
		              <th>@sortablelink('start_date')</th>
		              <th>@sortablelink('salary')</th>
            </tr>
			</thead>
			<tbody>
				<?php $i = 0 ?>
				@foreach($employees as $employee)
				<?php $i++ ?>
				<tr>
					<td class="table-text">{{ $i }}</td>
					<td class="table-text">{{ $employee->id }}</td>
					<td class="table-text">{{ $employee->name }}</td>
					<td class="table-text">{{ $employee->position }}</td>
					<td class="table-text">{{ $employee->office }}</td>
					<td class="table-text">{{ $employee->age }}</td>
					<td class="table-text">{{ $employee->start_date }}</td>
					<td class="table-text">{{ $employee->salary }}</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endif
</div>
</div>
{!!$employees->render()!!}
@endsection