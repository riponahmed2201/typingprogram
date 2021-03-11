@extends('layouts.app')

@section('custom_css')
<!-- include libraries(jQuery, bootstrap) -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

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

                    <form action="{{ route('document.update',$document->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Document Title</label>
                          <input type="text" class="form-control" name="document_title" value="{{ $document->document_title }}"  placeholder="Enter document title">
                        </div>

                        <div class="form-group">
                          <label for="">Category Name</label>
                          <input type="text" class="form-control" name="category_name" value="{{ $document->category_name }}" placeholder="Enter category name">
                        </div>

                        <div class="form-group">
                            <label for="">Document Description</label>
                            <textarea cols="5" rows="5" name="document_description"  class="form-control">{{ $document->document_title }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')

{{-- <script>
    $('#summernote').summernote({
    //   placeholder: 'Document Description',
      tabsize: 2,
      height: 100
    });
  </script> --}}

<script>
    //   $(document).ready(function() {
    // $('#summernote').summernote();
//   });
</script>
     
@endsection
