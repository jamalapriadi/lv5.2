@extends('template')

@section('content')
	<legend>Tambah Berita</legend>
	
	{{Form::open(array('url'=>'admin/berita','method'=>'post','files'=>true))}}
	<div class="row">
		<div class="col-lg-9">
			<div class="form-group">
				<label for="">Judul</label>
				<input type="text" name="judul" class="form-control">
			</div>		

			<div class="form-group">
				<label for="">Berita</label>
				<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<button class="btn btn-primary">
					<i class="glyphicon glyphicon-saved"></i>
					Simpan
				</button>

				<a href="{{URL::to('admin/berita')}}" class="btn btn-default">Kembali</a>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p>Kategori</p>
				</div>

				<div class="panel-body">
					@foreach($kategori as $row)
						<div class="form-group">
							<input type="radio" @if($row->id==$pertama->id) checked='checked' @endif name="kategori" value="{{$row->id}}"> {{$row->kategori}}
						</div>
					@endforeach
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<p>Featured Image</p>
				</div>

				<div class="panel-body">
					<div id="tampil"></div>

					<input type="file" id="foto" name="foto" name="featured">
				</div>
			</div>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('footer')
	<script>
		$(function(){
			$("#foto").on("change", function()
		    {
		        files = this.files;
				$.each( files, function(){
					 file = $(this)[0];
					 if (!!file.type.match(/image.*/)) {
			        	 var reader = new FileReader();
			             reader.readAsDataURL(file);
			             reader.onloadend = function(e) {
			            	img_src = e.target.result; 
			            	html = "<img src='"+img_src+"' class='img-responsive'><br>";
			            	$("#tampil").html('');
			            	$('#tampil').html( html );
			             };
		        	 } 
				});
		    });
		})
	</script>
@stop