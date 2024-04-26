@extends('layouts.header2')
@section('Dashboard')


<div class="cotainer-fluid my-4">
    <h2 class="text-center">New Admin Registration</h2>
    <div class="row d-flex aliggn-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">

            <form action="/manage/admin" method="post" enctype="multipart/form-data" class="user_form">
                @csrf
                <!-- username feield -->
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Admin Name</label>
                    <input type="text" id="admin_name" class="form-control" placeholder="Enter Your Name" autocomplete="off" name="admin_name" required>
                </div>
                <!-- email feield -->
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">E-mail</label>
                    <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="admin_email" required>
                </div>
                <!-- image feield -->
                <div class="form-outline mb-4">
                    <label for="admin_image" class="form-label">Image</label>
                    <input type="file" id="admin_image" class="form-control" name="admin_image" required>
                </div>
                <!-- password feield -->
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" name="admin_password" required>
                </div>
                <!-- confirm password feield -->
                <div class="form-outline mb-4">
                    <label for="conf_admin_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_admin_password" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" name="conf_admin_password" required>
                </div>
                <!-- address feield -->
                <div class="form-outline mb-4">
                    <label for="admin_address" class="form-label">Address</label>
                    <input type="text" id="admin_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="admin_address" required>
                </div>
                <!-- contact feield -->
                <div class="form-outline mb-4">
                    <label for="admin_contact" class="form-label">Contact</label>
                    <input type="text" id="admin_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" name="admin_contact" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" id="type" class="form-control" autocomplete="off" name="type" value="Admin" required readonly>
                </div>

                @if($message=Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong></strong> {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                @endif
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_register">

                </div>
            </form>
        </div>
    </div>
</div>

@endsection