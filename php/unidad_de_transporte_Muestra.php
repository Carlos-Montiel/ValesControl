<?php
include_once("unidad_de_transporte.php");/*se inclye el arvchivo de la clase unidad de T*/


$obUT=new UnidadDeTransporte;/*se crea un objeto de la clase*/

$listaVehiculos=$obUT->consultarUnidadDeTransporte();/*se uarda el resultado en una variable*/

?>

<div class="tabla_consulta">
<table class="consulta" border>
<tr>
<th>No. eco</th>
<th>Marca</th>
<th>Tipo</th>
<th>Modelo</th>
<th>Placas</th>
</tr>

<?php
while($row=mysql_fetch_array($listaVehiculos)){
echo "<tr>";
echo "<td>".$row['No_eco']."</td>";
echo "<td>".$row['Marca']."</td>";
echo "<td>".$row['Tipo']."</td>";
echo "<td>".$row['Modelo']."</td>";
echo "<td>".$row['Placas']."</td>";
echo "</tr>";
}
?>
</table>
</div>