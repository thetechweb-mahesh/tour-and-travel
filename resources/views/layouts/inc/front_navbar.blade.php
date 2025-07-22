<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        @php
        $setting = App\Models\Setting::find(1);
        @endphp
        
        <a href="{{ url('/') }}">
            <img src="{{ asset('upload/settings/'.$setting->logo) }}" alt="shop.fitnesstyle" />
        </a>
        {{-- <a class="navbar-brand" href="{{url('/')}}">Pacific<span>Travel Agency</span></a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url('/destination')}}" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="{{url('hotel')}}" class="nav-link">Hotel</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>