<?php
include_once('reporte.php');


$objReportes=new Reporte;

$listaReportes=$objReportes->consultar();
?>
<div class="tabla_consulta">
<table class="consulta" border>
<tr>
<th>Folio Reporte</th>
<th>Fecha Realiz</th>
<th>Mes-Año Reportado </th>
<th>No EcoUT</th>
</tr>
<?php
while($row=mysql_fetch_array($listaReportes)){
echo "<tr>";
echo "<td>".$row['Folio_reporte']."</td>";
echo "<td>".$row['Fecha_realizacion']."</td>";
echo "<td>".$row['Mes']." ".$row['Anio']."</td>";
echo "<td>".$row['No_eco_U_T']."</td>";
echo "</tr>";
}
?>
</table>
</div>