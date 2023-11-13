@extends('layouts.admin')

@section('content-header')
    Create News
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Create News</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                           placeholder="Title">
                    @error('title')
                    <span id="title-error" class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="summernote" name="content"
                              class="@error('content') is-invalid @enderror"></textarea>
                    @error('content')
                    <span id="description-error" class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });
    </script>
@endsection
