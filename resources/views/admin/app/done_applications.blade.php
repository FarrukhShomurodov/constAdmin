@extends('layouts.admin')

@section('content-header')
    Сделаные Заявки
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Сделаные Заявки</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <trc>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Message</th>
                </trc>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    @if($application->state == 1)
                        <tr>
                            <td>{{$application->id}}</td>
                            <td>{{$application->name}}</td>
                            <td>{{$application->phone_number}}</td>
                            <td>{{$application->email}}</td>
                            <td>{{$application->message}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
