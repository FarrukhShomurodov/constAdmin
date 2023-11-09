@extends('layouts.admin')

@section('content-header')
    Create Services
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Create Services</li>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <form action="{{route('admin.services.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title">
                @error('title')
                <span id="title-error" class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Description</label>
                <label for="description"></label><input name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">
                @error('description')
                <span id="description-error" class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    @error('image')
                    <span id="image-error" class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
