@extends('layouts.frontend')
@section('content')

<!-- Contact -->
<div class="container services-body">
    <div class="row contactUs">
        <div class="col-12 contactUs-title">
            <h2>Skontaktuj się z nami</h2>
        </div>
    </div>
    <div class="row contactUs-detail">
        <div class="col-12 col-sm-12 col-md-5 col-xl-5 contactUs-detail-content">
            <div class="row col-12 contactUs-item">
                <i class="fas fa-map-marked"></i>
                <p>Grabów nad Prosną, ul Grodzka 7</p>
            </div>
            <div class="row col-12 contactUs-item">
                <i class="fas fa-phone"></i>
                <p>658-586-458</p>
            </div>
            <div class="row col-12 contactUs-item">
                <i class="fas fa-envelope-open"></i>
                <p>gabinet@bovisvet.pl</p>
            </div>
            <div class="row col-12 contactUs-icons">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-xl-7 contactUs-detail-map">
            <div class="map">
                <iframe height="400px" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.413127990229!2d18.11857431576991!3d51.50563627963481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471abd7563c82b97%3A0xae2ef3d58942f6b9!2sGabinet%20weterynaryjny%20%22BOVIS%20VET%22%20%C5%81ukasz%20Walkowiak!5e0!3m2!1spl!2spl!4v1580513899726!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>

@endsection('content')
