@extends('layouts.user_header')
@section('user_Dashboard')

<div class="container">
    <div class="input-group input-group-merge mr-5 mt-3">
        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
    </div>
    <section class="content m-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="">#</th>
                                <th class="">NAME</th>
                                <th class="">Message</th>
                                <th class="">Date & Time</th>
                                <th style="width: 10px">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSend as $userMessages)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $userMessages->name}}</td>
                                <td>{{ $userMessages->message}}</td>
                                <td>{{ $userMessages->created_at}}</td>
                                <td>
                                    <div>
                                        <a href="/delete/{{$userMessages->id}}/user_send_delete" onclick="return confirm('Are you sure you want to Delete?')"><button class="btn btn-sm btn-danger m-2 delete-user" data-id="">Delete</button></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection