@extends('layouts.app')

@section('content')
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('img/B9BD0058-2F34-4CE8-BAE7-3C2659553793.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/C45CF148-46AC-4923-AB26-33F3FD13149C.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/F48786D8-ABF5-42DD-B03D-F4D33667160F.jpg') }}" alt="Fourth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/D717448D-B0B7-487D-90EC-D3191C2D123E.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>
@endsection
