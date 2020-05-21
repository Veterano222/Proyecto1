<?php
	session_start();
	include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	 <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<?php include "incluides/nav.php"; ?>
	<section id="container">

		<h1> Productos</h1>
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

	</section>
	<?php include "incluides/footer.php"; ?>

</body>
</html>