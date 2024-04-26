@extends('layouts.user_header')
@section('user_Dashboard')

<div class="col-xl">
    <div class="card mb-4 m-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Send a Message</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/users/messages">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Name</label>
                    <input type="text" name="name" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter Name..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Message</label>
                    <textarea id="basic-default-message" name="message" class="form-control" placeholder="Enter Message..." required></textarea>
                </div>
                @if($message=Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong></strong> {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Add Message</button>
            </form>
        </div>
    </div>
</div>

@endsection