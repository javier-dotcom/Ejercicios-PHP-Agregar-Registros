<style>
      body{
         text-align:center;
         background-color:black;
        color:white;
      }
    table{
background-color:rgba(53, 4, 22);
      margin :auto;
      padding:4px;
      text-align:center;
    
      
    }
    tr,td{
      background-color:rgba(4, 53, 35);
      border:7px;
      padding:4px;
    }
</style>
<?php
 require_once "dalessandro_javierconectar.php";
 
$legajo=$_POST["lega"];
$codigo=$_POST["codimateria"];
$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];
$nombre=$_POST["nom"];

$carga= "INSERT INTO inscripcion (NroDeLegajo,CodigoDeMateria,DiaDelExamen,MesDelExamen,AnioDelExamen,NombreApellido) 
         VALUES ($legajo,$codigo,$dia,$mes,$anio,'$nombre')";

if (mysqli_query($conexion,$carga)) {
      echo "Se agregó con exito una nueva fila<br><br> <a href='dalessandro_javier222.html'>
      Click para seguir cargando</a>";
echo "<br>";

} else {
    echo"FALLO LA CARGA ";
}
$consulta="SELECT * FROM inscripcion  where NroDeLegajo=$legajo";
$resultado=mysqli_query($conexion,$consulta);

echo "<table border=3px;>";

echo "<br> Ultimo registro <br>";
echo "<tr>";
echo "<td> Legajo  </td><td>  Alumno   </td><td>  Dia del examen   </td><td>  Mes del examen  </td><td>  Año del examen   </td>" ;
echo"</tr> ";
while($fila=mysqli_fetch_array($resultado)){
   echo "<tr><td>".  $fila["NroDeLegajo"]  . "</td><td>" .  $fila["NombreApellido"] ." </td> <td>" .  $fila["DiaDelExamen"] ." </td> <td>" .  $fila["MesDelExamen"] ." </td> <td>" .  $fila["AnioDelExamen"] ." </td> ";
}
echo "</tr></table>";
mysqli_close($conexion);
?>