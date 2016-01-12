@extends('template')

@section('content')
	<legend>Berita</legend>

	<a href="{{URL::to('admin/berita/create')}}" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i>
		Tambah Berita
	</a>

	<hr>

	<table class="table table-striped" id="data">
		<thead>
			<tr>
				<th>No.</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0;?>
			@foreach($berita as $row)
				<?php $no++;?>
				<tr>
					<td>{{$no}}</td>
					<td>{{$row->judul}}</td>
					<td>{{$row->kategori->kategori}}</td>
					<td>
						<a href="{{URL::to('admin/berita/'.$row->id.'/edit')}}" class="btn btn-warning">
							<i class="glyphicon glyphicon-edit"></i>
							Edit
						</a>
					</td>
					<td>
						{{Form::open(array('url'=>'admin/berita/'.$row->id))}}
							{{Form::hidden('_method','DELETE')}}
							<button class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i>
								Hapus
							</button>
						{{Form::close()}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop