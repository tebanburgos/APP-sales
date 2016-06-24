<div class="row" style="margin-top: 75px;">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Ingresar Usuario</h3>
		</div>
		<div class="panel-body">
			<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
			<form action="<?php echo site_url('usuario/ingresar_usuario'); ?>" method="POST" class="form">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
							<label for="usuario_nombre">Nombre</label>
							<input type="text" name="usuario_nombre" class="form-control" placeholder="Ej: Juán" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="usuario_apellido">Apellido</label>
							<input type="text" name="usuario_apellido" class="form-control" placeholder="Ej: Pérez" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
							<label for="usuario_rut">RUT</label>
							<input type="text" name="usuario_rut" class="form-control" placeholder="Ej: 12345678-K" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="usuario_correo">E-Mail</label>
							<input type="email" name="usuario_correo" class="form-control" placeholder="Ej: soporte@imacom.cl" required>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6">
							<label>Permisos del usuario</label>
							<div class="radio">
							<label>
								<input type="radio" name="tipo_usuario_id" value="2" required>Gerente</input>
							</label>
							</div>
							<div class="radio">
							<label>
								<input type="radio" name="tipo_usuario_id" value="3" required>Ejecutivo</input>
							</label>
							</div>												
						</div>					
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<a href="<?php echo base_url() ?>"><button type="button" class="btn btn-default btn-lg pull-left"><i class="fa fa-arrow-left"></i> Volver</button></a>
				<a href="#"><button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-plus"></i> Agregar Usuario</button></a>
			</div>
			</form>
		</div>
		</div>
	</div>
</div>