@extends('layouts.front')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('frontend/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">About</h1>
       </div>
     </div>
   </div>
  </section>

    <section class="ftco-section services-section">
        <div class="container">
            {{-- <p><strong>Destination:</strong> {{ $destination }}</p> --}}
    {{-- <p><strong>Check-in Date:</strong> {{ $checkin_date }}</p>
    <p><strong>Check-out Date:</strong> {{ $checkout_date }}</p> --}}
    {{-- <p><strong>Price Limit:</strong> ${{ $price_limit }}</p> --}}
              @foreach ($contents as $about)

              
              {!!$about->details!!}
              @endforeach
    
        </div>
    </section>

    

@endsection
