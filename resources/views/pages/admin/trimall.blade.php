@extends('layouts.app')

@section('content')


<form method="get" action="{{ route('reportes.rtrimestralall') }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}


<div class="container">
  <div class="row">

     <div style="height: auto;padding: 3em 0; width: 100%;">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Reporte Trimestral</li>
          <li class="breadcrumb-item active" style="color: #EA0D94;">Reporte Global</li>
        </ol>
      </nav>
    
    <div class="col align-self-center" style="background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

     

      <label>Seleccione un Trimestre</label>
          <select class="form-control validar" data-error="1" id="trimestre_trim" name="trimestre_trim">
            @foreach( $trimestres as $trimestre )
              <option value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
             @endforeach
          </select>
      </div>

     
    
    </div>

   </div>

  <button id="pdfAdicionalesGral" type="submit" class="btn btn-primary">Generar PDF Global</button>
</div>




                 
        


</form>



      <!--form method="get" action="{{ route('reportes.rtrimestralall') }}" target="_blank" class="col-md-12 col-12">
        <input type="hidden" id="datatrimestre" name="datatrimestre" value="1">                    
        <button id="pdfAdicionalesGral" type="submit" class="btn btn-primary">Generar PDF General</button>
      </form-->

@endsection