@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">
                        <h1 class="header-title">
                            Edit Asset
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane ml-5" id="bank" role="tabpanel">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('assetlist.update', $assetlist->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Name</label>
                                <input type="text" name="asset_name" value="{{ $assetlist->asset_name }}"
                                    class="form-control form-control-line" minlength="5" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Category Type</label>
                                <select name="category_name" class="form-control custom-select" required>
                                    <option>Select Category Name</option>
                                    @foreach ($asset as $ass)
                                        <option
                                            value="{{ $ass->id }}" {{ $assetlist->asset_id == $ass->id  ? 'Selected' : '' }}>
                                            {{ $ass->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Assets Brand</label>
                                <input type="text" name="asset_brand" value="{{ @$assetlist->asset_brand }}"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Assets Model</label>
                                <input type="text" name="asset_model" value="{{ @$assetlist->asset_model }}"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Assets code</label>
                                <input type="text" name="asset_code" value="{{ @$assetlist->asset_code }}"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> purchasing date</label>
                                <input type="date" name="purchase_date" value="{{ @$assetlist->purchase_date }}"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> price</label>
                                <input type="number" name="price" value="{{ @$assetlist->price }}"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Quantity</label>
                                <input type="number" name="quantity" value="{{ @$assetlist->quantity }}"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Depreciation Interval</label>
                                <select name="depr_interval" value=""
                                    class="select2 form-control custom-select" style="width: 100%" required
                                    value="">
                                    <option value="">Select Depreciation Interval</option>
                                    <option value="1"  {{ @$assetlist->depr_interval == '1'  ? 'Selected' : '' }}>1 Year</option>
                                    <option value="2" {{ @$assetlist->depr_interval == '2'  ? 'Selected' : '' }}>2 Years</option>
                                </select>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Depreciation Rate (%)</label>
                                <input type="number" step="0.01" min="0" name="depr_rate" value="{{  @$assetlist->depr_rate }}" required
                                    class="form-control mydatepicker" id="recipient-name1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Configuration</label>
                                <textarea class="form-control" name="configuration" id="message-text1" required minlength="14" rows="4">{{ @$assetlist->configuration }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>update </button>
            </div>
            <?= csrf_field() ?>
            </form>
        </div>
    </div>
    </div>
@endsection
