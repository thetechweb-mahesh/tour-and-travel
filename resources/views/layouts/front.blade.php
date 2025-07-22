<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pacific - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
	
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">
	@php  
    $setting = App\Models\Setting::find(1);
  @endphp

  @if($setting)
 <link rel="shortcut icon" href="{{ asset('upload/settings/'.$setting->favicon)}}" type="image/x-icon">
 @endif

	
	<link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>



			
    
    <div id="wrapper" class="homepage-1"> <!-- wrapper -->

        @include('layouts.inc.front_navbar')
         <div>
 
             @yield('content')
     </div>

     @include('layouts.inc.footer_navbar')
 
 </div>
 
 
    
 {{-- <script>
	document.addEventListener("DOMContentLoaded", function() {
		document.querySelector(".search-property-1").addEventListener("submit", function(event) {
			event.preventDefault(); // Prevent page reload
	
			let formData = new FormData(this);
	
			fetch("{{ url('/api/search') }}", {
				method: "POST",
				headers: {
					"X-CSRF-TOKEN": document.querySelector('input[name=_token]').value
				},
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				console.log("Search Results:", data);
				displayResults(data);
			})
			.catch(error => console.error("Error:", error));
		});
	
		function displayResults(data) {
			let resultsContainer = document.getElementById("results");
			resultsContainer.innerHTML = ""; // Clear previous results
	
			if (data.length === 0) {
				resultsContainer.innerHTML = "<p>No results found.</p>";
				return;
			}
	
			// let output = "<ul>";
			// data.forEach(result => {
			// 	output += `<li><strong>${result.destination}</strong> - ${result.checkin_date} to ${result.checkout_date} ($${result.price_limit})</li>`;
			// });
			// output += "</ul>";
			let output = `<table >
                <tr>
                    <th>Destination</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Price Limit</th>
                </tr>`;

data.forEach(result => {
    output += `<tr>
                 <td><strong>${result.destination}</strong></td>
                 <td>${result.checkin_date}</td>
                 <td>${result.checkout_date}</td>
                 <td>$${result.price_limit}</td>
               </tr>`;
});

output += `</table>`;

	
			resultsContainer.innerHTML = output;
		}
	});
	</script>
	 --}}

    
    <!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


			<script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
			<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
			<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
			<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
			<script src="{{ asset('frontend/js/jquery.easing.1.3.js')}}"></script>
			<script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
			<script src="{{ asset('frontend/js/jquery.stellar.min.js')}}"></script>
			<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
			<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
			<script src="{{ asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
			<script src="{{ asset('frontend/js/bootstrap-datepicker.js')}}"></script>
			<script src="{{ asset('frontend/js/scrollax.min.js')}}"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="{{ asset('frontend/js/google-map.js')}}"></script>
			<script src="{{ asset('frontend/js/main.js')}}"></script>
			
		</body>
		</html>