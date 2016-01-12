@extends('template')

@section('content')
	<legend>Tambah Kategori</legend>

	{!!Form::open(array('url'=>'admin/kategori','method'=>'post')) !!}
		<div class="form-group">
			<label for="">Kategori</label>
			<input type="text" name="kategori" class="form-control">
		</div>

		<div class="form-group well">
			<button class="btn btn-primary">
				Simpan
			</button>
		</div>
	{!! Form::close() !!}
@stop