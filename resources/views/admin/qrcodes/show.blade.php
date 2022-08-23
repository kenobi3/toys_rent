@extends('layouts.admin')

@section('title','QR код: '.$qrcode->name)

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
        <div class="row">
			<div class="col-sm-12">
				<h1 class="m-0">QR код: {{ $qrcode->name }}</h1>
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
						<strong>Адрес на ресурс</strong>
						<address>
						{{$qrcode->ssil}}
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<strong>Количество переходов</strong>
						<address>
							{{$qrcode->count}}
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<strong>QR коды</strong>
						<address>
						{{ QrCode::size(50)->generate(route('redirect',$qrcode->id)); }} <br /><br />
						{{ QrCode::size(100)->generate(route('redirect',$qrcode->id)); }} <br /><br />
						{{ QrCode::size(200)->generate(route('redirect',$qrcode->id)); }}
						</address>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				
				
				
				
				<!-- this row will not appear when printing -->
				<div class="row no-print">
					<div class="col-12">				  
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="{{ route('qrcodes.edit',$qrcode->id) }}">Редактировать</a>
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="#" onclick="if (confirm('Сбросить счетчик QR кода: {{$qrcode->name}}?')){event.preventDefault(); document.getElementById('clear-form').submit();} else {return false;};">Сбросить</a>
						<a class="btn btn-primary btn-info btn-sm"  style="margin-right: 5px;" href="#" onclick="if (confirm('Удалить QR код: {{$qrcode->name}}?')){event.preventDefault(); document.getElementById('destroy-form').submit();} else {return false;};">Удалить</a>
						
						<form id="destroy-form" action="{{ route('qrcodes.destroy', $qrcode->id) }}" method="POST" style="display: none;">
							@method('DELETE')
							@csrf
						</form>
						
						<form id="clear-form" action="{{ route('qrcodes.update', $qrcode->id) }}" method="POST" style="display: none;">
							@method('PATCH')
							<input type="hidden" id="clear" name="clear" value="true" />
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