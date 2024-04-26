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
                    @foreach($registration as $adminTables)
                        <tr id="userRow{{$adminTables->id}}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $adminTables['name'] ?? "" }}</td>
                            <td>{{ $adminTables['email'] ?? "" }}</td>
                            <td>
                                <img src="{{ asset('admin_images/' . $adminTables->image) }}" style="width: 50px; height: 50px; object-fit: contain" alt="Image">
                            </td>
                            <td>{{ $adminTables['address'] ?? "" }}</td>
                            <td>{{ $adminTables['contact'] ?? "" }}</td>
                            <td>
                                <div>
                                    <a href="/edit/{{$adminTables->id}}/admin_edit"><button class="btn btn-sm btn-info m-2 edit-user" data-id="">Edit</button></a>
                                    <a href="/delete/{{$adminTables->id}}/admin_delete" onclick="return confirm('Are you sure you want to Delete?')"><button class="btn btn-sm btn-danger m-2 delete-user" data-id="">Delete</button></a>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');

    searchInput.addEventListener('input', function(event) {
        const searchText = event.target.value.toLowerCase();
        const rows = tableBody.getElementsByTagName('tr');
        
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const nameColumn = row.getElementsByTagName('td')[1]; // Assuming name is in the second column
            
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
