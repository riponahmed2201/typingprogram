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
 
    <div class="card">
        <div class="card-header">
            View Document
           <div class="float-right">
            <a href="{{ route('document.index') }}" class=" btn btn-success" style="text-decoration: none">All Document</a>
            <a href="{{ route('document.edit',$document->id) }}" class=" btn btn-success" style="text-decoration: none">Edit Document</a>
           </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
               
                <div class="card-body">
                    <div class="form-group">
                        <strong>Document Title:  </strong> <br>
                        <label>{{ $document->document_title }}</label>
                    </div>

                    <div class="form-group">
                        <strong for="">Category Name</strong> <br>
                        <label>{{ $document->category_name }}</label>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group"> 
                        <strong>Document Description: </strong> <br>
                        <label>{{ strip_tags($document->document_description) }}</label>
                        {{-- <textarea rows="10" readonly class="form-control">{{ strip_tags($document->document_description) }}</textarea> --}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

