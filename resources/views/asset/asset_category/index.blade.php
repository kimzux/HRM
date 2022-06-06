@extends('layouts.app')

@section('content')
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-2">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Category
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
            <div class="container-fluid  mt-4">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fe fe-plus"></i><a data-toggle="modal" data-target="#assetsmodel" data-whatever="@getbootstrap" class="text-white TypeModal"><i class="" aria-hidden="true"></i> Add Category </a></button>
                    </div>
                </div> 
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 "> Assets Category List                       
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Type</th>
                                                <th>Name </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID </th>
                                                <th>Type</th>
                                                <th>Name </th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($asset as $value)
                                            <tr>
                                                <td>{{$value->id}}</td>
                                                <td>{{$value->category_type}}</td>
                                                <td>{{$value->category_name}}</td>
                                                <td class="jsgrid-align-center">
                                                <a href="{{ route('asset.edit', $value->id ) }}" class="btn btn-primary">Edit</a>
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
                        <div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Assets Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="{{route('asset.store')}}" id="assetsform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                        <div class="form-group">
                                       <label>Category Type </label>
                                        <select name="cattype" class="form-control custom-select" required>
                                            <option>Select Category</option>
                                            <option value="ASSETS">Assets</option>
                                            <option value="LOGISTIC">Logistice</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Category Name </label>
                                        <input type="text" name="catname" class="form-control" value="" placeholder="Category name..." minlength="2" required>
                                        </div>                                          
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="catid" value="" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?=csrf_field()?>
                                    </form>
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