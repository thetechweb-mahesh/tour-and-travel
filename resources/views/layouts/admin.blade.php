<!DOCTYPE html><html lang="en"><head>
	<meta charset="utf-8">
	<title>Dashboard | Techmin - Bootstrap 5 Admin & Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description">
	<meta content="Techzaa" name="author">

	<!-- App favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- Daterangepicker css -->
	<link rel="stylesheet" href="css/daterangepicker.css">

	<!-- Vector Map css -->
	<link rel="stylesheet" href="css/jquery-jvectormap-1.2.2.css">

	<!-- Theme Config Js -->
	<script src="js/config.js"></script>

	<!-- App css -->
	<link href="css/app.min.css" rel="stylesheet" type="text/css" id="app-style">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Icons css -->
	<link href="css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
      <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
</head>

<body>
	

	<!-- Begin page -->
	<div class="wrapper">


        @include('layouts.inc.admin_sidebar')

        <main class="content-body" style="min-height: 788px;">


        <div class="container-fluid">
            @include('layouts.inc.admin_navbar')
            @yield('content')
        </div>
        </main>

        @include('layouts.inc.admin_footer')



    </div>




<!-- Vendor js -->
<script src="js/vendor.min.js"></script>









<script src="js/lucide.min.js"></script>

<!-- Apex Charts js -->
<script src="js/apexcharts.min.js"></script>

<!-- Vector Map js -->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>


<!-- Dashboard App js -->
<script src="js/dashboard.js"></script>

<!-- App js -->
<script src="js/app.min.js"></script>




</body></html>