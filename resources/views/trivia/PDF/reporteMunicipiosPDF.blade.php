<!DOCTYPE doctype html>
<html lang="en">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            ORGANISMO PÚBLICO LOCAL ELECTORAL
        </title>
        <link rel="stylesheet" src="css/normalize.css" type="text/css">
            <style type="text/css">
                body { 
      font-size: 16px;
      font-family: Arial, Helvetica, sans-serif;
    }
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    .column {
      float: left;
      width: 50%;
    }
    table{
      width: 100%;
      margin: 0 0 20px 0;
      border-spacing: 0;
      height: 100px;
    }
    table.table2{
      width: 90%;
    }
    .columna1{
    display: table-cell;
    width: 80px;
    border: solid 2px rgb(0, 0, 0);
    }
    .columna2{
    display: table-cell;
    width: 1180px;
    }
    .columna3{
    display: table-cell;
    width: 8px;
    }
    td {
      border: none;
      text-align: center;
      height: 25px;
    }
    td.border {
      border-bottom: solid 1px rgb(0, 0, 0); 
      padding-top: 10px;
      padding-bottom: 10px;     
    }
    .logo {
      width: 120px;
    }
    .text-center {
      text-align: center;
    }
    .text-justify {
      text-align: justify;
    }
    input {
    height: 30px;
      border: solid 2px rgb(0, 0, 0);
    }
    textarea {
      border: solid 2px rgb(0, 0, 0);
    }

    div {
      margin: .4em 0;
    }
    .texto-vertical-3 {
      margin-left: 25px;
      width:10px;
      word-wrap: break-word;
      text-align: center;
      font-size: 2.3em;
    }


    div label {
      width: 20%;
      float: left;
    }
    .column {
      float: left;
      width: 30%;
    }
    .column2 {
      float: left;
      width: 6%;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    .box{
      margin: 0 auto;
      width: 90%;
    }
    .header {
      background-color: #ccc; 
      border: solid 1px #000;
      padding-top: 10px;
      padding-bottom: 10px;
    }
    .headerfooter{
      background-color: #DFDFDF; 
      border: solid 1px #000;
    }

            </style>
        </link>
    </head>
    <body>
        <table>
            <tr>
                <td style="width: 120px;vertical-align: text-top">
                    <img alt="" class="logo" src="{{ public_path('images/logoople.png') }}"/>
                </td>
                <td style="width: calc(100% - 240px);">
                    <h2>
                        Organismo Público Local del Estado de Veracruz
                    </h2>
                    <h3>
                      Proceso Electoral 2021
                    </h3>
                    <h4>
                       Elección de Diputados Locales y Ayuntamientos
                    </h4>
                    <h4>
                        Aplicación móvil para aumentar los conocimientos en materia electoral
                    </h4>
                </td>
                <td style="width: 120px; color:#fff">
                    ...
                </td>
            </tr>
        </table>
        <div align="right">
          <p>
              <b>
                  Fecha de Impresión:
              </b>
              <span>
                  <?php echo date("d/m/Y");?>
              </span>
          </p>
        </div>
        <h3>
          Distrito Electoral: {{ $nombreDistrito }}
        </h3>
        
        <h3>
            <b>
                Estadísticas de usuarios por sexo 
            </b>
        </h3>
        <div style="width: 40%">
            <table>
                <thead>
                    <tr class="header">
                        <th>
                            Sexo
                        </th>
                        <th>
                            Número de usuarios
                        </th>
                        <th>
                            Porcentaje
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border">
                            Mujeres
                        </td>
                        <td class="border">
                            {{ $mujeres }}
                        </td>
                        <td class="border">
                            {{ $porcentajeMujeres }} %
                        </td>
                    </tr>
                    <tr>
                        <td class="border">
                            Hombres
                        </td>
                        <td class="border">
                            {{ $hombres }}
                        </td>
                        <td class="border">
                            {{ $porcentajeHombres }} %
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="headerfooter">
                        <td class="border">
                            <b>
                                TOTALES
                            </b>
                        </td>
                        <td class="border">
                            <b>
                                {{ $mujeres + $hombres }}
                            </b>
                        </td>
                        <td class="border">
                            <b>
                                {{ $porcentajeMujeres + $porcentajeHombres }} %
                            </b>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <br>
        <h3>
            <b>
                Estadística Municipal
            </b>
        </h3>
        
        <table>
          <thead>
            <tr class="header">
              <th>
                Municipio
              </th>
              <th>
                Total de usuarios por municipio
              </th>
              <th>
                Porcentaje Municipal
              </th>
              <th>
                Total de Mujeres por Municipio
              </th>
              <th>
                Porcentaje de Mujeres por Municipio
              </th>
              <th>
                Total de Hombres por Municipio
              </th>
              <th>
                Porcentaje de Hombres por Municipio
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($municipios as $municipio)
              <tr>
                  <td class="border" style="text-align: left !important;">
                      {{ $municipio->nombrempio }} 
                  </td>
                  <td class="border">
                      {{ $municipio->totalUsuarios }}
                  </td>
                  <td class="border">
                      {{ $municipio->porcentajeMunicipal }} %
                  </td>
                  <td class="border">
                      {{ $municipio->mujeres }}
                  </td>
                  <td class="border">
                      {{ $municipio->porcentajeMujeres }} %
                  </td>
                  <td class="border">
                      {{ $municipio->hombres }}
                  </td>
                  <td class="border">
                      {{ $municipio->porcentajeHombres }} %
                  </td>
              </tr>                        
            @endforeach
          </tbody>
          <tfoot>
            <tr class="headerfooter">
              <td style="text-align: left !important;" class="border">
                  <b>TOTALES</b>
              </td>
              <td class="border">
                  <b>{{ $mujeres + $hombres }}</b>
              </td>
              <td class="border">
                  <b>{{ $totalPorcentajeMunicipal }} %</b>
              </td>
              <td class="border">
                  <b>{{ $mujeres }}</b>
              </td>
              <td class="border">
                  <b>{{ $totalPorcentajeMujeres }} %</b>
              </td>
              <td class="border">
                  <b>{{ $hombres }}</b>
              </td>
              <td class="border">
                  <b>{{ $totalPorcentajeHombres }} %</b>
              </td>
            </tr>
          </tfoot>
        </table>         
    </body>
</html>