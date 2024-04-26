@extends('layouts.header2')
@section('Dashboard')


<div class="container">
    <form class="d-flex m-5 mb-2" id="searchForm">
        <input id="searchInput" name="searchValue" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn btn-outline-primary" type="submit">Search</button>
    </form>
</div>

@if($paymants->isNotEmpty())
<div class="container">
    <section class="content m-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped" id="userData"> 
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>User Name</th>
                                <th>Borrowed Date</th>
                                <th>Return Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"> 
                            @foreach($paymants as $borrowedBook)
                            @if ($borrowedBook->status == 'returned')
                            <tr>
                                <td>{{ $borrowedBook->book_id ?? "" }}</td>
                                <td>{{ $borrowedBook->book_name ?? "" }}</td>
                                <td>{{ $borrowedBook->user_name ?? "" }}</td>
                                <td>{{ $borrowedBook->borrowed_date ?? "" }}</td>
                                <td>{{ $borrowedBook->return_date ?? "" }}</td>
                                <td>{{ $borrowedBook->amount ?? "" }}</td>
                                <td>
                                    <div>
                                        <button class="btn btn-sm btn-primary m-2 payment" data-id="{{ $borrowedBook->id }}">Pay</button>
                                    </div>
                                </td>
                                <td>
                                    @if ($borrowedBook->action == 'Not Paid')
                                    <span class="badge bg-danger">Not Paid</span>
                                    @elseif ($borrowedBook->action == 'Paid')
                                    <span class="badge bg-success">Paid</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $(".payment").addClass('payment-button').on("click", function(e) {
            e.preventDefault();

            const paymentId = $(this).data("id");
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $(this).text('Paid');
            $.ajax({
                type: 'PUT',
                url: '{{ route("update-payment") }}',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    id: paymentId
                },
                success: function(response) {
                    console.log('Response:', response);
                    if (response.action === 'success') {
                        alert("Payment successful!");
                    } else {
                        alert('Failed to update action.');
                    }
                },
                error: function(xhr, action, error) {
                    console.error("AJAX request failed:", error);
                    alert("Failed to update action. Please try again.");
                }
            });
        });
    });
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