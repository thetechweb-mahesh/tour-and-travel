@extends('layouts.front')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('frontend/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">{{__('Tours List')}}</h1>
       </div>
     </div>
   </div>
  </section>
  <section class="ftco-section">
    <div class="container">
     <div class="row">

        @foreach ($dest as $location)
        <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
            <div class="project-wrap">
                <a href="#" class="img" style="background-image: url('{{ url('upload/destination/' . $location->image) }}');">
                    <span class="price">${{ $location->average_price }}/person</span>
                </a>
                <div class="text p-4">
                    <span class="days">8 Days Tour</span>
                    <h3><a href="{{url('category/'.$category->slug.'/'.$location->slug) }}">{{ $location->name }}</a></h3>
                    <span class="price">${{ $location->average_price }}/person</span>
                    <p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
                    <ul>
                        <li><span class="flaticon-shower"></span>2</li>
                        <li><span class="flaticon-king-size"></span>3</li>
                        <li><span class="flaticon-mountains"></span>Book Now</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    
 </div>
 <div class="row mt-5">
   <div class="col text-center">
     <div class="block-27">
       <ul>
         <li><a href="#">&lt;</a></li>
         <li class="active"><span>1</span></li>
         <li><a href="#">2</a></li>
         <li><a href="#">3</a></li>
         <li><a href="#">4</a></li>
         <li><a href="#">5</a></li>
         <li><a href="#">&gt;</a></li>
     </ul>
 </div>
 </div>
 </div>
 </div>
 </section>

    

@endsection
