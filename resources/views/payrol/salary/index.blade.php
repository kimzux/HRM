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
            Payroll
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
                    <div class="col-12 text-right">
                    <button type="button" class="btn btn-info"><i class="fe fe-plus"></i><a data-toggle="modal" data-target="#leavemodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Generate Payroll</a></button>
                       <!-- <button type="button" class="btn btn-primary"><i class="fe fe-printer"></i><a href="{{route('payrol.create')}}" class="text-white"><i class="" aria-hidden="true"></i>  Generate Payroll</a></button>-->
                       <!-- <button type="button" class="btn btn-info"><i class="fe fe-printer"></i><a href="{{route('payrol.create')}}" class="text-white"><i class="" aria-hidden="true"></i>  Generate Payslip</a></button> 
                   -->
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
                                                <th>Id</th>
                                                <th>Month</th>
                                                <th>Status</th>
                                                <th class="jsgrid-align-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
                                                <th>Id</th>
                                                <th>Month</th>
                                                <th>Status</th>
                                                <th class="jsgrid-align-center">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        @foreach( $payroll as $payrolls)
                                <tr>
                                <td>{{$payrolls->id}}</td>
                                <td>{{$payrolls->month}}</td>
                                <td>
                                        @if($payrolls->status==0)
                                        <span class="p-2 mb-1 bg-primary text-white">New</span>
                                        @elseif($payrolls->status==1)
        <span class="p-2 mb-1 bg-success text-white">computed</span>
                                     @endif
                                    </td>
                                    <td>
                            
                                           <a href="{{ route('payrol.show', $payrolls->id)}}" title="compute" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $payrolls->id; ?>" >View Payslips</a>
                                        </td>
                                   
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
                        
                <div class="modal fade" id="leavemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Generate Payroll</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" ction="{{route('payrol.store')}}" id="leaveform" enctype="multipart/form-data">
                        <div class="modal-body">
                        
                            <!-- <div class="form-group">
                                <label class="control-label">month</label>
                                <input type="month" name="month" class="form-control" id="recipient-name1" value="">
                            </div> -->
                            <div class="form-group">
                                <label class="control-label">month</label>
                                <input type="month" name="month" class="form-control" id="recipient-name1" value="">
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?=csrf_field()?> 
                    </form>
                </div>
            </div>
        </div>
@endsection