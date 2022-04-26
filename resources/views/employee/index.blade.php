@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="page-wrapper">
         <div class="header">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-end">
            <div class="col">
              <h1 class="header-title">
                Employee
               </h1>
            </div>
            </div> 
        </div> 
     </div>
    </div>
<div class="container">
<form style="display: inline" action="{{route('employee.create')}}" method="get">
  <button type="submit" class="btn btn-primary">Click here to add employee</button>
</form>
</div>
<div class="uper">
  <table id="employees_datatable" class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Employee Name</td>
          <td>PIN</td>
          <td>Email</td>
          <td>Contact</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employee as $employees)
        <tr>
            <td>{{$employees->id}}</td>
            <td>{{$employees->first_name}}</td>
            <td>{{$employees->last_name}}</td>
            <td>{{$employees->em_code}}</td>
            <td>{{$employees->email}}</td>
            <td>{{$employees->contact}}</td>
            <div class="d-flex">
            <td>
              <div class="d-flex">
                <a href="{{ route('employee.edit', $employees->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('employee.destroy', $employees->id)}}" method="post">
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
    $('#employees_datatable').DataTable({});
</script>
@endpush

