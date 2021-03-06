@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Iniciativas</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Elija una opción:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <center>
                  <a href="{{ route('actions') }}" style="background: #004A7F; margin-top: 10px; margin-bottom: 10px; width: 300px;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chart-line fa-sm text-white-50"></i> Por acciones</a>
                  <a href="{{ route('names') }}" style="background: #004A7F; margin-top: 10px; margin-bottom: 10px; width: 300px;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sort-alpha-up fa-sm text-white-50"></i> Por nombre</a>
                  <a href="{{ route('istates') }}" style="background: #004A7F; margin-top: 10px; margin-bottom: 10px; width: 300px;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sort-amount-up-alt fa-sm text-white-50"></i> Por estados</a>
                  </center>
                </div>
            </div>
            <p class="count">
                <b>{{ $count }}</b> Iniciativas
            </p>
          </div>
@endsection