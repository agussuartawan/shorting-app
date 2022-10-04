@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Import stock accurate') }}</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-success" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('import.stock.accurate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="stock_accurate" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
