@extends('layouts.admin')

@section('content-header')
    Portfolio
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Portfolio</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>
                        <a href="{{route('admin.portfolio.create')}}">
                            <i class="fa fa-sharp fa-solid fa-plus" style="color: #0c84ff "></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($portfolios as $portfolio)
                    <tr>
                        <td>{{$portfolio->id}}</td>
                        <td>{{$portfolio->title}}</td>
                        <td>
                            @foreach(json_decode($portfolio->images) as $image)
                                <img src="{{\Illuminate\Support\Facades\Storage::url($image)}}" width="300px">
                            @endforeach
                        </td>
                        <td>
                            <div class="col-2 p-0">
                                <a class="btn" href="{{route('admin.portfolio.edit',$portfolio->id)}}">
                                    <i class="fa fa-sharp fa-solid fa-pen" style="color: #00b44e"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('admin.portfolio.destroy',$portfolio->id)}}"
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
