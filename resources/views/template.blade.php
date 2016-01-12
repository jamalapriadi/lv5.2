<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Try Laravel 5</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{URL::asset('assets/css/jquery.dataTables.min.css')}}">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="{{URL::to('admin')}}">Beranda <span class="sr-only">(current)</span></a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="{{URL::to('admin/kategori')}}">Kategori</a></li>
	            <li><a href="{{URL::to('admin/berita')}}">Berita</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	        <li>
	        	<a href="{{URL::to('admin/logout')}}">Keluar</a>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>


	<div class="container">
		@yield('content')
	</div>

	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('assets/ckeditor/ckeditor.js')}}"></script>

	<script>
		$(function(){
			$("#data").dataTable();

			CKEDITOR.replace( 'content' );
		});
	</script>

	@yield('footer')
</body>
</html>