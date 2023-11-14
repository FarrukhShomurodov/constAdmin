@extends('layouts.admin')

@section('content-header')
    Services
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Services</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>
                        <a href="{{route('admin.services.create')}}">
                            <i class="fa fa-sharp fa-solid fa-plus" style="color: #0c84ff "></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->description}}</td>
                            <td> <img src="{{\Illuminate\Support\Facades\Storage::url($service->image)}}" width="300px"> </td>
                            <td>
                                <div class="col-2 p-0">
                                    <a class="btn" href="{{route('admin.services.edit',$service->id)}}">
                                        <i class="fa fa-sharp fa-solid fa-pen" style="color: #00b44e"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('admin.services.destroy',$service->id)}}"
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
