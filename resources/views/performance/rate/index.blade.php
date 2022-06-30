@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="message"></div>
    <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-1">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Rate View
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid mt-4">
        <div class="row m-b-10">
           
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#appmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i>Rate Goals</a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="{{ route('rate.average', $performance_id  )}}" class="text-white"><i class="" aria-hidden="true"></i>Overall Performance</a></button>
          
            </div>
          
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0"> rates of the goals
                        </h4>
                    </div>
                   
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>rate</th>
                                        <th>comment</th>
                                       <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                <th>Name</th>
                                        <th>rate</th>
                                        <th>comment</th>
                                       <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($rate as $rates)
                                    <tr style="vertical-align:top">
                                        <td>{{$rates->name}}</td>
                                        <td>
                                        @if($rates->rate==1)
                                        poor
                                        @elseif($rates->rate==2)
                                        Fair
                                        @elseif($rates->rate==3)
                                        Satisfactory
                                        @elseif($rates->rate==4)
                                        Good
                                        @elseif($rates->rate==5)
                                        Excellent
                                        @endif
                                    </td>
                                        <td>{{$rates->comment}}</td>
                                        <td class="row">
                                             <a href="{{ route('performance.rate.edit', [ $rates->performance_id , $rates->id] )}}"  title="Edit" class="m-2 btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $rates->id; ?>" >Edit</a>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="appmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Rate infomation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="{{route('performance.rate.store', $performance_id)}}" id="leaveapply" enctype="multipart/form-data">
                        <div class="modal-body">
                        <input hidden="hidden" type="text" name="performance_id" class="form-control form-control-line" value="{{  $performance_id}}" placeholder=" Degree Name" minlength="1" required> 
			                                
                                            
                            <div class="form-group">
                                <label class="control-label" id="hourlyFix">Rating Name</label>
                                <input name="name" class="form-control" id="rate" required>
                            </div>
                            <div class="form-group">
                           
                            <label class="control-label" id="hourlyFix">Rating</label>
                                           
                            <select class="js-example-basic-single"  tabindex="1" name="rate" type="number" style="width:100%"  required>
                                                    <option value="1">Poor</option>
                                                    <option value="2">Fair</option>
                                                    <option value="3">Satisfactory</option>
                                                    <option value="4">Good</option>
                                                    <option value="5">Excellent</option>
                                                </select>
                                       
                                       
                                            
        
                            </div>
                            <div class="form-group" id="expectedtime">
                                <label class="control-label">Comments</label>
                                <textarea name="comment" class="form-control" id="recipient-name1"></textarea>
                            </div>
                            
                           
                           
                        </div>
                        
                        <div class="modal-footer">
                            <input type="hidden" name="id" class="form-control" id="recipient-name1" required>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?=csrf_field()?>
                    </form>
                </div>
            </div>
        </div>
        <script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single ').select2({
              dropdownParent: $("#appmodel")
      });
});
    </script>
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
        <!-- Set leaves approved for ADMIN? -->
       
        @endsection