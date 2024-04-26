@extends('layouts.header')
@section('main')

<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">

            <form action="/manage/users" method="post" enctype="multipart/form-data" class="user_form">
                @csrf
                <!-- username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" name="user_username" required>
                </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">E-mail</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="user_email" required>
                </div>
                <!-- image field -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image </label>
                    <input type="file" id="user_image" class="form-control" name="user_image" required>
                </div>
                <!-- password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" name="user_password" required>
                </div>
                <!-- confirm password field -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" name="conf_user_password" required>
                </div>
                <!-- address field -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="user_address" required>
                </div>
                <!-- contact field -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" name="user_contact" required>
                </div>
                
                <!-- Success Message -->
                @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif
                <!-- Error Messages -->
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="btn btn-primary btn-lg btn-block" name="user_register">
                </div>

            </form>
        </div>
    </div>
</div>

@endsection