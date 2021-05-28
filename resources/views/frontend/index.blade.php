@extends('layouts.frontend')
@section('content')

<!-- Slider -->
<div class="container-fluid">
    <div class="row">
        <div class="main-slider col-12">
        </div>
    </div>
</div>
<!-- Services -->
<div class="container services" id="services" data-aos="fade-up" data-aos-duration="1000">
    <div class="row">
        <div class="services-item col-12 col-md-4">
            <h2 class="services-item-title">Nasze usługi</h2>
            <p class="services-item-text">Blisko 20 lat doświadczenia pozwala nam oferować Państwu szeroki zakres usług i najnowszych technologi</p>
            <a href="{{ route('services') }}" class="services-item-button"><button class="services-item-button-link">Dowiedz się więcej</button></a>
        </div>
        <div class="services-item col-12 col-md-4">
            <h2 class="services-item-title">Znajdź nas</h2>
            <p class="services-item-text">Skontaktuj się z nami, a zrobimy wszystko co w naszej mocy, aby nasza współpraca przebiegła w jak najlepszy sposób</p>
            <a href="{{ route('contact') }}" class="services-item-button"><button class="services-item-button-link">Dowiedz się więcej</button></a>
        </div>
        <div class="services-item col-12 col-md-4">
            <h2 class="services-item-title">Oferta dla hodowców</h2>
            <p class="services-item-text">Wiemy co to prowadzenie hodowli, dlatego dopsaujemy nasze4ą ofertę do Twoich
                potrzeb</p>
            <a href="{{ route('offer') }}" class="services-item-button"><button class="services-item-button-link">Dowiedz się więcej</button></a>
        </div>
    </div>
    <div class="row services-gallery">
        <figure class="services-gallery-item1 gallery-item">
        </figure>
        <figure class="services-gallery-item2 gallery-item">
        </figure>
        <figure class="services-gallery-item3 gallery-item">
        </figure>
    </div>
</div>
<!-- News -->
<div class="container news" id="news" data-aos="fade-up" data-aos-duration="1000">
    <div class="row">
        <h2 class="news-title col-12">Aktualności</h2>
    </div>
    <div class="slick-news">
        @foreach ($articles as $article)
        <a href="{{ route('article',['id'=>$article->id]) }}">
            <div class="news-item">
                <img src="{{ $article->photos->first()->path ?? $placeholder }}" alt="" class="news-item-img">
                <div class="news-item-content">
                    <div class="news-item-content-text"><span>{{ Str::limit($article->title,40) }}</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<!-- Team -->
<div class="container team" id="team">
    <div class="row">
        <h2 class="team-title col-12">Nasz zespół</h2>
    </div>
    <div class="slick-team">
        @foreach($employees as $employee)
        <div class="team-person">
            <div class="image-info">
                {{-- <img src="{{ $employee->user->photos->first()->path ?? $placeholder}}" alt="" class="team-person-img" style="width: 100%; height: 100%; background-size: cover no-repeat center center;"> --}}
                <div class="info">
                    <span class="icon">i</span>
                    <h2>{{ $employee->user->FullName }}</h2>
                    <p>{{ $employee->description }}</p>
                </div>
            </div>
            <span class="team-person-name">{{ $employee->user->FullName }}</span>
        </div>
        @endforeach
    </div>
</div>
<!-- Mobile App -->
<div class="container">
    <div class=" row mobile">
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 mobile-phone ">
            <img src="/img/phone.png" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 mobile-description ">
            <div class="row mobile-description-title">
                <div class="col-12">
                    <span>Zarządzanie gabinetem nigdy nie było takie proste</span>
                </div>
            </div>
            <div class="row mobile-description-content">
                <div class="col-12">
                    <span>Kontroluj swój gabinet gdziekolwiek jesteś i z jakiego
                        kolwiek urządzenia korzystasz - to naprawdę proste!</span>
                </div>
            </div>
            <div class="row mobile-description-icons">
                <div class="col-lg-4 text-center">
                    <img src="/img/google-play_btn_content.png" alt="">
                </div>
                <div class="col-lg-4 text-center">
                    <img src="/img/appstore_btn_content.png" alt="">
                </div>
                <div class="col-lg-4 text-center">
                    <img src="/img/huawei_btn_content.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
