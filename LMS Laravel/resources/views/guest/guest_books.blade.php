<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="../../assets/vendor/js/helpers.js"></script>
</head>
<style>
    /* Custom styles */
    .container {
        margin-top: 50px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f0f0f0;
        border-bottom: 1px solid #ddd;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 0;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    .form-control {
        border-radius: 20px;
        border-color: #ced4da; /* Set border color */
    }

    .form-control:focus {
        border-color: #80bdff; /* Set border color on focus */
        box-shadow: none; /* Remove box shadow on focus */
    }

    #searchButton {
        border-radius: 20px;
    }
     /* Custom styles */
     .container {
        margin-top: 50px;
        text-align: center; /* Center align the content */
    }

    .form-control {
        border-radius: 5px;
        border-color: #ced4da; /* Set border color */
        width: 1000px; /* Set width to 500px */
        display: inline-block;
        height: 25px;
        margin-bottom: 50px;
    }

    .form-control:focus {
        border-color: #80bdff; /* Set border color on focus */
        box-shadow: none; /* Remove box shadow on focus */
    }

    #searchButton {
        border-radius: 5px;
    }

    /* Additional styles for responsiveness */
    @media (max-width: 576px) {
        .form-control {
            width: 100%; /* Set width to 100% on smaller screens */
        }
    }
    /* Custom styles for the search input */
.form-control {
    border-radius: 5px;
    border: 2px solid #ced4da; /* Set border color */
    width: 70%; /* Adjust width as needed */
    height: 40px; /* Adjust height as needed */
    padding: 0 15px; /* Add padding for better spacing */
    margin-bottom: 20px; /* Adjust margin as needed */
    font-size: 16px; /* Adjust font size as needed */
}

.form-control:focus {
    border-color: #80bdff; /* Set border color on focus */
    outline: none; /* Remove outline */
}

#searchButton {
    border-radius: 5px;
    height: 40px; /* Match height with the input */
    font-size: 16px; /* Adjust font size as needed */
    margin-left: 10px; /* Add margin between input and button */
}

</style>
<body>
    <div id="background">
        <div id="header">
            <a href="#" class="fa fa-envelope" style="text-decoration:none;  color: white;">
                musharraf@gmail.com
            </a>
            <a href="#" class="fa fa-phone" style="text-decoration:none; color: white;">
                +94-722561061
            </a>
            <a href="#" class="fa fa-facebook" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-instagram" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-twitter" style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
        </div>
        <div id="menu">
            <div id="logo">LIBRARY<b style="color:#2c7ad6 ;">ZONE</b></div>
            <div id="menu1">
                <ul>
                    <a href="{{ route('auth.admin_login') }}">
                        <li class="fa fa-home">Admin</li>
                    </a>
                    <a href="{{ route('auth.user_login') }}">
                        <li class="fa fa-home">User</li>
                    </a>
                    <a href="{{ route('user_registration') }}">
                        <li class="fa fa-registered">Register</li>
                    </a>
                    <a href="{{ route('guest.guest_books') }}">
                        <li class="fa fa-glide">Guest</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="container">
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
                                        <th style="">Book id</th>
                                        <th class="">Books NAME</th>
                                        <th class="">Author</th>
                                        <th class="">Publisher</th>
                                        <th class="">Year</th>
                                        <th class="">AVAILABILITY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guestBooks as $booksTables)
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
                    </div>
                </div>
            </section>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Search Function
        $('#searchButton').click(function() {
            const searchText = $('#searchInput').val().toLowerCase(); 
            
            $('tbody tr').each(function() {
                const rowText = $(this).text().toLowerCase(); 
                
                if (rowText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide(); 
                }
            });
        });
    });
</script>

</body>
</html>
