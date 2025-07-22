@extends('layouts.front')

@section('content')

 
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="index.html">Blog <i class="fa fa-chevron-right"></i></a></span> <span>Blog Single <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">{{__('Location')}}</h1>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
        <h2 class="mb-3">{{$location->name}}</h2>
        
          <img src="{{ url('upload/destination/' . $location->image) }}" alt="" class="img-fluid">
        </p>
        <p>{{$location->description}}</p>
        
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
          </div>
        </div>
        
      

        <div class="pt-5 mt-5">
          <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">6 Comments</h3>
          <ul class="comment-list">
            <li class="comment">
              <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <h3>John Doe</h3>
                <div class="meta">September 11, 2020 at 2:21pm</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                <p><a href="#" class="reply">Reply</a></p>
              </div>
            </li>

          </ul>
          <!-- END comment-list -->
          
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Leave a comment</h3>
            <form action="#" class="p-5 bg-light">
              <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website">
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
              </div>

            </form>
          </div>
        </div>

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
        <div class="sidebar-box pt-md-5">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon fa fa-search"></span>
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
           <!-- Booking Form -->
           <div class="col-md-12">
            <h3>Price: ${{ $location->average_price }}/person</h3>
            <h3>Book Now</h3>
            <form action="{{ route('book.destination') }}" method="POST">
                @csrf
                <input type="hidden" name="destination_id" value="{{ $location->id }}">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="Your City" class="form-label">*Your City</label>
               
                    <span data-name="City"><input size="40" maxlength="400" class="form-control" placeholder="(Ex.. Bhopal)"  type="text" name="City"></span><br>
                    
              </div>
              

              <div class="mb-3">

              <label> *No of Person Travel</label>
                <span  data-name="text-70"><input size="40" maxlength="400" class="form-control"  placeholder="(Ex..1,2,3,4 etc...)" type="text" name="person"></span>
              </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Travel Date</label>
                    <input type="date" name="travel_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Book Now</button>
                @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
            </form>
        </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Categories</h3>
            <li><a href="#">Travel <span>(12)</span></a></li>
            
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="fa fa-calendar"></span> September 11, 2020</a></div>
                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
              </div>
            </div>
          </div>
       
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">dish</a>
            <a href="#" class="tag-cloud-link">menu</a>
            <a href="#" class="tag-cloud-link">food</a>
            <a href="#" class="tag-cloud-link">sweet</a>
            <a href="#" class="tag-cloud-link">tasty</a>
            <a href="#" class="tag-cloud-link">delicious</a>
            <a href="#" class="tag-cloud-link">desserts</a>
            <a href="#" class="tag-cloud-link">drinks</a>
          </div>
        </div>

        
      </div>

    </div>
  </div>
</section> <!-- .section -->	

    

@endsection
