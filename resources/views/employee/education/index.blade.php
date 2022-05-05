<div class="tab-pane" id="education" role="tabpanel">
                                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Certificate name</th>
                                    <th>Institute </th>
                                    <th>Result </th>
                                    <th>year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID </th>
                                    <th>Certificate name</th>
                                    <th>Institute </th>
                                    <th>Result </th>
                                    <th>year</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            @foreach($value as $educations)
                                <tr>
                                <td>{{$educations->id}}</td>
                                <td>{{$educations->education_type}}</td>
                                <td>{{$educations->institute}}</td>
                                <td>{{$educations->result}}</td>
                                <td>{{$educations->year}}</td>
                                   <td class="jsgrid-align-center ">
                                    <a href="" class="btn btn-primary">Edit</a>
                                        <a  hidden="hidden" onclick="confirm('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light edudelet"  data-id=""><i class="fa fa-trash-o"></i></a>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                                    
                                    </div>
                                    <div class="card">
                                      
	                                    <div class="card-body">
                                       
			                                <form class="row" action="{{ route("employee.education.store") }}" method="post" enctype="multipart/form-data" id="insert_education">
                                        
                                            <span id="error"></span>
                                           <input hidden="hidden" type="text" name="employee_id" class="form-control form-control-line" value="{{ $employee->id}}" placeholder=" Degree Name" minlength="1" required> 
			                                  <div class="form-group col-md-6 m-t-5">
			                                        <label>Education Level</label>
			                                        <input type="text" name="education_level" class="form-control form-control-line" placeholder=" Degree Name" minlength="1" required> 
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

</div>