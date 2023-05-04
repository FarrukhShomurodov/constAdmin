@extends('layouts.admin')

@section('content-header')
    Application
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Application</li>
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
                    <th>Status</th>
                </tr>
                </thead>
                <tbody class="application_content">

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
                    if(response[i].state == 0){
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
                            "<td>"+message+"</td>"+
                            "<td>"+
                            "<button type='submit' class='done_app btn btn-block btn-dark'><input type='hidden' value='"+id+"'>Done</button>"+
                            "</tr>";

                        $(".application_content").append(content);
                    }
                }
            }
        })
        $(document).on("click", ".done_app", function (){
            let post_ids = $(this).children('input').val()
            $(this).parents()[1].remove();
                $.ajax({
                    url: '/api/application/' + post_ids,
                    type: "PUT",
                    success: function (response) {
                        console.log(response)
                    }
                })
            })
    })
</script>
@endsection
