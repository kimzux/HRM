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
            <div class="message"></div> 
            <div class="container-fluid">         
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-outline-info">
                        <h3 class="card-header">Edit Designaton</h3>
                            <div class="card-body">
                            <form method="post" action="{{ route('designation.update', $des->id ) }}">
                                        <div class="form-body">
                                            <div class="row ">
                                            @csrf
                                       @method('PATCH')    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Designation Name</label>
                                                        <input type="text" name="des_name" id="designatio_name" value="{{ $des->des_name }}"  class="form-control" minlength="4" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary active ">Edit</button>
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
                                           
                                            <tr>
                                                <td>{{$des->des_name}}</td>
                                                <td class="jsgrid-align-center ">
                                                   <div class="row">
                                                <a href="{{ route('designation.edit', $des->id)}}" class="ml-2 btn btn-primary">Edit</a>
                                               <form action="{{ route('designation.destroy', $des->id )}}" method="post">
                                                  @csrf
                                             @method('DELETE')
                  <button class="ml-2 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
</div>
                                                </td>
                                            </tr>
                                        
                                        </tbody> 
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endsection
    