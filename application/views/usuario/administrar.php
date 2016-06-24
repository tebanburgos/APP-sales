<div class="row" style="margin-top: 75px;">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 pull-right text-right">
				<a href="<?php echo site_url('usuario/ingresar'); ?>"><button class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-plus-square"></i> Ingresar nuevo usuario</button></a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-building-o"></i> Administrador de Usuarios</h3>
			</div>
			<div class="panel-body">
				<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
				<div class="table-responsive">
					<table class="table table-first-column-number table-striped  table-hover">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Email</th>
								<th>Permiso</th>
								<th width="230">Opciones</th>
							</tr>
						</thead>
						<tbody>
						
						<?php $listado_usuarios = $this->usuario_model->mostrar_usuarios(); ?>
						<?php if ( $listado_usuarios): ?>
						<?php foreach ( $listado_usuarios->result() as $lu): ?>
						<?php $codigo_usuario = $lu->usuario_id; ?>
						<tr>
							<td><?php echo $lu->usuario_nombre; ?></td>
							<td><?php echo $lu->usuario_correo; ?></td>
							<td><?php echo $this->usuario_model->consultar_tipo_usuario($lu->tipo_usuario_id); ?></td>
							<td> <a href="<?php echo site_url('usuario/editar/'.$codigo_usuario); ?>"><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</button></a> </td>
						</tr>
							
						<?php endforeach; ?>
						<?php else: ?>
						<tr>
							<td colspan="12"><p class="alert alert-warning" align="center">No hay usuarios</p></td>
						</tr>
						<?php endif; ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>