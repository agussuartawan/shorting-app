@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <ul class="list-group mb-3">
                            <li
                                class="d-flex justify-content-between list-group-item{{ $sale_ready ? ' list-group-item-success' : '' }}">
                                <div>
                                    @if ($sale_ready)
                                        <i class="fa-solid fa-fw fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-fw fa-xmark"></i>
                                    @endif
                                    Import Stock Sales
                                </div>
                                <a href="{{ route('import.stock.sales') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa-solid fa-fw fa-cloud-arrow-up"></i>
                                    Import Stock Sales</a>
                            </li>
                            <li
                                class="d-flex justify-content-between list-group-item{{ $accurate_ready ? ' list-group-item-success' : '' }}">
                                <div>
                                    @if ($accurate_ready)
                                        <i class="fa-solid fa-fw fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-fw fa-xmark"></i>
                                    @endif
                                    Import Stock Accurate
                                </div>
                                @if ($sale_ready)
                                    <a href="{{ route('import.stock.accurate') }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-fw fa-cloud-arrow-up"></i>
                                        Import Stock Accurate</a>
                                @endif
                            </li>
                            <li
                                class="d-flex justify-content-between list-group-item{{ $shorted_ready ? ' list-group-item-success' : '' }}">
                                <div class="">
                                    @if ($shorted_ready)
                                        <i class="fa-solid fa-fw fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-fw fa-xmark"></i>
                                    @endif
                                    Klik Shorting
                                </div>
                                @if ($sale_ready && $accurate_ready)
                                    <a href="{{ route('shorting') }}" class="btn btn-sm btn-secondary"><i
                                            class="fa-solid fa-fw fa-arrow-down-wide-short"></i> Shorting</a>
                                @endif
                            </li>
                            <li
                                class="d-flex justify-content-between list-group-item{{ $shorted_ready ? ' list-group-item-success' : '' }}">
                                <div class="">
                                    @if ($shorted_ready)
                                        <i class="fa-solid fa-fw fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-fw fa-xmark"></i>
                                    @endif
                                    Data Ready
                                </div>
                                <div class="">
                                    @if ($shorted_ready)
                                        <a href="{{ route('export.pdf') }}" class="btn btn-sm btn-danger mx-1"
                                            target="_blank">
                                            <i class="fa-solid fa-fw fa-file-pdf"></i>
                                            Download PDF</a>
                                        <a href="{{ route('export.excel') }}" class="btn btn-sm btn-success"
                                            target="_blank">
                                            <i class="fa-solid fa-fw fa-file-excel"></i>
                                            Download Excel</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
