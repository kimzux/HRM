@extends('layouts.app')

@section('content')
         <div class="page-wrapper">
         <div class="header">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-end">
            <div class="col">
              <h1 class="header-title">
                Department
               </h1>
            </div>
            </div> 
        </div> 
     </div>
    </div> <!-- / .header -->
            <div class="message"></div> 
            <div class="container-fluid">         
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-outline-info">
                        <h3 class="card-header">Add Department</h3>
                            <div class="card-body">
                                    <form method="post" action="department" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Department Name</label>
                                                        <input type="text" name="dep_name" id="department_name" value="" class="form-control" minlength="4" required>
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
                        <h3 class="card-header"> Department List</h3>
                        <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Department Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Department Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>   
                                        <tbody>
                                            @foreach ($dep as $department) 
                                            <tr>
                                                <td><?php echo $department->dep_name;?></td>
                                                <td class="jsgrid-align-center ">
                                                     <div class="d-flex">
                                                   
                                                <a href="{{ route('department.edit', $department->id)}}" class="ml-2 btn btn-primary">Edit</a>
                                               <form action="{{ route('department.destroy', $department->id )}}" method="post">
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
    