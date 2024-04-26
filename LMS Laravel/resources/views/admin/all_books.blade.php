@extends('layouts.header2')
@section('Dashboard')

<!-- Get database Data -->
<div class="container">
    <!-- Search Form -->
    <form class="d-flex m-5 mb-2">
        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn btn-outline-primary" type="button">Search</button>
    </form>

    <section class="content m-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="">Book id</th>
                                <th class="">Books NAME</th>
                                <th class="">Author</th>
                                <th class="">Publisher</th>
                                <th class="">Year</th>
                                <th class="">AVAILABILITY</th>
                                <th style="width: 200px">Options</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"> <!-- Added id attribute -->
                            @foreach($allBooks as $booksTables)
                            <tr>
                                <td>{{ $booksTables['id'] ?? "" }}</td>
                                <td>{{ $booksTables['book_title'] ?? "" }}</td>
                                <td>{{ $booksTables['author'] ?? "" }}</td>
                                <td>{{ $booksTables['publisher'] ?? "" }}</td>
                                <td>{{ $booksTables['year'] ?? "" }}</td>
                                <td>{{ $booksTables['quantity'] ?? "" }}</td>
                                <td>
                                    <div>
                                        <a href="/edit/{{$booksTables->id}}/edit_book"><button class="btn btn-sm btn-info m-2 edit-user" data-id="">Edit</button></a>
                                        <a href="/delete/{{$booksTables->id}}/books_delete" onclick="return confirm('Are you sure you want to Delete?')"><button class="btn btn-sm btn-danger m-2 delete-user" data-id="">Delete</button></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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