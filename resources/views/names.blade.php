@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Iniciativas</h1>
    <form style="margin: 0 auto;" class="form-login" method="POST">
      @csrf
      <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        <label class="col-md-12 control-label" style="text-align: center;">Iniciativa a buscar (Maximo una a seleccionar)</label>
        <div class="input-group mb-3">
            <select style="font-size: 0.9em !important;" type="text" id="order" name="order[1]" class="standardSelect"
            multiple required>
                <option style="font-size: 0.9em !important;" value="Todas">Todas</option>
                @foreach($inis as $ini)
                  <option style="font-size: 0.9em !important;" value="{{ $ini->name }}">{{ $ini->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('order'))
                <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('order') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <div class="footer text-center">
          <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i> Filtrar</button>
      </div>
    </form>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Todos las iniciativas (Ordenadas por nombre)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Postnombre</th>                     
                      <th>Status</th>
                      <th>Acciones   <a href="https://coalicionanticorrupcion.com/index.php/en/mandatos" target="_blank"><i style="color: #004A7F;" class="fa fa-fw fa-external-link-alt"></i></a></th>
                      <th>Observación</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($initiatives as $initiative)
                        <tr>
                            <td>{{ $initiative->name }}</td>
                            <td>{{ $initiative->postname }}</td>
                            <td>{{ $initiative->status }}</td>                          
                            <td>
                              @foreach($actions as $action)
                                @if($action->id_initiative == $initiative->id)
                                  {{ $action->action }}</br>
                                @endif
                              @endforeach
                            </td>
                            <td>{{ $initiative->observation }}</td>
                            <td>{{ $initiative->state }}</td>  
                              <td>
                                  <a href="{{url('detailini',Crypt::encrypt($initiative->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i></a>
                              </td>
                        </tr>
                    @endforeach
                    @if(count($initiatives) == 0)
                        <tr>
                            <td>No hay iniciativas registradas</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                <br>
                <div>{{ $initiatives->links() }}</div>
              </div>
            </div>
          </div>
@endsection