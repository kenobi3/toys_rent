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
      <div class="container-fluid">
		<div class="row">
			@if (session('success'))
			<div class="col-lg-12 alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <h5><i class="icon fas fa-check"></i>Успех!</h5>
			  {{ session('success') }}
            </div>
			@endif
	
		
          <div class="col-lg-12">
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
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Название</th>
                      <th>Счет</th>
                      <th>Контакты</th>
                      <th>Блокировка</th>
                      <th>Управление</th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach($companies as $company)
                    <tr>
                      <td>{{ $company->id }}</td>
                      <td>{{ $company->name }}</td>
                      <td></td>
                      <td>{{ $company->contacts }}</td>
                      <td>@if($company->block==1)Да@elseНет@endif</td>
                      <td></td>
                    </tr>
					@endforeach
                  </tbody>
                </table>
              </div>
			  
			  <div class="jsgrid-pager-container"><div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span> <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">3</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">4</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">5</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1 of 5 </div></div>
			  
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
	</div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection