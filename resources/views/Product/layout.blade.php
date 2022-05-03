<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
 <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery.dataTables.css') }}"/>
    <script type="text/javascript" src="{{ asset('public/js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.dataTables.js') }}"></script>    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>


</head>
<body>
  
<div class="container">
    @yield('content')
</div>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
</body>
</html>