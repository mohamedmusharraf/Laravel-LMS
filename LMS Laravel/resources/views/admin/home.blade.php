@extends('layouts.header2')
@section('Dashboard')

<section class="library-news mt-5">
    <div class="container">
        <h2>Library News & Updates</h2>
        <div class="news">
            <div class="news-item">
                <h3>Upcoming Events</h3>
                <ul>
                    <li>
                        <h4>Book Club Meeting</h4>
                        <p>Date: April 10, 2024</p>
                        <p>Time: 5:00 PM - 6:00 PM</p>
                        <p>Location: Library Meeting Room</p>
                        <a href="#" class="read-more">Read More</a>
                    </li>
                    <li>
                        <h4>Author Talk: Jane Doe</h4>
                        <p>Date: April 15, 2024</p>
                        <p>Time: 6:30 PM - 7:30 PM</p>
                        <p>Location: Library Auditorium</p>
                        <a href="#" class="read-more">Read More</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div id="event-details-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Book Club Meeting</h2>
        <p>Date: April 10, 2024</p>
        <p>Time: 5:00 PM - 6:00 PM</p>
        <p>Location: Library Meeting Room</p>
        <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et nisi a nunc ultricies rhoncus.</p>
    </div>
</div>
<script>
    var modal = document.getElementById("event-details-modal");

    var span = document.getElementsByClassName("close")[0];

    var readMoreButtons = document.querySelectorAll(".read-more");
    readMoreButtons.forEach(function(button) {
        button.onclick = function() {
            modal.style.display = "block";
        }
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection