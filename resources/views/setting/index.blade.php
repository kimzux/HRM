@extends('layouts.app')

@section('content')
<div class="header">
      <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Settings
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
    
    
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                            <div class="card-body">
                                <div class="table_body">
                                    <form action="" id="fileUploadForm"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                        
                                        <div class="form-group clearfix">
                                            <label for="title" class="col-md-3">Site Title</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="title" value="Ark HRM System" id="title"  readonly>
                                            </div>
                                        </div>                                    
                                        <div class="form-group clearfix">
                                       
                                            <label for="description" class="col-md-3">Description</label>
                                          
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="description" value="<?php echo $settings->description; ?>" name="description" rows="6" required minlength="20" maxlength="512" readonly><?php echo $settings->description; ?></textarea>
                                            </div>   
                                                                       
                                        </div>                                                                
                                                         
                                        <div class="form-group clearfix">
                                            <label for="contact" class="col-md-3">Contact for Technical Support</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="contact" value="<?php echo $settings->phone_number; ?>" id="contact" readonly >
                                            </div>
                                        </div>                                    
                                                                         
                                                                        
                                        <div class="form-group clearfix">
                                            <label for="email" class="col-md-3">Email For Technical Support</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $settings->email_system; ?>" readonly>                                         </div>
                                        </div>                                    
                                                                        
                                        <div class="form-group clearfix">
                                            <label for="address" class="col-md-3">Link For Support Documentation</label>
                                            <div class="col-md-9">
                                                <a href="">{{ $settings->link}}</a>
                                         </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-md-9 col-md-offset-3">
                                                <input type="hidden" name="id" value="<?php echo $settings->id; ?>"/>
                                            
                                            </div>
                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
                </div>
    
    @endsection