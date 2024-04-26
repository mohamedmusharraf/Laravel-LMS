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
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="">Book id</th>
                                <th class="">Books NAME</th>
                                <th class="">Author</th>
                                <th class="">Publisher</th>
                                <th class="">Year</th>
                                <th class="">AVAILABILITY</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"> 
                            @foreach($userAllBooks as $booksTables)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booksTables['book_title'] ?? "" }}</td>
                                <td>{{ $booksTables['author'] ?? "" }}</td>
                                <td>{{ $booksTables['publisher'] ?? "" }}</td>
                                <td>{{ $booksTables['year'] ?? "" }}</td>
                                <td>{{ $booksTables['quantity'] ?? "" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('tableBody');

        searchInput.addEventListener('input', function(event) {
            const searchText = event.target.value.toLowerCase();
            const rows = tableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const nameColumn = row.getElementsByTagName('td')[1]; 

                if (nameColumn) {
                    const name = nameColumn.textContent.toLowerCase();
                    if (name.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }
        });
    });
</script>

@endsection