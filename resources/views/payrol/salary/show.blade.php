@extends('layouts.app')

@section('content')
<div class="page-wrapper">
  <div class="message">
  
  <div class="page-wrapper">
            <div class="message"></div>
            <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-2">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                      Payroll View
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
  
    
 
  <div class="container-fluid">
    <div class="row m-b-10"> 
      <div class="col-12"><!-- 
        <button type="button" class="btn btn-info">
          <i class="fa fa-plus">
          </i>
          <a data-toggle="modal" data-target="#salaryModal" data-whatever="@getbootstrap" class="text-white salaryModal">
            <i class="" aria-hidden="true">
            </i> Add Payroll 
          </a>
        </button> -->
        <button type="button" class="btn btn-primary">
          <i class="fa fa-bars">
          </i>
          <a href="{{route('payrol.index')}}" class="text-white">
            <i class="" aria-hidden="true">
            </i>   Payroll List
          </a>
        </button>
      </div>
    </div> 
    <div class="row mt-4">
      <div class="col-12">
        <div class="card card-outline-info">
          <div class="card-header">
            <h4 class="m-b-0"> Monthly Payroll List
            </h4>
          </div>
          <div class="card-body">
            <!--Savd vdgff gdfg dfg dfgdfg df  gd gdd gfd-->
                
            <div class="table-responsive ">
              <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>PIN 
                    </th>
                    <th>Full name
                    </th>
                    <th>Total salary
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>PIN 
                    </th>
                    <th>Full name
                    </th>
                    <th>Total salary
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </tfoot>
                <tbody class="payroll">
                @foreach($salary as $emp_salary)
                                    <tr style="vertical-align:top">
                                    <td>{{$emp_salary->em_code}}</td>
                                    <td><mark>{{$emp_salary->first_name}}</mark></td>
                                    <td>@foreach($emp_salary->payrol as $total_salary)
                                        {{ $total_salary->basic_salary }}
                                     @endforeach
                                     </td> 
                                        <td class="row">

                                        <a href="{{ route('payrol.show', $emp_salary->id)}}" class="ml-4 btn btn-primary">Generate Salary</a>      </td>
                                    </tr>
                                    @endforeach
                                            </tbody>   
                            </table>

                </tbody>
              </table>
            </div>                                
          </div>
        </div>
      </div>
</div>

   
    <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>   
   
@endsection