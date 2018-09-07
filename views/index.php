<!DOCTYPE html>
<html lang="en">
<style>

</style>
<body>
	<div id="content" class="col-lg-10 col-sm-10">
		<?php 
		##formulario para la busqueda y el listado paginado
		echo $FormularioBusqueda; 
		?>
	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>js/search_to_list.js"></script>
