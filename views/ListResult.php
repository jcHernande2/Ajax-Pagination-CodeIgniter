<div class="col-lg-12 col-md-12 "><h5>Resultados #<?php echo count($consulta);?></h5></div>
<div class="col-lg-12 col-md-12">
	<div class="table-wrapper">
		<div class="scrollable">
			<?php if(isset($consulta)&&count($consulta)>0){?>
			<table class="table table-striped table-bordered responsive">
				<thead>
					<tr>
					<?php
					foreach($consulta[0] as $clave=>$Val){ 
						if($clave!="rownum"){
						?>
						<th class="center"><?php echo str_replace("_", " ", utf8_encode($clave)); ?></th>
					<?php
						}
					}?>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($consulta as $item){ 
						echo "<tr>";
						foreach($item as $key=>$val){
							if($key!="rownum"){
								echo "<td>".utf8_encode($val)."</td>";
							}
						}
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			<?php } else{?>
		
			<?php 
			echo  "Sin Registros";
			} ?>
		</div>
	</div>
</div>
<div>
<?php echo $pagination;?>  
</div>