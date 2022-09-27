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

                        @if (!$complete)
                            <div class="alert alert-danger" role="alert">
                                Data stok sales atau accurate belum lengkap!
                            </div>
                        @endif

                        <a href="{{ route('import.stock.sales') }}" class="btn btn-primary">Import
                            Stock Sales</a>
                        <a href="{{ route('import.stock.accurate') }}" class="btn btn-warning">Import Stock Accurate</a>
                        <a href="{{ route('shorting') }}" class="btn btn-secondary">Shorting</a>
                        <a href="{{ route('export.pdf') }}" class="btn btn-danger" target="_blank">Download PDF</a>
                        <a href="{{ route('export.excel') }}" class="btn btn-success" target="_blank">Download Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
