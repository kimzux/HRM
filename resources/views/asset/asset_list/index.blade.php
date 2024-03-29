@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="message"></div>
        <div class="row page-titles">
            <div class="container-fluid">
                <div class="header-body ml-3">
                    <div class="row align-items-end">
                        <div class="col">
                            <h1 class="header-title">
                                Assets
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row m-b-10">
                <div class="col-12">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assetsmodel"
                        data-whatever="@getbootstrap"><i class="fe fe-plus"></i>
                        <a class="text-white"><i class="" aria-hidden="true"></i> Add Assets </a>
                    </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0"> Assets List</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!--
                                                                        <th>ID</th>
                                                                        <th>Type </th>-->
                                            <th>category</th>
                                            <th>Name </th>
                                            <th>Brand </th>
                                            <th>Model</th>
                                            <th>Code </th>
                                            <th>Configuration </th>
                                            <th>Quantity </th>
                                            <th>InStock </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!--                                                <th>ID</th>
                                                                        <th>Type </th>-->
                                            <th>category</th>
                                            <th>Name </th>
                                            <th>Brand </th>
                                            <th>Model</th>
                                            <th>Code </th>
                                            <th>Configuration </th>
                                            <th>Quantity </th>
                                            <th>InStock </th>
                                            <th>Action </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($assetlist as $value)
                                            <tr>
                                                <td>{{ $value->asset->category_name }}</td>
                                                <td>{{ $value->asset_name }}</td>
                                                <td>{{ $value->asset_brand }}</td>
                                                <td>{{ $value->asset_model }}</td>
                                                <td>{{ $value->asset_code }}</td>
                                                <td>{{ $value->configuration }}</td>
                                                <td>{{ $value->quantity }}</td>
                                                <td>{{ $value->remain_quantity }}</td>

                                                <td class="jsgrid-align-center">
                                                    <a href="{{ route('assetlist.edit', $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('assetlist.view.depreciation', $value->id) }}"
                                                        class="btn btn-info">View Depreciations</a>
                                                    <a href="{{ route('assetlist.employee.index', $value->id) }}"
                                                        class="btn btn-info">Assign to Employers</a>
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
            <!-- sample modal content -->
            <div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Add Asset </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <form method="post" action="{{ route('assetlist.store') }}" id="btnSubmit"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Asset name</label>
                                            <input type="text" name="asset_name" value="" class="form-control"
                                                id="recipient-name1" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Category Name </label>
                                            <select name="catid" value="" class="select2 form-control custom-select"
                                                style="width: 100%" required value="">
                                                <option value="">Select Category Name</option>
                                                @foreach ($ass as $cat)
                                                    <option value="{{ $cat->id }}"> {{ $cat->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Assets Brand</label>
                                            <input type="text" name="brand" value="" class="form-control"
                                                id="recipient-name1">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Assets Model</label>
                                            <input type="text" name="model" value="" class="form-control"
                                                id="recipient-name1">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Assets Code</label>
                                            <input type="text" name="code" value="" class="form-control"
                                                id="recipient-name1 ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Configuration</label>
                                            <textarea class="form-control" name="config" id="message-text1" required minlength="14" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Purchaseing Date</label>
                                            <input type="date" name="purchase" value=""
                                                class="form-control mydatepicker" id="recipient-name1">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Price</label>
                                            <input type="number" name="price" value="" class="form-control"
                                                id="recipient-name1">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Quantity</label>
                                            <input type="number" name="pqty" value="" class="form-control"
                                                id="recipient-name1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Depreciation Interval</label>
                                            <select name="depr_interval" value=""
                                                class="select2 form-control custom-select" style="width: 100%" required
                                                value="">
                                                <option value="">Select Depreciation Interval</option>
                                                <option value="1">1 Year</option>
                                                <option value="2">2 Years</option>
                                            </select>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Depreciation Rate (%)</label>
                                            <input type="number" step="0.01" min="0" name="depr_rate"
                                                required class="form-control mydatepicker" id="recipient-name1">
                                        </div>
                                    </div>
                                </div>
                                <!--
                                                                    <div class="form-group">
                                                                        <input name="type" type="checkbox" id="radio_2" data-value="Logistic" value="Logistic" class="type">
                                                                        <label for="radio_2">Add To Logistic Support List</label>
                                                                    </div>-->
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="aid" value="">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?= csrf_field() ?>
                        </form>
                    </div>
                </div>
            </div>
            @push('scripts')
                <script type="text/javascript">
                    $(document).ready(function() {
                        $(".assets").click(function(e) {
                            e.preventDefault(e);
                            // Get the record's ID via attribute
                            var iid = $(this).attr('data-id');
                            $('#btnSubmit').trigger("reset");
                            $('#assetsmodel').modal('show');
                            $.ajax({
                                url: 'AssetsByID?id=' + iid,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                            }).done(function(response) {
                                console.log(response);
                                // Populate the form fields with the data returned from server
                                $('#btnSubmit').find('[name="aid"]').val(response.assetsByid.ass_id).end();
                                $('#btnSubmit').find('[name="catid"]').val(response.assetsByid.cat_id).end();
                                $('#btnSubmit').find('[name="assname"]').val(response.assetsByid.ass_name)
                                    .end();
                                $('#btnSubmit').find('[name="brand"]').val(response.assetsByid.ass_brand).end();
                                $('#btnSubmit').find('[name="model"]').val(response.assetsByid.ass_model).end();
                                $('#btnSubmit').find('[name="code"]').val(response.assetsByid.ass_code).end();
                                $('#btnSubmit').find('[name="config"]').val(response.assetsByid.configuration)
                                    .end();
                                $('#btnSubmit').find('[name="purchase"]').val(response.assetsByid
                                    .purchasing_date).end();
                                $('#btnSubmit').find('[name="price"]').val(response.assetsByid.ass_price).end();
                                $('#btnSubmit').find('[name="pqty"]').val(response.assetsByid.ass_qty).end();
                                //                                                     if (response.assetsByid.Assets_type == 'Logistic')
                                //                                                   $('#btnSubmit').find(':checkbox[name=type][value="Logistic"]').prop('checked', true);

                            });
                        });
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        var table = $('#example').DataTable({
                            lengthChange: false,
                            buttons: ['copy', 'excel', 'pdf', 'colvis']
                        });

                        table.buttons().container()
                            .appendTo('#example_wrapper .col-md-6:eq(0)');
                    });
                </script>
            @endpush
        @endsection
