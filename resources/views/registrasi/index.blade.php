<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasi User</title>
	{{Html::style('assets/css/bootstrap.min.css')}}
</head>
<body>
	<div class="container">
		<legend>Registrasi</legend>

		{{Form::open(array('url'=>'registrasi','method'=>'post'))}}
			<div class="form-group @if($errors->has('nama')) has-error @endif">
				<label for="">Nama</label>
				<input type="text" name="nama" class="form-control">
				{{$errors->first('nama')}}
			</div>

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
				<label for="">Level</label>
				<select name="level" id="level" class="form-control">
					<option value="">--Pilih Level--</option>
					<option value="admin">Admin</option>
					<option value="penulis">Penulis</option>
					<option value="pemilik">Pemilik</option>
				</select>
			</div>

			<div class="form-group">
				<label for=""></label>
				<button class="btn btn-primary">
					Daftar Sekarang
				</button>
			</div>
		{{Form::close()}}
	</div>
</body>
</html>