@extends('layouts.admin')

@section('title','Компания: '.$company->name)

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
        <div class="row">
			<div class="col-sm-12">
				<h1 class="m-0">Компания: {{ $company->name }}</h1>
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
						<strong>Контакты компании</strong>
						<address>
						{{$company->contacts}}
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<strong>Описание компании</strong>
						<address>
							{{$company->opis}}
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<strong>Информация о компании</strong>
						<address>
							Руководитель: {{$company->user->name}}<br>
							@if($company->city!=null)
							Город: {{$company->city->name}}<br>
							@endif
							Статус: @if($company->block==1)Заблокирована@elseРаботает@endif
						</address>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				
				<!-- Table row -->
				<div class="row">
					<div class="col-12 table-responsive">
						<p class="lead">Данные о компании</p>
						
						<div class="table-responsive">
							<table class="table">
								<tbody><tr>
									<th style="width:50%">Товаров, шт.:</th>
									<td>0</td>
								</tr>
								<tr>
									<th>Сдано, шт.:</th>
									<td>0</td>
								</tr>
								<tr>
									<th>Обороты за месяц, руб.:</th>
									<td>0</td>
								</tr>
								<tr>
									<th>Обороты за текущий месяц, руб.:</th>
									<td>0</td>
								</tr>
								<tr>
									<th>Обороты за текущий месяц, руб.:</th>
									<td>0</td>
								</tr>
								</tbody></table>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				
				
				<!-- this row will not appear when printing -->
				<div class="row no-print">
					<div class="col-12">				  
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="{{ route('company.edit',$company->id) }}">Редактировать</a>
						@if($company->block==0)
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="{{ route('company.block',[$company->id,1]) }}" onclick="if (confirm('Заблокировать компанию: {{$company->name}}?')){return true;} else {return false;};">Заблокировать</a>
						@else
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="{{ route('company.block',[$company->id,0]) }}" onclick="if (confirm('Разблокировать компанию: {{$company->name}}?')){return true;} else {return false;};">Разблокировать</a>
						@endif
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="#" onclick="if (confirm('Удалить компанию: {{$company->name}}?')){event.preventDefault(); document.getElementById('destroy-form').submit();} else {return false;};">Удалить</a>
						
						<form id="destroy-form" action="{{ route('company.destroy', $company->id) }}" method="POST" style="display: none;">
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