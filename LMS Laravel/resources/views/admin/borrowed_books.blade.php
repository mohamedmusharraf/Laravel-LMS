@extends('layouts.header2')
@section('Dashboard')

<!-- Form to input data -->
<div class="card m-4">

    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Borrowed Books</h5>
        <small class="text-muted float-end"></small>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('borrowed_books.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="user_name" placeholder="User Name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="book_name">Book Name</label>
                <div class="col-sm-10">
                    <select class="form-select" id="book_name" name="book_name" required>
                        <option value="" selected disabled>Select Book</option>
                        @foreach($books as $book_title => $bookTitle)
                        <option value="{{ $book_title }}">{{ $bookTitle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Book-id" class="col-md-2 col-form-label">Book Id</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="book_id" name="book_id" required readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="borrowed-date" class="col-md-2 col-form-label">Borrowed Date</label>
                <div class="col-md-10">
                    <input class="form-control" type="date" id="borrowed-date" name="borrowed_date" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="return-date" class="col-md-2 col-form-label">Return Date</label>
                <div class="col-md-10">
                    <input class="form-control" type="date" id="return-date" name="return_date" required>
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
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function() {
        $('#book_name').change(function() {
            console.log('Title changed');
            var selectedTitle = $(this).val(); 
            $.ajax({
                type: 'GET',
                url: '/get-book-id', 
                data: {
                    title: selectedTitle
                },
                success: function(response) {
                    console.log(response);
                    $('#book_id').val(response.book_id);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                }
            });
        });
    });
</script>

@endsection