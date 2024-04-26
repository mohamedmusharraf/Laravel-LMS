@extends('layouts.user_header')
@section('user_Dashboard')

<div class="container">
    <form class="d-flex m-5 mb-2">
        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn btn-outline-primary" type="button">Search</button>
    </form>
    <section class="content m-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped" id="userData">
                        <thead>
                            <tr>
                                <th style="">Book id</th>
                                <th class="">Books NAME</th>
                                <th class="">USER NAME</th>
                                <th class="">BORROWED DATE</th>
                                <th class="">RETURN DATE</th>
                                <th class="">STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($issuedBooks as $borrowedBooks)
                            <tr>
                                <td>{{ $borrowedBooks['book_id'] ?? "" }}</td>
                                <td>{{ $borrowedBooks['book_name'] ?? "" }}</td>
                                <td>{{ $borrowedBooks['user_name'] ?? "" }}</td>
                                <td>{{ $borrowedBooks['borrowed_date'] ?? "" }}</td>
                                <td>{{ $borrowedBooks['return_date'] ?? "" }}</td>
                                <td>{{ $borrowedBooks['status'] ?? "" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

</script>


@endsection