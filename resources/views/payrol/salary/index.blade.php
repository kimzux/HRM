@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
    <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-3">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
            Payrol
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
            </div>
    </div>
            <div class="container-fluid"> 
                <div class="row m-b-10"> 
                    <div class="col-12">
                       <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="Payroll/Generate_salary" class="text-white"><i class="" aria-hidden="true"></i>  Generate Payroll</a></button>
                    </div>
                </div> 
                <div class="row mt-4">
                    <div class="col-12">

                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Payroll List                     
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th>Employee </th>
                                                <th>Month </th>
                                                <th>Salary </th>
                                                <th>Loan </th>
                                                <th>Total hours </th>
                                                <th>Deduction</th>
                                                <th>Total Paid</th>
                                                <th>Pay Date</th>
                                                <th>Status</th>
                                                <th class="jsgrid-align-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
                                                <th>Employee </th>
                                                <th>Month </th>
                                                <th>Salary </th>
                                                <th>Loan </th>
                                                <th>Total hours </th>
                                                <!--<th>Earning</th>-->
                                                <th>Deduction</th>
                                                <th>Total Paid</th>
                                                <th>Pay Date</th>
                                                <th>Status</th>
                                                <th class="jsgrid-align-center">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        

@endsection