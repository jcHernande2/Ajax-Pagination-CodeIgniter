<div class="box-content row">
	<div class="col-lg-12 col-md-12">
		<div class="row">
			<form id="form-busqueda" class="form_search_to_table"  onsubmit="return false;" data-url="<?php echo base_url();?>index.php/Paginacion/" data-controller="<?php echo $controller;?>" data-view="view_result" data-msg="view_msg">
				<input name="page" id="page" type="hidden" value=1>
				<input name="per_page" id="per_page" type="hidden" value=10>
				<div class="form-group col-md-3">
					<input id="textbuscar" name="extbuscar" class="form-control" >
				</div>
				<div class="form-group col-md-3">
					<select id="selbuscar" name="selbuscar" class="form-control" multiple data-rel="chosen">
					</select>
				</div>
				<div class="form-group col-md-2">
					<button type="submit" class="btn btn-primary  btn-search" ><i class="fa fa-search"></i> Buscar</button>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" id="view_msg">
			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" id="view_result">
			
			</div>
		</div>
	</div>
</div>





