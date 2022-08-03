@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-end">
            <div class="col">
              <h1 class="header-title">
                Disciplinary
               </h1>
            </div>
            </div> 
        </div> 
     </div>
    </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fe fe-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="text-white"><i class="" aria-hidden="true"></i> Add Disciplinary </a></button>
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info mt-4">
                            <div class="card-header">
                                <h4 class="m-b-0"> Disciplinary Action List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Title </th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Title </th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($disciplinary as $disciplinarys)
                                <tr>
                                <td>{{$disciplinarys->employee->first_name}}</td>
                                <td>{{$disciplinarys->title}}</td>
                                <td>{{$disciplinarys->details}}</td>
                                <td><button class="btn btn-sm btn-success">{{$disciplinarys->disciplinary_action}}</button></td>
                                    <td class="row">
                                    <a href="{{ route('disciplinary.edit', $disciplinarys->id)}}" class="btn btn-primary ml-4">Edit</a>
                                    <form action="{{ route('disciplinary.destroy', $disciplinarys->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                                    <button class="ml-4 btn btn-danger " type="submit"
                                        onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                                        <?=csrf_field()?>
                                   </form>
                                    </td> 
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>            
</table>
                                    <!-- sample modal content -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Disciplinary Notice</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="{{route('disciplinary.store')}}" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label">Employee Name</label>
                                                            <select class="form-control custom-select" name="first_name" data-placeholder="Choose a Category" tabindex="1" value="" required>
                                                            @foreach ($disci as $disciplinary)

                                        <option value="{{ $disciplinary->id }}"> {{ $disciplinary->first_name }} </option>
                                                                     @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Disciplinary Action</label>
                                                            <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="disciplinary_action" value="">
                                                                <option value="Verbel Warning">Verbal Warning</option>
                                                                <option value="Writing Warning">Writing Warning</option>
                                                                <option value="Demotion">Demotion</option>
                                                                <option value="Suspension">Suspension</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Title</label>
                                                            <input type="text" name="title" value="" class="form-control" id="recipient-name1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Details</label>
                                                            <textarea class="form-control" value="" name="details" id="message-text1" rows="4"></textarea>
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                   <input type="hidden" name="id" value="">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                <?=csrf_field()?>  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".disiplinary").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'DisiplinaryByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.desipplinary.id).end();
                                                    $('#btnSubmit').find('[name="employee_id"]').val(response.desipplinary.employee_id).end();
                                                    $('#btnSubmit').find('[name="disciplinary_action"]').val(response.desipplinary.disciplinary_action).end();
                                                    $('#btnSubmit').find('[name="title"]').val(response.desipplinary.title).end();
                                                    $('#btnSubmit').find('[name="details"]').val(response.desipplinary.details).end();
												});
                                            });
                                        });
</script>
@endsection