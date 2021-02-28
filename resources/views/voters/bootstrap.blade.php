@extends('layouts.datatable')
@section('content')

<table id="dtBasicExample" class="table table-striped table-bordered table-sm table-xs table-md table-lg" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm th-xs th-md th-lg">Name
      </th>
      <th class="th-sm th-xs th-md th-lg">Position
      </th>
      <th class="th-sm th-xs th-md th-lg">Office
      </th>
      <th class="th-sm th-xs th-md th-lg">Age
      </th>
      <th class="th-sm th-xs th-md th-lg">Start date
      </th>
      <th class="th-sm th-xs th-md th-lg">Salary
      </th>
    </tr>
  </thead>
  <tbody>
     @if(!empty($employees))
     @foreach($employees as $employee)
      <tr>
      <td>{{ $employee->name }}</td>
      <td>{{ $employee->position }}</td>
      <td>{{ $employee->office }}</td>
      <td>{{ $employee->age }}</td>
      <td>{{ $employee->start_date }}</td>
      <td>{{ $employee->salary }}</td>
    </tr>
    @endforeach
     @endif
    
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot>
</table>

<script type="text/javascript">
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>

@endsection