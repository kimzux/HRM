@extends('layouts.app')

@section('content')
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-end">
        <div class="col">
          <h1 class="header-title">
            Edit Notice
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane ml-5" id="bank" role="tabpanel" style="width:50%">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('notice.update', $notice->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="message-text" class="control-label">Notice Title</label>
          <textarea class="form-control" name="title" id="message-text1" value="{{$notice->title}}"></textarea>
        </div>
        <div class="form-group">
          <label class="control-label">Document</label>
          <label for="recipient-name1" class="control-label">Title</label>
          <input type="file" name="file_url" class="form-control" id="recipient-name1" value="{{$notice->file_url}}">
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">Published Date</label>
          <input type="date" name="date" class="form-control" id="recipient-name1" value="{{$notice->date}}">
        </div>
        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
    </div>
    <?= csrf_field() ?>
    </form>
  </div>
</div>
@endsection