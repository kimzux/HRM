@extends('layouts.app')

@section('content')
      <div class="page-wrapper">
      <div class="message"></div>
            <div class="row page-titles">
            <div class="container-fluid">
            <div class="header-body ml-3">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
              Logistic List
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
                
            </div>
            <div class="container-fluid mt-4">
                <div class="row m-b-10"> 
                    <div class="col-12">
                    <button type="button" class="btn btn-info"><i class="fe fe-plus"></i><a data-toggle="modal" data-target="#assetsmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Logistics </a></button> 
                        <button type="button" class="btn btn-primary"><i class="fe fe-bars"></i><a href="{{route('logsupport.index')}}" class="text-white"><i class="" aria-hidden="true"></i>  Logistic Support</a></button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 "> Logistic List</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Logisti Name </th>
                                                <th>Description </th>
                                                <th>Type </th>
                                                <th>Quantity </th>
                                                <th>Date </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Logistic Name</th>
                                                <th>Description </th>
                                                <th>Type </th>
                                                <th>Quantity </th>
                                                <th>Date </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($logistic as $logistics)
                                            <tr>
                                                <td>{{$logistics->id }}</td>
                                                <td>{{$logistics->logistic_name }}</td>
                                                <td>{{$logistics->description}}</td>
                                                <td>{{$logistics->logistic_sup }}</td>
                                                <td>{{$logistics->quantity }}</td>
                                                <td>{{$logistics->entry_date }}</td>
                                                <td class="d-flex ">
                                                <a href="{{ route('logistic.edit', $logistics->id)}}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('logistic.destroy', $logistics->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button  class="ml-4 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
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
                            <!-- sample modal content -->
                        <div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Logistic </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="{{route('logistic.store')}}" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label class="control-label">Logistic name</label>
                                                <input type="text" name="logistic_name" class="form-control" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Description</label>
                                                <input type="text" name="details" class="form-control" id="recipient-name1">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Quantity</label>
                                                <input type="number" name="qty" class="form-control" id="recipient-name1">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Entry Date</label>
                                                <input type="date" name="date" class="form-control mydatepicker" id="recipient-name1 datetimepicker2">
                                            </div>
                                            <div class="form-group">
                                                <input name="type" type="checkbox" id="radio_2" data-value="Logistic" class="type" value="Logistic">
                                                <label for="radio_2">Add To Logistic Support List</label>
                                            </div>                                           
                                        
                                    </div>
                                    <div class="modal-footer">
                                       <input type="hidden" name="aid" value="">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?=csrf_field()?>
                                    </form>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".assets").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#assetsmodel').modal('show');
                                                $.ajax({
                                                    url: '',
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="aid"]').val(response.assetsByid.id).end();
                                                    $('#btnSubmit').find('[name="assetstitle"]').val(response.assetsByid.assets_name).end();
                                                    $('#btnSubmit').find('[name="qty"]').val(response.assetsByid.quantity).end();
                                                    $('#btnSubmit').find('[name="date"]').val(response.assetsByid.entry_date).end();
                                                    $('#btnSubmit').find('[name="details"]').val(response.assetsByid.description).end();                                                   // $('#btnSubmit').find('[name="type"]').val(response.assetsByid.Assets_type).end();//
                                                     if (response.assetsByid.Assets_type == 'Assets')
                                                   $('#btnSubmit').find(':checkbox[name=type][value="Assets"]').prop('checked', true);
                                                   else
                                                    $('#btnSubmit').find(':radio[name=type][value="Logistic"]').prop('checked', true);
                                                   
												});
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
@endsection   