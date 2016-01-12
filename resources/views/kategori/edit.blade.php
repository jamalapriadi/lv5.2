@extends('template')

@section('content')
	<legend>Tambah Kategori</legend>

	{!! Form::model($kategori,array('url'=>route('admin.kategori.update',['kategori'=>$kategori->id]),'method'=>'put'))!!}
		<div class="form-group">
			<label for="">Kategori</label>
			<input type="text" value="{{$kategori->kategori}}" name="kategori" class="form-control">
		</div>

		<div class="form-group well">
			<button class="btn btn-primary">
				Update
			</button>
		</div>
	{!! Form::close() !!}
@stop