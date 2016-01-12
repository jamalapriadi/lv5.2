<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login User</title>
	{{Html::style('assets/css/bootstrap.min.css')}}
</head>
<body>
	<div class="container">
		@if(Session::has('pesan'))
			<div class="alert alert-success">
				{{Session::get('pesan')}}
			</div>
		@endif

		{{Form::open(array('url'=>'auth/login','method'=>'post'))}}
			<div class="form-group @if($errors->has('email')) has-error @endif">
				<label for="">Email</label>
				<input type="email" name="email" class="form-control">
				{{$errors->first('email')}}
			</div>

			<div class="form-group @if($errors->has('password')) has-error @endif">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control">
				{{$errors->first('password')}}
			</div>

			<div class="form-group">
				<label for=""></label>
				<button class="btn btn-primary">
					Login
				</button>

				<a href="{{URL::to('registrasi')}}" class="btn btn-default">Daftar Disini</a>
			</div>
		{{Form::close()}}
	</div>
</body>
</html>