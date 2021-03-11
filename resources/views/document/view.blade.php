@extends('layouts.app')

@section('custom_css')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}

<style>
    .form-control[readonly] {
        background-color: transparent;
        opacity: 1;
    }
  </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    View Document
                    <a href="{{ route('document.index') }}" class="float-right btn btn-success" style="text-decoration: none">All Document</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Document Title</label>
                        <input readonly type="text" class="form-control" value="{{ $document->document_title }}">
                    </div>

                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" readonly class="form-control" value="{{ $document->category_name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Document Description</label>
                        <textarea rows="10" readonly class="form-control">{{ strip_tags($document->document_description) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

