@extends('layouts.admin')

@section('content-header')
    News
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">News</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>views</th>
                    <th>
                        <a href="{{route('admin.news.create')}}">
                            <i class="fa fa-sharp fa-solid fa-plus" style="color: #0c84ff "></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                        <tr>
                            <td>{{$new->id}}</td>
                            <td>{{$new->title}}</td>
                            <td>{!! $new->content !!}</td>
                            <td>{{$new->views}} </td>
                            <td>
                                <div class="col-2 p-0">
                                    <a class="btn" href="{{route('admin.news.edit',$new->id)}}">
                                        <i class="fa fa-sharp fa-solid fa-pen" style="color: #00b44e"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('admin.news.destroy',$new->id)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn" type="submit"><i
                                            class="fa fa-sharp fa-solid fa-trash" style="color: red"></i>
                                    </button>
                                </form>
                            </td>
                        <tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
