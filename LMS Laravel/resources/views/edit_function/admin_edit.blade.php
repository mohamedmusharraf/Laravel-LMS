@extends('layouts.header2')
@section('Dashboard')


<div class="cotainer-fluid my-4">
        <h2 class="text-center">Admin Update</h2>
        <div class="row d-flex aliggn-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
        
                <form action="/editFunction/{{$registration->id}}/adminUpdate" method="post" enctype="multipart/form-data" class="admin_form">
                    @csrf
                    @method('PUT')
                    <!-- username feield -->
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Admin Name</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Enter Your Name" 
                        autocomplete="off" name="admin_name" value="{{ old('admin_name', $registration-> name)}}" required>
                    </div>
                    <!-- email feield -->
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">E-mail</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" 
                        name="admin_email" value="{{ old('admin_email', $registration-> email)}}" required>
                    </div>
                    <!-- image feield -->
                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">Image</label>
                        <input type="file" id="admin_image" class="form-control" name="admin_image" value="{{ old('admin_image', $registration-> image)}}">
                    </div>
                    
                    <!-- address feield -->
                    <div class="form-outline mb-4">
                        <label for="admin_address" class="form-label">Address</label>
                        <input type="text" id="admin_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" 
                        name="admin_address" value="{{ old('admin_address', $registration-> address)}}" required>
                    </div>
                    <!-- contact feield -->
                    <div class="form-outline mb-4">
                        <label for="admin_contact" class="form-label">Contact</label>
                        <input type="text" id="admin_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" 
                        name="admin_contact" value="{{ old('admin_contact', $registration-> contact)}}" required>
                    </div>
                    @if($message=Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong></strong> {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    @endif
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="Update">                      
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
