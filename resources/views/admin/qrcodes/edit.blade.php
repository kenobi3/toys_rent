@extends('layouts.admin')

@section('title','Редактирование QR кода: '.$qrcode->name)

@section('content')
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
			<div class="col-sm-12">
				<h1 class="m-0">Редактирование QR кода: {{ $qrcode->name }}</h1>
			</div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		 <div class="row">	 <div class="col-lg-12">  
			<div class="card card-info">

              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action={{ route('qrcodes.update',$qrcode->id) }} method="POST">
				@csrf
				@method('PUT')
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Название QR кода" required value="{{ $qrcode->name }}">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Ссылка на ресурс</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ssil" name="ssil" placeholder="Ссылка на ресурс" required value="{{ $qrcode->ssil }}">
                    </div>
                  </div>				  
				  
                </div>
				
				
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Сохранить</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
		  </div></div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection