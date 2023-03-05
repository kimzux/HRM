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
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0"> Assets Depreciation History</h4>
                            <div style="float: right">
                                <a href="{{ route('assetlist.add.depreciation', $asset_list->id) }}"
                                    class="btn btn-info">Check Depreciations</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Market Value </th>
                                            <th>Depreciation Value</th>
                                            <th>Depreciation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asset_list->depreciations as $depreciation)
                                            <tr>
                                                <td>{{ number_format($depreciation->depr_value, 2, '.', ',') }}</td>
                                                <td>{{ number_format($asset_list->price - $depreciation->depr_value, 2, '.', ',') }}
                                                </td>
                                                <td>{{ date('Y-m-d', strtotime($depreciation->created_at)) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @push('scripts')
                <script>
                    $(document).ready(function() {
                        var table = $('#example').DataTable({
                            lengthChange: false,
                            ordering: false,
                            buttons: ['copy', 'excel', 'pdf', 'colvis']
                        });

                        table.buttons().container()
                            .appendTo('#example_wrapper .col-md-6:eq(0)');
                    });
                </script>
            @endpush
        @endsection
