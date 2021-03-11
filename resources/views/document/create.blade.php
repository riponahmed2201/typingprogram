@extends('layouts.app')

@section('custom_css')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Add Document
                    <a href="{{ route('document.index') }}" class="float-right btn btn-success" style="text-decoration: none">All New</a>
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

                    <form action="{{ route('document.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Document Title</label>
                          <input type="text" class="form-control" name="document_title"  placeholder="Enter document title">
                        </div>

                        <div class="form-group">
                          <label for="">Category Name</label>
                          <input type="text" class="form-control" name="category_name"  placeholder="Enter category name">
                        </div>

                        <div class="form-group">
                            <label for="">Document Description</label>
            
                            <textarea class="ckeditor form-control" name="document_description"></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
     $('.ckeditor').ckeditor();
  });
</script>

     
@endsection
