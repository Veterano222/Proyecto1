<?php
	include "conexion.php";

	$query = mysqli_query($conection, "SELECT * FROM producto WHERE 1");
	$result = mysqli_fetch_array($query);
	if(!$result){
		echo'Hay un error de sql: '.$query;
	}else{
		$data = mysqli_fetch_array($query);
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> INICIO </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php include "incluides/nav.php"; ?>

    <br>
    <br>
    <div class="banner">
    </div>

  <br>
		<table>
			<tr>

			</tr>
			
			<?php

				$query = mysqli_query($conection, "SELECT p.codproducto,p.descripcion,p.precio,p.existencia,pr.proveedor, p.foto
												   FROM producto p 
												   INNER JOIN proveedor pr
												   ON p.proveedor = pr.codproveedor
												   WHERE p.estatus = 1 "); //ASC = acendente  DESC = desendente.
				
				mysqli_close($conection);
				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
						// validar cuando exista una foto y cuando no
						if($data['foto'] != 'img_producto.png'){
							$foto = 'img/uploads/'.$data['foto'];
						}else{
							$foto = 'img/'.$data['foto'];
						}
				?>
				<?php

				?>
				<th class="row <?php echo $data['codproducto']; ?>"> 
					<th class="img_producto"><img src=" <?php echo $foto; ?>"><br>
						<?php echo $data['descripcion']; ?>
		 				<?php echo $data['precio']; ?>
				</th> 
			<?php
				}
			}

			?>
			</table>
</body>
<?php include "incluides/footer.php"; ?>

</html>


