<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>POA 2019</title>


    <style type="text/css">

table td.texto {text-align: center;  font-weight: 400; height: 65px; background: #ffffff url('img/logoople.jpg') no-repeat left top; width: 1000px; font-size: 14px;}
table td.programa {text-align: center;  font-weight:900; height: 30px; background: #bfbfbf;  border:1px solid #46453f; width: 1000px; font-size: 12px;}
table td.obj {text-align: center;  font-weight:bolder; height: 30px;  border:1px dotted #46453f; width: 1000px; font-size: 10px;}


table tr.trestitulos{ background: #bfbfbf; border:1px solid #46453f; }

table tr.trestitulos td{ text-align: center;  font-weight:900; height: 30px; font-size: 10px;}

table tr.trestitulos2 td{ text-align: center; border:1px dotted #46453f; font-weight:900; height: 30px; font-size: 10px;}


table tr.avances { background: #bfbfbf; border:1px solid #46453f; }
table tr.avances td{ text-align: center;  font-weight:900; height: 20px; font-size: 10px; border:1px dotted #46453f; }

table tr.avances2 { background: #bfbfbf; border:1px solid #46453f; }
table tr.avances2 td{ text-align: center; height: 20px; font-size: 9px;}




table tr.avances_tri { background: #bfbfbf;  }
table tr.avances_tri td{ text-align: center; height: 20px; font-size: 9px;}


/*  border:1px solid #46453f;  */




table tr.avances_tri2 { background: #bfbfbf;}
table tr.avances_tri2 td{ text-align: center; font-size: 8px;}





table tr.resulttrime td{ text-align: center; font-size: 10px; border:1px solid #bfbfbf;}

table tr.resulttrime td.jus { text-align:justify; font-size: 10px; padding: 5px  5px; }





table tr.vobo td{text-align: center; font-size: 10px;}



table {border-collapse:collapse; table-layout:fixed;  width:100%; }

table td.result{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top;}

table td.result1{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 1cm;}
table td.result2{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 2cm;}
table td.result3{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 2cm;}

table td.resultj{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; }

table td.resultm{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; text-align: justify;}

table td.resultj2{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; }

table td.resultj3{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; }



.principal { font-size: 9px; width: 100%;  border-top :1px solid #000; border-left :1px solid #000; border-right :1px solid #000; }

.principal #unop    {  width: 100%;    border-bottom :1px solid #000; }
.principal #unopunop    {  width: 100%;    border-bottom :1px solid #000; }

.principal #uno    {  width: 2%;    float:left;  text-align: center;  padding-top: 1px;}


.principal #unouno   {  width: 10%;    float:left;  text-align: center; }    


.principal #dos    {  width: 5%;    float:left;  text-align: center;  padding-top: 1px;}
.principal #tres   {  width: 6%;    float:left;  text-align: center;  padding-top: 1px;}


.principal #cuatro {  width: 31%;   float:left;  text-align: justify; padding: 4px 4px;}
.principal #cuatrocuatro {  width: 29%;   float:left;  text-align: justify; padding: 3px 3px;}

.principal #cinco  {  width: 26%;   float:left;  text-align: justify; padding: 4px 4px;}
.principal #cincocinco  {  width:29%;   float:left;  text-align: justify; padding: 3px 3px;}

.principal #seis   {  width: 25%;   float:left;  text-align: justify; padding: 4px 4px;}
.principal #seisseis   {  width: 29%;   float:left;  text-align: justify; padding: 3px 3px;}


      
    </style>




  </head>
  <body>


    <table>
      <tr>
        <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 </td>
      </tr>
    </table>

    <table>
      <tr><td class="programa">{{ $programa->claveprograma }} - {{ $programa->descprograma }}</td></tr>
      <tr><td class="obj">Objetivo del programa</td></tr>
    </table>


    <table width="100%">
      <tr class="trestitulos">
        <td>UNIDAD RESPONSABLE</td>
        <td>FIRMA RESPONSABLE DE UNIDAD</td>
        <td>MES</td>
      </tr>
      <tr class="trestitulos2">
        <td width="45%"><img src="img/usuario.png" hspace="15px">{{ $idArea }}</td>
        <td width="35%"></td>
        <td width="20%">{{ $mes }}</td>
      </tr>
    </table>


    <table  width="100%">

    <tr class="avances">
    <td width="2%">No. <br> Act.</td> 
    <td colspan="2" width="11%">AVANCE MENSUAL <br> PROG.  &nbsp; &nbsp; &nbsp; &nbsp; REAL.</td> 
    <td width="29%">DESCRIPCION</td> 
    <td width="29%">SOPORTE</td> 
    <td width="29%">OBSERVACIONES</td>
    </tr>
    </table>










  </body>
</html>