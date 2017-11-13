<a href="canasta_limpiar.php">Limpiar Canasta</a>
	<table class="table table-hover">
	<?php
		foreach($_SESSION["canasta"] as $id_producto => $cantidad){
		$campo = $obj->BuscarID($id_producto);
	?>
		<tr>
			<td><?php echo $campo["descripcion"]; ?></td>
			<td><?php echo $cantidad ?></td>
			<td><?php echo $campo["precio"];?></td>
			<td></td>
			<td><a href="canasta_limpiar_item.php?id=<?php echo $id_producto?>">Limpiar</a></td>
		</tr>
	<?php } ?>
	</table>
<?php if(isset($_SESSION['s_id_cliente'])){ ?>
<form method="post" action="canasta_grabar.php">
<input type="submit" value="Realizar pedido">
</form>
<?php }else{ ?>
<a href="iniciar_sesion.php">Debe Iniciar Sesion</a>
<?php } ?>