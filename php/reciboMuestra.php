<?php
include_once('recibo.php');


$objRecibos=new Recibo;

$listaRecibos=$objRecibos->consultar();
?>
<div class="tabla_consulta">
<table class="consulta" border>
<tr>
<th>Folio</th>
<th>Fecha</th>
<th>Vehiculo</th>
<th>Monto</th>
</tr>
<?php
while($row=mysql_fetch_array($listaRecibos)){
echo "<tr>";
echo "<td>".$row['Folio_recibo']."</td>";
echo "<td>".$row['F_dia']." ".$row['F_mes']." ".$row['F_anio']."</td>";
echo "<td>".$row['No_eco_U_T']."</td>";
echo "<td> $".$row['Monto_numero']."</td>";
echo "</tr>";
}
?>
</table>
</div>