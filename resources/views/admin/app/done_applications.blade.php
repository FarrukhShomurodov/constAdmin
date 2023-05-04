@extends('layouts.admin')

@section('content-header')
    Done Application
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Done Application</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody class="done_application_content">
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        let app_id;
        $.ajax({
        url: '/api/application',
        type: "GET",
        success: function (response) {
            for (let i = 0; i < response.length; i++) {
                    if(response[i].state == 1){
                        let id = response[i].id;
                        app_id = id;
                        let name = response[i].name;
                        let phone_number = response[i].id;
                        let email = response[i].email;
                        let message = response[i].message;

                        let content = "<tr>"+
                            "<td>"+id+"</td>"+
                            "<td>"+name+"</td>"+
                            "<td>"+phone_number+"</td>"+
                            "<td>"+email+"</td>"+
                            "<td>"+message+"</td>";

                        $(".done_application_content").append(content);
                    }
                }
            }
        })
    })
</script>
@endsection

