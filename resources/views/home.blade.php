@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h5>  Total Document Created: <strong>{{ $total_document_count }}</strong> </h5>
                        <hr>
                    
                        <h4> Welcome  <strong>{{ Auth::user()->name }}</strong></h4>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
