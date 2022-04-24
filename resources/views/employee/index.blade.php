@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<form style="display: inline" action="addstudent" method="get">
  <button type="submit" class="btn btn-primary">Click here to add employee</button>
</form>
</div>
<div class="uper">
  <table id="employee_datatable" class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Employee Name</td>
          <td>PIN</td>
          <td>Email</td>
          <td>Contact</td>
          <td>UserRole</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->classlevel}}</td>
            <div class="d-flex">
            <td>
              <div class="d-flex">
                <a href="{{ route('student.edit', $student->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('student.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="ml-4 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
              </div>
            </td>
        
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
@push('scripts')
<script>
    $('#employee_datatable').DataTable({});
</script>
@endpush

