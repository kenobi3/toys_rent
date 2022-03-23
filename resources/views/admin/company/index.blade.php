@extends('layouts.admin')

@section('title','Список компаний')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
        <div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Список компаний</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	@if (session('success'))
	<div class="col-lg-12 alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fas fa-check"></i>Успех!</h5>
		{{ session('success') }}
	</div>
	@endif
	
	@if (session('errors'))
	<div class="col-lg-12 alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fas fa-ban"></i>Ошибка!</h5>
		{{ session('errors')->first() }}
	</div>
	@endif
	
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				<a class="btn btn-block btn-info btn-sm" href="{{ route('company.create') }}">Добавить компанию</a>
			</div>
			<div class="card-tools">
				
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
					<div class="input-group-append">
						<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>			  
		<!-- /.card-header -->
		<div class="card-body">
			<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
				<thead>
					<tr>
						<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ИД</th>
						<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Название</th>
						<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Собственник</th>
						<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Город</th>
						<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Товаров</th>
						<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Блокировка</th>
					</tr>
				</thead>
				<tbody>
					@foreach($companies as $company)
					<tr class="odd" style="cursor:pointer;"  onclick="window.location.href='{{ route('company.show',$company->id) }}'; return false">
						<td>{{ $company->id }}</td>
						<td>{{ $company->name }}</td>
						<td>{{ $company->user->name }}</td>
						<td>@if($company->city!=null){{ $company->city->name }}@endif</td>
						<td></td>
						<td align="center"><input type="checkbox" disabled="" @if($company->block==1)checked="checked"@endif></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
			</div>
			</div>
			{{ $companies->onEachSide(5)->links('admin.paginate') }}
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
	
</section>
<!-- /.content -->
@endsection									