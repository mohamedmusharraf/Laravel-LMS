@extends('layouts.header2')
@section('Dashboard')

<section class="content m-5">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>User Name</th>
                            <th>Borrowed Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Fine</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($fine as $BorrowedBooks)

                        @php
                        $returnDate = new DateTime($BorrowedBooks->return_date);
                        $today = new DateTime();
                        $isPastDue = $returnDate < $today; $fine=$isPastDue ? $today->diff($returnDate)->days * 50 : 0;
                            @endphp
                            <tr>
                                <td>{{ $BorrowedBooks->book_id }}</td>
                                <td>{{ $BorrowedBooks->book_name }}</td>
                                <td>{{ $BorrowedBooks->user_name }}</td>
                                <td>{{ $BorrowedBooks->borrowed_date }}</td>
                                <td>{{ $BorrowedBooks->return_date }}</td>
                                <td>{{ $BorrowedBooks->status }}</td>
                                <td>{{ $fine }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</div>

@endsection