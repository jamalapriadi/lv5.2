@extends('template')

@section('content')
	<a href="{{URL::to('admin/kategori/create')}}" class="btn btn-primary">
		Tambah Kategori
	</a>

	<hr>

	@include('flash::message')
	
	<table class="table table-striped" id="data">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kategori</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0;?>
			@foreach($kategori as $row)
				<?php $no++;?>
				<tr>
					<td>{{$no}}</td>
					<td>{{$row->kategori}}</td>
					<td>
						<a href="{{URL::to('admin/kategori/'.$row->id.'/edit')}}" class="btn btn-default">
							<i class="glyphicon glyphicon-edit"></i>
							Edit
						</a>
					</td>
					<td>
						{{Form::open(array('url'=>'admin/kategori/'.$row->id))}}
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