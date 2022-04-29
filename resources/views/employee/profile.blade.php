                                     <!--second tab-->
                                     <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card">
				                        <div class="card-body">
			                        		<h3 class="card-title">Permanent Contact Information</h3>
			                                <form class="row" action="Parmanent_Address" method="post" enctype="multipart/form-data">
			                                    <div class="form-group col-md-12 m-t-5">
			                                        <label>Address</label>
			                                        <textarea name="paraddress" value=""  class="form-control" rows="3" minlength="7" required></textarea>
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>City</label>
			                                        <input type="text" name="parcity" class="form-control form-control-line" placeholder=""  minlength="2" required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Country</label>
			                                        <input type="text" name="parcountry" class="form-control form-control-line" placeholder=""  value="" minlength="2" required> 
			                                    </div>
                                                    		                                    
			                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="">
                                                    <input type="hidden" name="id" value="">                                                    
			                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
			                                   		                                    
			                                    </form>
			                                    
			                                    <div class="">
			                        				<h3 class="col-md-12 m-b-0">Present Contact Information</h3>
			                                  
			                                    <hr>
			                                <form class="row" action="Present_Address" method="post" enctype="multipart/form-data">			                                    
			                                    <div class="form-group col-md-12 m-t-5">
			                                        <label>Address</label>
			                                        <textarea name="presaddress" value=""  class="form-control" rows="3" minlength="7" required></textarea>
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>City</label>
			                                        <input type="text" name="prescity" class="form-control form-control-line" value="" minlength="2"  required> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-5">
			                                        <label>Country</label>
			                                        <input type="text" name="prescountry" class="form-control form-control-line" placeholder="" value="" minlength="2"  required> 
			                                    </div>
                                                                                
			                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="">
                                                    <input type="hidden" name="id" value="">
			                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
                                           </form>
                                           </div>
				                        </div>
                                    </div>
                                </div>
                           