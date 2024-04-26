@extends('layouts.header2')
@section('Dashboard')

<div class="container">
    <form class="d-flex m-5 mb-2" id="searchForm">
        <input id="searchInput" name="searchValue" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn btn-outline-primary" type="submit">Search</button>
    </form>
</div>
<div id="successMessage" class="alert alert-success" style="display: none;">Book returned successfully!</div>

<section class="content m-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped" id="userData">
                    <thead>
                        <tr>
                            <th class="">Id</th>

                            <th class="">Books Name</th>
                            <th class="">User Name</th>
                            <th class="">BORROWED DATE</th>
                            <th class="">RETURN DATE</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($borrowed_books as $borrowedBooks)

                        <tr>
                            <td>{{$borrowedBooks->id}}</td>

                            <td>{{ $borrowedBooks->book_name ?? "" }}</td>
                            <td>{{ $borrowedBooks->user_name ?? "" }}</td>
                            <td>{{ $borrowedBooks->borrowed_date ?? "" }}</td>
                            <td>{{ $borrowedBooks->return_date ?? "" }}</td>
                            <td>{{ Ucfirst($borrowedBooks->status) ?? "" }}</td>
                            <td>
                                <div>
                                    @if(lcfirst($borrowedBooks->status) != "returned")<button class="btn btn-sm btn-info m-2 return" data-id="{{ $borrowedBooks->id }}">Return</button>

                                    @endif
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


@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    $(document).ready(function() {
        $('.return').click(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '/return-book',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    $('#successMessage').show();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });


    function incrementQuantity(id) {
        $.ajax({
            type: 'POST',
            url: '/increment-quantity',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function(response) {},
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>