@extends('layouts.admin')

@section('title','Город: '.$city->name)

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
        <div class="row">
			<div class="col-sm-12">
				<h1 class="m-0">Город: {{ $city->name }}</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">	 <div class="col-lg-12">  
			<div class="invoice p-3 mb-3">
				<!-- title row -->
				<div class="row">
					
					<!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						<strong>Описание города</strong>
						<address>
						{{$city->opis}}
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<strong>Информация о компании</strong>
						<address>
							Компания: {{$city->company->name}}<br>
							Руководитель: {{$city->company->user->name}}<br>
							Статус: @if($city->company->block==1)Заблокирована@elseРаботает@endif
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<strong>Дополнительная информация</strong>
						<address>
						</address>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				
				
				
				
				<!-- this row will not appear when printing -->
				<div class="row no-print">
					<div class="col-12">				  
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="{{ route('city.edit',$city->id) }}">Редактировать</a>
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="#" onclick="if (confirm('Удалить город: {{$city->name}}?')){event.preventDefault(); document.getElementById('destroy-form').submit();} else {return false;};">Удалить</a>
						
						<form id="destroy-form" action="{{ route('city.destroy', $city->id) }}" method="POST" style="display: none;">
							@method('DELETE')
							@csrf
						</form>
						
					</div>
				</div>
			</div>
		</div></div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection