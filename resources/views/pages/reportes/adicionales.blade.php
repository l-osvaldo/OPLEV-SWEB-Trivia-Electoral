<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Adicionales 2019</title>
  <style>
    table {
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 3px;text-align: center;
    }    
    .gris{background: #e3e3e3;}

  </style>
</head>
<body>

  <!--table class="tituloople">
    <tr>
      <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 <br> Actividades Adicionales</td>
    </tr>
  </table-->

  <table class="table" border="1" align="center" cellpadding="5px">
    <tr class="gris">
      <td>UNIDAD RESPONSABLE</td>
      <td>FIRMA DEL RESPONSABLE</td>
      <td>MES</td>
    </tr>
    <tr style="height: 150px;">
      <td>{{ $adicionales['area'] }}</td>
      <td></td>
      <td>{{ $adicionales['mes'] }}</td>
    </tr>

      <tr class="gris">
        <td width="29%">DESCRIPCIÓN</td> 
        <td width="23%">SOPORTE</td> 
        <td width="22%">OBSERVACIONES</td>
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

          <tr class="datos">
            <td class="colinfo" width="29%">{{$adicionales['descadicional']}}</td>
            <td class="colinfo"  width="23%">{{$adicionales['soporteadicional']}}</td>
            <td class="colinfo"width="22%">{{$adicionales['observaadicional']}}</td>
          </tr>        
      </table>

<!--/main-->





</body>
</html>
