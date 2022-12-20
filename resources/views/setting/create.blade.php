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
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
    <div class="card">
        <div class="card-body">
            <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Site Description</label>
                    <textarea type="text" name="description" value="" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> </textarea>
                </div>
                <div class="form-group">
                    <label> PhoneNumber for Support</label>
                    <input type="number" name="phone" value="" class="form-control form-control-line" placeholder="phonenumber" minlength="5" required>
                </div>
                <div class="form-group">
                    <label> Email For support</label>
                    <input type="email" name="email" value="" class="form-control form-control-line" placeholder="email" minlength="5" required>
                </div>
                <div class="form-group">
                    <label>Link For support</label>
                    <input type="url" name="link" value="" class="form-control form-control-line" placeholder="link" minlength="5" required>
                </div>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>Set </button>
                <?= csrf_field() ?>
            </form>
      </div>  
    </div>
</div>
@endsection