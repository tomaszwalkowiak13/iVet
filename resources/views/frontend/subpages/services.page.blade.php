@extends('layouts.frontend')
@section('content')

<!-- Services -->
<div class="container services-body">
    <div class="row services_page">
        <div class="col-12 services_page-title">
            <h2>Nasze usługi</h2>
        </div>
    </div>
    <div class="col-sm-12 col-lg-12 services_page-content">
        <p>Poniżej przedstawiamy cennik usług, które możemy Państwu zaoferować:</p><br>
        @foreach( $services as $service)
        <li>{{ $service->name }}, cena/szt: <span class="font-weight-bold">{{ $service->price }}</span> PLN</li>
        @endforeach
    </div>
    <div class="services_page-final">
        <p class="font-weight-bold">Informujemy, że wszystkie powyższe ceny mogą ulec zmianie, spowodowanej skomplikowaniem oraz nieprzewidzianymi trudnościami napotkanymi podczas udzielania usługi</p>
    </div>
</div>

@endsection('content')
