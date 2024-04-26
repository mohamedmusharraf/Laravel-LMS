@extends('layouts.header2')

@section('Dashboard')
<div class="content m-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Book id</th>
                            <th>Books NAME</th>
                            <th>User NAME</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($book_recommendation as $recommendation)
                        <tr>
                            <td>{{ $recommendation->Book_id ?? "" }}</td>
                            <td>{{ $recommendation->Book_Title ?? "" }}</td>
                            <td>{{ $recommendation->user_name ?? "" }}</td>
                            <td>{{ $recommendation->Description ?? "" }}</td>
                            <td>
                                <a href="/delete/{{$recommendation->id}}/recommendation_delete" onclick="return confirm('Are you sure you want to Delete?')">
                                    <button class="btn btn-sm btn-danger m-2 delete-user" data-id="">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No recommendations found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection