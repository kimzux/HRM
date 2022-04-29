@extends('layouts.app')

@section('content')
         <div class="page-wrapper">
         <div class="header">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-end">
            <div class="col">
              <h1 class="header-title">
                Designation
               </h1>
            </div>
            </div> 
        </div> 
     </div>
    </div> <!-- / .header -->
            <div class="container-fluid">         
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-outline-info">
                        <h3 class="card-header">Add Designation</h3>
                            <div class="card-body">
                                    <form method="post" action="designation" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Designation Name</label>
                                                        <input type="text" name="des_name" id="designation_name" value="" class="form-control" minlength="4" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary active "> Save</button>
                                        </div>
                                        <?=csrf_field()?> 
                                    </form>
                            </div>
                        </div>
                       </div>
                    <div class="col-7">
                        <div class="card card-outline-info">
                        <h3 class="card-header"> Designation List</h3>
                        <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Designation Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Designation Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>   
                                        <tbody>
                                            @foreach ($des as $designation) 
                                            <tr>
                                                <td><?php echo $designation->des_name;?></td>
                                                <td class="jsgrid-align-center ">
                                                     <div class="row">
    
                                                <a href="{{ route('designation.edit', $designation->id)}}" class="ml-2 btn btn-primary">Edit</a>
                                               <form action="{{ route('designation.destroy', $designation->id )}}" method="post">
                                                  @csrf
                                             @method('DELETE')
                  <button class="ml-2 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
</div>
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
    @endsection
    