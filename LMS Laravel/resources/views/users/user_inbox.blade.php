@extends('layouts.user_header')
@section('user_Dashboard')

<div class="container">
    <section class="content m-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>Message</th>
                                <th>Date & Time</th>
                                <th style="width: 10px;">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userMessages as $adminMessage)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $adminMessage->name}}</td>
                                <td>{{ $adminMessage->message}}</td>
                                <td>{{ $adminMessage->created_at}}</td>
                                <td>
                                <form method="get" action="{{ route('inbox.delete', ['id' => $adminMessage->id]) }}" onsubmit="return confirm('Are you sure you want to delete this message?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger m-2 delete-user" data-id="">Delete</button>
</form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection