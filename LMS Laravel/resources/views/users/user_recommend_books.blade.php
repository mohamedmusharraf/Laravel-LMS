@extends('layouts.user_header')
@section('user_Dashboard')

<div class="col-xl">
    <div class="card mb-4 m-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recommend a Book</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="/user/recommendation">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Book Title</label>
                    <input type="text" name="Book_Title" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter Book Title..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Book Id</label>
                    <input type="text" name="Book_id" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter Book Title..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">User Name</label>
                    <input type="text" name="user_name" id="basic-default-phone" class="form-control phone-mask" placeholder="Enter Book Title..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Description</label>
                    <textarea id="basic-default-message" name="Description" class="form-control" placeholder="Enter Description..." required></textarea>
                </div>
                @if($message=Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong></strong> {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif
                <button type="submit" name="submit" class="btn btn-primary">Submit Recommendation</button>
            </form>
        </div>
    </div>
</div>

@endsection