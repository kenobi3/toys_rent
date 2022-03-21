@extends('layouts.admin')

@section('title','Создание компании')

@section('content')
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Создание компании</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
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
              <form class="form-horizontal" action={{ route('company.store') }} method="POST">
				@csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Название компании" required>
                    </div>
                  </div>
				  
				  <div class="form-group row">
					<label for="contacts" class="col-sm-2 col-form-label">Контакты</label>
					<textarea class="form-control" id="contacts" name="contacts" rows="5" placeholder="Контакты компании" required></textarea>
				  </div>
				  
				  <div class="form-group row">
					<label for="opis" class="col-sm-2 col-form-label">Описание</label>
					<textarea class="form-control" id="opis" name="opis" rows="3" placeholder="Описание компании" required></textarea>
				  </div>
				  
				  <div class="form-group row">
					<label>Главный пользователь</label>
					<select class="form-control" id="user_id" name="user_id">
						@foreach($users as $user)
							<option value="{{ $user->id }}">{{ $user->name.' ('.$user->id.')'}}</option>
						@endforeach
					</select>
				  </div>
                </div>
				
				
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Создать</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
		  </div></div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection