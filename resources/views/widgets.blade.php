@extends('layouts.app')

@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Widgets</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Inicio</a></li>
					<li class="breadcrumb-item active">Widgets</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<h5 class="mb-2">Info Box</h5>
		<div class="row">
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Mensajes</span>
						<span class="info-box-number">1,410</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Marcadores</span>
						<span class="info-box-number">410</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Subidas</span>
						<span class="info-box-number">13,648</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Me Gusta</span>
						<span class="info-box-number">93,139</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<!-- =========================================================== -->
		<h5 class="mt-4 mb-2">Info Box Con <code>bg-*</code></h5>
		<div class="row">
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box bg-info">
					<span class="info-box-icon"><i class="far fa-bookmark"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Marcadores</span>
						<span class="info-box-number">41,410</span>

						<div class="progress">
							<div class="progress-bar" style="width: 70%"></div>
						</div>
						<span class="progress-description">
							70% Incremento en 30 Días
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box bg-success">
					<span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Me Gusta</span>
						<span class="info-box-number">41,410</span>

						<div class="progress">
							<div class="progress-bar" style="width: 70%"></div>
						</div>
						<span class="progress-description">
							70% Incremento en 30 Días
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box bg-warning">
					<span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Eventos</span>
						<span class="info-box-number">41,410</span>

						<div class="progress">
							<div class="progress-bar" style="width: 70%"></div>
						</div>
						<span class="progress-description">
							70% Incremento en 30 Días
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box bg-danger">
					<span class="info-box-icon"><i class="fas fa-comments"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Comentarios</span>
						<span class="info-box-number">41,410</span>

						<div class="progress">
							<div class="progress-bar" style="width: 70%"></div>
						</div>
						<span class="progress-description">
							70% Incremento en 30 Días
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<!-- =========================================================== -->

		<!-- Small Box (Stat card) -->
		<h5 class="mb-2 mt-4">Small Box</h5>
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small card -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>150</h3>

						<p>Nuevas Órdenes</p>
					</div>
					<div class="icon">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<a href="#" class="small-box-footer">
						Más Info <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small card -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>53<sup style="font-size: 20px">%</sup></h3>

						<p>Crecimiento</p>
					</div>
					<div class="icon">
						<i class="fas fa-chart-bar"></i>
					</div>
					<a href="#" class="small-box-footer">
						Más info <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small card -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>44</h3>

						<p>Usuarios Registrados</p>
					</div>
					<div class="icon">
						<i class="fas fa-user-plus"></i>
					</div>
					<a href="#" class="small-box-footer">
						Más info <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small card -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>65</h3>

						<p>Únicos Visitantes</p>
					</div>
					<div class="icon">
						<i class="fas fa-chart-pie"></i>
					</div>
					<a href="#" class="small-box-footer">
						Más info <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<h5 class="mb-2 mt-4">Social Widgets</h5>	
				<div class="row">
					<div class="col">
						<!-- Widget: user widget style 2 -->
						<div class="card card-widget widget-user-2">
							<!-- Add the bg color to the header using any of the bg-* classes -->
							<div class="widget-user-header bg-warning">
								<div class="widget-user-image">
									<img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
								</div>
								<!-- /.widget-user-image -->
								<h3 class="widget-user-username">Nadia Carmichael</h3>
								<h5 class="widget-user-desc">Lorem Ipsum</h5>
							</div>
							<div class="card-footer p-0">
								<ul class="nav flex-column">
									<li class="nav-item">
										<a href="#" class="nav-link">
											Lorem Ipsum <span class="float-right badge bg-primary">31</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											Lorem Ipsum <span class="float-right badge bg-info">5</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											Lorem Ipsum <span class="float-right badge bg-success">12</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											Lorem Ipsum <span class="float-right badge bg-danger">842</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /.widget-user -->
					</div>
					<!-- /.col -->
					<div class="col">
						<!-- Widget: user widget style 1 -->
						<div class="card card-widget widget-user">
							<!-- Add the bg color to the header using any of the bg-* classes -->
							<div class="widget-user-header bg-info">
								<h3 class="widget-user-username">Alexander Pierce</h3>
								<h5 class="widget-user-desc">Lorem Ipsum</h5>
							</div>
							<div class="widget-user-image">
								<img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-sm-4 border-right">
										<div class="description-block">
											<h5 class="description-header">3,200</h5>
											<span class="description-text">Lorem Ipsum</span>
										</div>
										<!-- /.description-block -->
									</div>
									<!-- /.col -->
									<div class="col-sm-4 border-right">
										<div class="description-block">
											<h5 class="description-header">13,000</h5>
											<span class="description-text">Lorem Ipsum</span>
										</div>
										<!-- /.description-block -->
									</div>
									<!-- /.col -->
									<div class="col-sm-4">
										<div class="description-block">
											<h5 class="description-header">35</h5>
											<span class="description-text">Lorem Ipsum</span>
										</div>
										<!-- /.description-block -->
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->
							</div>
						</div>
						<!-- /.widget-user -->
					</div>
				</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
		<!-- /.col -->
		<!-- /.col (left) -->
		<div class="col-md-6">
			<h5 class="mb-2 mt-4">Progress Bars</h5>	
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Progress bars</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="progress mb-3">
						<div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0"
						aria-valuemax="100" style="width: 40%">
						<span class="sr-only">40% Complete (success)</span>
					</div>
				</div>
				<div class="progress mb-3">
					<div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0"
					aria-valuemax="100" style="width: 20%">
					<span class="sr-only">20% Complete</span>
				</div>
			</div>
			<div class="progress mb-3">
				<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0"
				aria-valuemax="100" style="width: 60%">
				<span class="sr-only">60% Complete (warning)</span>
			</div>
		</div>
		<div class="progress mb-3">
			<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
			aria-valuemax="100" style="width: 80%">
			<span class="sr-only">80% Complete</span>
		</div>
	</div>
	<!-- /.col (right) -->
</div>
</section>	
@endsection