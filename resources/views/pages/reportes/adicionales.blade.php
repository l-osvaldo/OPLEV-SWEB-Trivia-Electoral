<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Adicionales 2020</title>
  <style>
    table {
      border-collapse: collapse;height: 100vh;
    }

    table, th, td {
      border: 1px solid #000;
    }
    th, td {
      padding: 3px;text-align: center;
    }    
    .gris{background: #ccc;}
    .jusText{text-align: justify;position: relative;}
  </style>
</head>
<body>

  <!--table class="tituloople">
    <tr>
      <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 <br> Actividades Adicionales</td>
    </tr>
  </table-->

  <table class="table" border="0" align="center" cellpadding="5px" width="100%">
    <tr class="gris">
      <td>UNIDAD RESPONSABLE</td>
      <td>FIRMA DEL RESPONSABLE</td>
      <td>MES</td>
    </tr>
    <tr style="height: 50px;">
      <td>{{ $adicional[0]->area }}</td>
      <td></td>
      <td>{{ $adicional[0]->mes }}</td>
    </tr>

      <tr class="gris">
        <td>DESCRIPCIÓN</td> 
        <td>SOPORTE</td> 
        <td>OBSERVACIONES</td>
      </tr>



<!--footer class="page-number">
    <script type="text/php">
      if ( isset($pdf) ) {
        $pdf->page_text(720, 570, "Página: {PAGE_NUM} de {PAGE_COUNT}", null, 6, array(0,0,0));
    }
    </script>
</footer-->

<!-- Wrap the content of your PDF inside a main tag -->
<!--main-->
@foreach ($adicional as $adicionales)
    <tr class="datos">
            <td class="jusText" width="33.33333333%" valign="top">{{$adicionales->descadicional}}</td>
            <td class="jusText"  width="33.33333333%" valign="top">{{$adicionales->soporteadicional}}</td>
            <td class="jusText" width="33.33333333%" valign="top">{{$adicionales->observaadicional}}</td>
          </tr>    
@endforeach
              
      </table>

<!--/main-->





</body>
</html>
