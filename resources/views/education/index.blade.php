@extends('layouts.app')

@section('content')
<!-- <ul class=" m-4 nav nav-tabs profile-tab" role="tablist">
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Education</a> </li>
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab" style="font-size: 14px;"> Experience</a> </li>
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab" style="font-size: 14px;"> Bank Account</a> </li>
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab" style="font-size: 14px;"> Document</a> </li>
</ul> -->
<div class="container m-4">
<a href="{{ route('employee.experience.index' , $employee_id) }}" class="btn btn-info btn-md active" role="button">add experience</a>
<a href="{{ route('employee.bank.index' , $employee_id) }}" class="btn btn-info btn-md active" role="button">add bank Account</a>
<a href="{{ route('employee.document.index' , $employee_id) }}" class="btn btn-info btn-md active" role="button">add document</a>

</div>
<div class="tab-content">
  <div class="tab-pane container active p-4" id="education"> <div class="tab-pane" id="education" role="tabpanel">
            <div class="card">
            <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h3 class="header-title">
                Employee Education
                      </h3>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  
                                    <th>Certificate name</th>
                                    <th>Institute </th>
                                    <th>Result </th>
                                    <th>year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   
                                    <th>Certificate name</th>
                                    <th>Institute </th>
                                    <th>Result </th>
                                    <th>year</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            @foreach($education as $educations)
                                <tr>
                                <td>{{$educations->education_type}}</td>
                                <td>{{$educations->institute}}</td>
                                <td>{{$educations->result}}</td>
                                <td>{{$educations->year}}</td>
                                   <td class="jsgrid-align-center ">
                                    <a href="{{ route('employee.education.edit', [ $educations->employee_id , $educations->id]) }}" class="btn btn-primary">Edit</a>
                                        <a  hidden="hidden" onclick="confirm('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light edudelet"  data-id=""><i class="fa fa-trash-o"></i></a>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     </div>
                    </div>
                </div>                                    
             </div>
                            <div class="card">
                           
                            <div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h3 class="header-title">
                Add Education
                      </h3>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
	                             <div class="card-body">
			                           <form class="row" action="{{ route('employee.education.store' , $employee_id) }}" method="post" enctype="multipart/form-data" id="insert_education">
                                            <span id="error"></span>
                                           <input hidden="hidden" type="text" name="employee_id" class="form-control form-control-line" value="{{  $employee_id}}" placeholder=" Degree Name" minlength="1" required> 
			                                  <div class="form-group col-md-6 m-t-5">
			                                        <label>Education Level</label>
			                                        <input type="text" name="education_type" class="form-control form-control-line" placeholder=" Degree Name" minlength="1" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Institute name</label>
			                                        <input type="text" name="institute" class="form-control form-control-line" placeholder=" Institute name"  minlength="3" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Result</label>
			                                        <input type="text" name="result" class="form-control form-control-line" placeholder=" Result" minlength="2" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Passing Year</label>
			                                        <input type="numbe" name="year"  class="form-control form-control-line" placeholder="Passing Year"> 
			                                    </div>
			                                  
			                                    <div class="form-actions col-md-6">
			                                        <button type="submit" class="btn btn-info"> <i class="fe fe-check"></i> Save</button>
			                                    </div>
                                           <?=csrf_field()?>
			                          </form>
	                              </div>
                             </div>
                            </div>
  <!-- <div class="tab-pane container fade" id="experience">
  @includ
  </div>
  <div class="tab-pane container fade" id="bank">...</div> -->
</div>
              
          


@endsection