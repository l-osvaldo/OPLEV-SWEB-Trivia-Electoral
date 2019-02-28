
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>POA 2019</title>
     <style>
            /** Define the margins of your page **/
            @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 200px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            main{
              margin-top:150px; 
            }
            table {border-collapse:collapse;  width:100%; }
            table td.texto {text-align: center;  font-weight: 400; height: 65px; font-size: 14px;}
            table td.programa {text-align: center;  font-weight:900; height: 30px; background: #bfbfbf;  border:1px solid #46453f; font-size: 12px;}
            table td.obj {text-align: center;  font-weight:bolder; height: 30px;  border:1px solid #46453f; width: 1000px; font-size: 10px;}
            table tr.trestitulos{ background: #bfbfbf; border:1px solid #46453f; }
            table tr.trestitulos td{ text-align: center;  font-weight:900; height: 30px; font-size: 10px; border:1px solid #46453f;}
            table tr.trestitulos2 td{ text-align: center; border:1px solid #46453f; font-weight:900; height: 30px; font-size: 10px;}      
            table tr.avances { background: #bfbfbf; border:1px solid #46453f; }
            table tr.avances td{ text-align: center;  font-weight:900; height: 20px; font-size: 10px; border:1px solid #46453f; } 
        </style>
  </head>
  <body>
        <header>
           <table width="100%" style="width: 100%;">
      <tr>
        <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 </td>
      </tr>
      <tr>
        <td class="programa">
          {{$poa['programa']}}<br>{{$poa['programaesp']}}
        </td>
      </tr>
      <tr>
        <td class="obj">
          Objetivo: 
          {{$poa['objetivo']}}
        </td>
      </tr>
    </table>


    <table width="100%">
      <tr class="trestitulos">
        <td>UNIDAD RESPONSABLE</td>
        <td>FIRMA DEL RESPONSABLE DE UNIDAD</td>
        <td>MES</td>
      </tr>
      <tr class="trestitulos2">
        <td width="45%">{{ $poa['nombrearea'] }}</td>
        <td width="35%"></td>
        <td width="20%">{{ $poa['mes'] }}</td>
      </tr>
    </table>


    <table width="100%">
      <tr class="avances">
        <td width="2%">No. <br> Act.</td> 
        <td colspan="2" width="11%">AVANCE MENSUAL <br> PROG.  &nbsp; &nbsp; &nbsp; &nbsp; REAL.</td> 
        <td width="29%">DESCRIPCIÓN</td> 
        <td width="29%">SOPORTE</td> 
        <td width="15%">OBSERVACIONES</td>
      </tr>
    </table>
        </header>

        <footer>
            Copyright &copy; <?php echo date("Y");?> 
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <p style="page-break-after: always; background: green;">
                Content Page 1
            </p>
            <p style="page-break-after: never;">
                Content Page 2
            </p>
        </main>
 


  </body>
</html>
