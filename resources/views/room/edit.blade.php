@extends('layouts.app')

@section('content')
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-end">
        <div class="col">
          <h1 class="header-title">
            Edit Rooms
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane ml-5" id="deduction" role="tabpanel" style="width:50%">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('room.update', $room->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label>Room Number</label>
          <input type="text" name="room_no" value="{{$room->room_no}}" class="form-control form-control-line" required>
        </div>
        <div class="form-group">
          <label>Room Capacity</label>
          <input type="number" name="size" value="{{$room->size}}" class="form-control form-control-line" required>
        </div>
        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
    </div>
    <?= csrf_field() ?>
    </form>
  </div>
</div>
@endsection