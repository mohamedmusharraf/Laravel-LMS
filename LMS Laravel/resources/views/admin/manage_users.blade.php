@extends('layouts.header2')
@section('Dashboard')

<!-- Get database Data -->
<form id="searchForm" class="d-flex m-5 mb-2">
    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button id="searchButton" class="btn btn-outline-primary" type="submit">Search</button>
</form>
<section class="content m-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="">User id</th>
                            <th class="">Name</th>
                            <th class="">Email</th>
                            <th class="">Image</th>
                            <th class="">Address</th>
                            <th class="">Contact</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($registration as $userTables)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $userTables->name }}</td>
                            <td>{{ $userTables->email }}</td>
                            <td><img src="{{ asset('images/' . $userTables->image) }}" style="width: 50px; height: 50px; object-fit: contain" alt="Image"></td>
                            <td>{{ $userTables->address }}</td>
                            <td>{{ $userTables->contact }}</td>
                            <td>
                                <a href="/edit/{{$userTables->id}}/user_edit"><button class="btn btn-sm btn-primary m-2 create-user" data-id="">Edit</button></a>
                                <a href="/delete/{{$userTables->id}}/user_delete" onclick="return confirm('Are you sure you want to Delete?')"><button class="btn btn-sm btn-danger m-2 delete-user" data-id="">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center;">
                    <button id="showCreateForm" class="btn btn-sm btn-primary m-2 create-user" data-id="">Create</button>
                </div>
                <div id="createFormContainer" style="display: none; margin: 100px">
                    <!-- Form for creating a new user -->
                    <form method="POST" action="/users/craete" enctype="multipart/form-data">
                        @csrf
                        <!-- username feield -->
                        <div class="form-outline mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" name="user_username" required>
                        </div>
                        <!-- email feield -->
                        <div class="form-outline mb-4">
                            <label for="user_username" class="form-label">E-mail</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="user_email" required>
                        </div>
                        <!-- image feield -->
                        <div class="form-outline mb-4">
                            <label for="user_image" class="form-label">User Image </label>
                            <input type="file" id="user_image" class="form-control" name="user_image" required>
                        </div>
                        <!-- password feield -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" name="user_password" required>
                        </div>
                        <!-- confirm password feield -->
                        <div class="form-outline mb-4">
                            <label for="conf_user_password" class="form-label">Confirm Password</label>
                            <input type="password" id="conf_user_password" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" name="conf_user_password" required>
                        </div>
                        <!-- address feield -->
                        <div class="form-outline mb-4">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="user_address" required>
                        </div>
                        <!-- contact feield -->
                        <div class="form-outline mb-4">
                            <label for="user_contact" class="form-label">Contect</label>
                            <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" name="user_contact" required>
                        </div>
                        <div class="mt-4 pt-2">
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>

                    </form>
                    <form id="createForm">
                    </form>
                </div>
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

    document.getElementById('showCreateForm').addEventListener('click', function() {
        document.getElementById('createFormContainer').style.display = 'block';
    });
</script>

@endsection