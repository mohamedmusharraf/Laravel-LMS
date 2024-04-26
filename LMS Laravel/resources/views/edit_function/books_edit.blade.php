@extends('layouts.header2')
@section('Dashboard')

<div class="col-xxl m-4">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Update Books</h5>
        </div>
       
        <div class="card-body">
            <form method="POST" action="/updateFunction/{{$allBooks->id}}/booksUpdate">
            @csrf
            @method('PUT')
          
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Book Title</label>
                    <div class="col-sm-10">
                   
    <input type="text" class="form-control" id="Book_Title" name="Book_Title" value="{{ old('Book_Title', $allBooks->book_title) }}" placeholder="Enter Book Title" required>
    
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Author" name="Author" value="{{ old('Author', $allBooks-> author)}}" placeholder="Enter Author" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-email">Publisher</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" id="Publisher" name="Publisher" class="form-control" value="{{ old('Publisher', $allBooks-> publisher)}}" placeholder=" Enter Publisher" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Year</label>
                    <div class="col-sm-10">
                        <input type="text" id="basic-default-Year" name="Year" class="form-control phone-mask" value="{{ old('Year', $allBooks-> year)}}" placeholder="Enter Year" aria-label="year" aria-describedby="basic-default-year" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Number of Copies</label>
                    <div class="col-sm-10">
                        <input type="text" id="basic-default-text" name="Number_of_Copies" class="form-control" value="{{ old('Number_of_Copies', $allBooks-> quantity)}}" placeholder="Enter Number of Copies" aria-label="Number of Copies" aria-describedby="basic-default-Copies" required>
                    </div>
                </div>
                @if($message=Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong></strong> {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    @endif
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>


@endsection