@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="{{ route('document.create') }}" class="float-right btn btn-success" style="text-decoration: none">Add New</a>
                </div>

                <div class="col-md-8 text-center offset-3 mt-2">
                    @if ($message = Session::get('error'))
                      <div class="alert alert-danger alert-block text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                      </div>
                    @endif
                
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                      </div>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Document Title</th>
                            <th>Category Name</th>
                            <th>Document Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $document->document_title }}</td>
                                <td>{{ $document->category_name }}</td>
                                <td>{!! $document->document_description !!}</td>
                                <td>
                                    <a href="{{ route('document.edit',$document->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('document.delete',$document->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
@endsection














