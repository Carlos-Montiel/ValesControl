<?php
include_once('vale.php');


$objVales=new Vale;

$listaVales=$objVales->consultar();
?>
<div class="tabla_consulta">
<table class="consulta" border>
<tr>
<th>No. Vale</th>
<th>Fecha</th>
<th>Vehiculo</th>
<th>Monto</th>
<th>No. Of. Com</th>
</tr>
<?php
while($row=mysql_fetch_array($listaVales)){
echo "<tr>";
echo "<td>".$row['No_vale']."</td>";
echo "<td>".$row['Dia_f_v']." ".$row['Mes_f_v']." ".$row['Anio_f_v']."</td>";
echo "<td>".$row['No_eco_U_T']."</td>";
echo "<td> $".$row['C_C_Monto']."</td>";
echo "<td>".$row['No_oficio_comision']."</td>";
echo "</tr>";
}
?>
</table>
</div>