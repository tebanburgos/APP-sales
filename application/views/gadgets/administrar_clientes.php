<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php // echo base_url('assets/jquery-ui/jquery.tablesorter.min.js'); ?>"></script>
<script type="text/javascript" src="<?php // echo base_url('assets/jquery-ui/jquery.tablesorter.js'); ?>"></script>
<script type="text/javascript" src="<?php // echo base_url('assets/jquery-ui/jquery-latest.js'); ?>"></script> -->
<!-- <script type="text/javascript" src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script> -->
<script type="text/javascript" src="<?php  echo base_url('assets/jquery.tablesorter.js'); ?>"></script>
<script type="text/javascript" src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>
<!-- <script type="text/javascript" src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> -->
<!-- <script type="text/javascript" src="https://mottie.github.io/tablesorter/css/theme.bootstrap.css"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css"></script> -->
<script type="text/javascript" src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" src="<?php  echo base_url('assets/jquery-ui/tablesorter.js'); ?>"></script>

<div class="row" style="margin-top: 75px;">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
			</div>
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="col-md-1">
				<a href="<?php echo site_url('cliente/ingresar'); ?>"><button class="btn btn-success"><i class="fa fa-plus-square"></i> Ingresar Datos</button></a>
			</div>
			<form class="form" name="menu_cliente" action="<?php echo base_url(); ?>" method="POST">
			<?php if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2"){ ?>
				
				<div class="col-md-4">
					<?php $usuarios = $this->gadget_model->obtener_usuarios(); ?>
					<?php $usuarios_checkeados = ""; ?>
					<?php foreach ( $usuarios->result() as $u){ ?>
					<?php $array = explode(",", $filtro_usuario);?>
					<?php for ($i=0;$i<count($array);$i++) { ?>
					<?php if($array[$i] == $u->usuario_id ){$usuarios_checkeados = "checked"; break 1;} else { $usuarios_checkeados = "";} ?>
					<?php } ?>
					<label class="checkbox-inline"><input type="checkbox" name="usuario[]" <?php echo $usuarios_checkeados; ?> value="<?php echo $u->usuario_id; ?>"><?php echo $u->usuario_nombre; ?></label>
					<?php } ?>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control" id="ordenamiento_monto" name="ordenamiento_monto">
							<option value="">Ordenar por monto:</option>
							<?php $monto_check_mayor = ""; ?>
							<?php $monto_check_menor = ""; ?>
							<?php if($ordenar_monto == "mayor_monto") $monto_check_mayor = "selected"; ?>
							<?php if($ordenar_monto == "menor_monto") $monto_check_menor = "selected"; ?>
							<option value="mayor_monto" <?php echo $monto_check_mayor; ?>>Mayor monto</option>
							<option value="menor_monto" <?php echo $monto_check_menor; ?>>Menor monto</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control" id="ordenamiento_fecha" name="ordenamiento_fecha">
							<option value="">Ordenar por fecha:</option>
							<?php $fecha_check_asc = ""; ?>
							<?php $fecha_check_desc = ""; ?>
							<?php if($ordenar_fecha == "fecha_asc") $fecha_check_asc = "selected"; ?>
							<?php if($ordenar_fecha == "fecha_desc") $fecha_check_desc = "selected"; ?>
							<option value="fecha_asc" <?php echo $fecha_check_asc; ?>>Del más antiguo</option>
							<option value="fecha_desc" <?php echo $fecha_check_desc; ?>>Del más nuevo</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control" id="ordenamiento_estado" name="ordenamiento_estado">
							<option value="">Ordenar por estado:</option>
							<?php $estados = $this->gadget_model->obtener_estados(); ?>
							<?php foreach ( $estados->result() as $e): ?>
							<?php $estado_check = ""; ?>
							<?php if($ordenar_estado == $e->estado_cliente_nombre) $estado_check = "selected"; ?>
							<option value="<?php echo $e->estado_cliente_nombre; ?>" <?php echo $estado_check; ?>><?php echo $e->estado_cliente_nombre; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-md-1" align="center">
					<button type="submit" class="btn btn-info btn-md"><i class="fa fa-filter"></i> Filtrar</button>
				</div>
			</form>
			<? } ?>
		</div>
		</div>
		<div class="panel panel-default" style="margin-top: 10px;">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-building-o"></i> Administrar Clientes</h3>
		</div>
		
		<?php if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2"){ ?>
			<?php if ($filtro_usuario == null){ ?>
				<?php $listado_clientes = $this->gadget_model->mostrar_escritorio_gerencial($ordenar_monto, $ordenar_fecha, $ordenar_estado); ?>
					<?php } else { ?>
						<?php $listado_clientes = $this->gadget_model->mostrar_escritorio_gerencial_filtrado($filtro_usuario, $ordenar_monto, $ordenar_fecha, $ordenar_estado); ?>
					<?php } ?>
		<?php } else { ?>
			<?php $listado_clientes = $this->gadget_model->consultar_escritorio($this->session->userdata('id')); ?>
		<?php } ?>
		<?php if ( $listado_clientes){ ?>
		<?php $numero_opciones_totales = $listado_clientes->num_rows(); ?>
		<?php $numero_paginas =  (int) $numero_opciones_totales/10; ?>
		<?php $ultima_opcion =  (int) $numero_opciones_totales%10; ?>
		
		<!-- pager -->
		<div class="pager">
			<img src="http://mottie.github.com/tablesorter/addons/pager/icons/first.png" class="first" />
			<img src="http://mottie.github.com/tablesorter/addons/pager/icons/prev.png" class="prev" /> <span class="pagedisplay"></span> 
			<!-- this can be any element, including an input -->
			<img src="http://mottie.github.com/tablesorter/addons/pager/icons/next.png" class="next" />
			<img src="http://mottie.github.com/tablesorter/addons/pager/icons/last.png" class="last" />
			<select class="pagesize" title="Select page size">
				<option selected="selected" value="10">10</option>
				<?php if($numero_paginas>0) { ?>
					<?php for($n=2;$n<=$numero_paginas;$n++) { ?>
						<option value="<?php echo $n*10; ?>"><?php echo $n*10; ?></option>
					<?php } ?>
					<?php if($ultima_opcion!=0) { ?>
						<option value="<?php echo $numero_opciones_totales; ?>"><?php echo $numero_opciones_totales; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<select class="gotoPage" title="Select page number"></select>
		</div>
		<?php } ?>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table" id="tablesorter">
					<thead>
						<tr>
						<th>N°</th>
						<?php if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2"){ ?>
						<th>Ejecutivo</th>
						<? } ?>
						<th width="100" style="text-align:center">Fecha Ingreso</th>
						<th>Nombre</th>
						<th>Empresa</th>
				<!--	<th>Correos</th> -->
						<th>Teléfonos</th>
						<th width="50" style="text-align:center">Adjunto</th>
						<th>Servicios</th>
						<th>Estado</th>
						<th width="100" style="text-align:center">Monto</th>
						<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2"){ ?>
							<?php if ($filtro_usuario == null){ ?>
								<?php $listado_clientes = $this->gadget_model->mostrar_escritorio_gerencial($ordenar_monto, $ordenar_fecha, $ordenar_estado); ?>
							<?php } else { ?>
								<?php $listado_clientes = $this->gadget_model->mostrar_escritorio_gerencial_filtrado($filtro_usuario, $ordenar_monto, $ordenar_fecha, $ordenar_estado); ?>
							<?php } ?>
						<?php } else { ?>
						<?php $listado_clientes = $this->gadget_model->consultar_escritorio($this->session->userdata('id')); ?>
						<?php } ?>
						<?php if ( $listado_clientes){ ?>
						<?php foreach ( $listado_clientes->result() as $lc){ ?>
						<?php $codigo_cliente = $lc->cliente_id; ?>
						<?php $color_fila = "" ?>
						<?php if($lc->escritorio_estado == "Rechaza") $color_fila = 'class="danger"';?>
						<tr <?php echo $color_fila;?>>
							<td><?php echo $i; ?></td>
							<?php if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2"){ ?>
							<td><?php echo $this->gadget_model->consultar_nombre_ejecutivo($lc->usuario_id_creador); ?></td>
							<?php } ?>
							<td width="100" align="center"><small><?php echo date('d/m/Y', strtotime($lc->escritorio_fyh_creacion)); ?></small></td>
							<td><a href="<?php echo site_url('cliente/editar/'.$this->session->userdata('id').'/'.$codigo_cliente); ?>"><?php echo $lc->escritorio_nombre; ?></a></td>
							<td><?php echo $lc->escritorio_empresa; ?></td>
					<!--	<td><?php // echo $lc->escritorio_correos; ?></td> -->
							<td><?php echo $lc->escritorio_telefonos; ?></td>
							<td style="text-align: center;"><?php echo $lc->escritorio_archivos_adjuntos; ?></td>
							<td><?php echo $lc->escritorio_servicios; ?></td>
							<td><?php echo $lc->escritorio_estado; ?></td>
							<?php if(is_numeric($lc->escritorio_monto)) { ?>
							<td style="color: #3C763D;"><strong><?php echo number_format($lc->escritorio_monto, 0, '', '.'); ?></strong></td>
							<?php } else { ?>
							<td> Sin monto aún</td>
							<?php } ?>
							<td> <a href="<?php echo site_url('cliente/editar/'.$this->session->userdata('id').'/'.$codigo_cliente); ?>"> <button type="button" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Editar</button></a> </td>
							<td> <a href="<?php echo site_url('cliente/historial/'.$this->session->userdata('id').'/'.$codigo_cliente); ?>"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-clock-o"></i> Historial</button></a> </td>
						</tr>
						<?php $i++; ?>
						<?php } ?>
						<?php }else{ ?>
						<tr>
							<td colspan="12"><p class="alert alert-warning" align="center">No se ha ingresado ningún cliente aún</p></td>
						</tr>
						<?php } ?>
						<?php $registro_total = $i; ?>
					</tbody>
				</table>
				</div> 
			</div>
		</div>
	</div>
</div>