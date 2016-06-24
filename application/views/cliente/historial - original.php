<div class="row" style="margin-top: 75px;">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
			</div>
		</div>
		<?php if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2"){ ?>
		<div class="panel panel-default" style="margin-top: 10px;">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-history"></i> Historial de seguimiento</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4 col-md-offset-4" align="center">
						<div class="form-group">
							<label for="ultimas_acciones"><u>Últimas acciones:</u></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<p name="datos_cliente"><?php echo $datos_cliente->cliente_nombre; ?> - <?php echo $datos_cliente->cliente_empresa; ?></p>
						</div>
					</div>
				</div>
				<?php $listado_ia = $this->cliente_model->obtener_ia_del_cliente($datos_cliente->cliente_id); ?>
				<?php if ( $listado_ia): ?>
				<?php foreach ( $listado_ia->result() as $dia): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						<p>(<?php echo $dia->ia_fecha_y_hora; ?>)</p> <label>Estado: <?php echo $dia->estado_cliente_id; ?></label>
						<p>Detalle: <?php echo $dia->ia_detalles; ?> </p>
							
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php else: ?>
					<p class="alert alert-warning" align="center">El cliente aún no presenta historial</p>
				<?php endif; ?>
			</div>
		</div>
			<? } ?>
	</div>
</div>