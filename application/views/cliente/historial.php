<div class="col-md-12" style="margin-top: 75px;">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-history"></i> Historial de seguimiento</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
			</div>
			<div class="row">
				<div class="col-md-12">					
					<div class="row">
						<div class="col-md-4 col-md-offset-4" align="center">
							<div class="form-group">
								<label for="ultimas_acciones"><u>Últimas acciones:</u></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" align="center">
							<div class="form-group">
								<p name="datos_cliente"><h3> Cliente: <strong><?php echo $datos_cliente->cliente_nombre; ?> - <?php echo $datos_cliente->cliente_empresa; ?></strong><h3></p>
							</div>
						</div>
					</div>
					<?php $fin_historial = $this->cliente_model->total_historial_cliente($datos_cliente->cliente_id); ?>
					<?php for($i=$fin_historial;$i>=1;$i--): ?>
					
					<?php $fyh_pivote = $this->cliente_model->fecha_y_hora_del_historial($datos_cliente->cliente_id, $i); ?>
					
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title"> Fecha y hora del cambio <strong><?php echo date('d-m-Y H:i:s', strtotime($fyh_pivote)); ?></strong></h4>
						</div>
							
						<?php $listado_historial_cliente = $this->cliente_model->obtener_historial_del_cliente($datos_cliente->cliente_id, $i); ?>
						<?php if ( $listado_historial_cliente): ?>
						<?php foreach ( $listado_historial_cliente->result() as $lh): ?>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<?php $es_servicio = substr($lh->historial_campo, 0, 8); ?>
									<?php if($es_servicio == 'servicio') { ?>
										<?php if($lh->historial_dato == 1) { ?>
									<p><?php echo $lh->historial_campo; ?> - Activado</p>
										<?php }else { ?>
									<p><?php echo $lh->historial_campo; ?> - Desactivado</p>
										<?php } ?>
									<?php } elseif ($lh->historial_campo == 'ID del estado del cliente')  { ?>
										<?php if($lh->historial_dato == 1) { ?>
									<p>Estado actual - Primer contacto</p>
												<?php } elseif($lh->historial_dato == 3) { ?>
									<p>Estado actual - Reunión</p>
													<?php } elseif($lh->historial_dato == 4) { ?>
									<p>Estado actual - Cotización</p>
															<?php } elseif($lh->historial_dato == 6) { ?>
									<p>Estado actual - Cerrado</p>
																	<?php } elseif($lh->historial_dato == 7) { ?>
									<p>Estado actual - Negociación</p>
																		<?php } elseif($lh->historial_dato == 8) { ?>
									<p>Estado actual - Rechaza</p>
									<?php } ?>
									<?php } elseif ($lh->historial_campo == 'Archivo adjunto 1' or $lh->historial_campo == 'Archivo adjunto 2' or $lh->historial_campo == 'Archivo adjunto 3')  { ?>
									<p>Cotización: <a href="<?php echo base_url('./uploads/cotizaciones/'.$lh->historial_dato); ?>" target="_blank">Click para ver archivo adjunto</a></p> 
									<?php } elseif ($lh->historial_campo == 'Monto')  { ?>
									<p><?php echo $lh->historial_campo; ?> - <?php echo number_format($lh->historial_dato, 0, '', '.'); ?></p>
									<?php } else { ?>
									<p><?php echo $lh->historial_campo; ?> - <?php echo $lh->historial_dato; ?></p>
									<?php } ?>
									
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<?php else: ?>
						<p class="alert alert-warning" align="center">El cliente aún no presenta historial</p>
					<?php endif; ?>
					</div>
					<?php endfor; ?>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title"> Ingreso de contacto: <strong><?php echo  date('d-m-Y H:i:s', strtotime($datos_cliente->cliente_fecha_creacion)); ?></strong> </h4>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<p>Nombre: <?php echo $datos_cliente->cliente_nombre; ?></p>
									<p>Empresa: <?php echo $datos_cliente->cliente_empresa; ?></p>
									<p>Correo N°1: <?php echo $datos_cliente->cliente_correo_1; ?></p>
									<?php if($datos_cliente->cliente_correo_2 != null) { ?>
									<p>Correo N°2: <?php echo $datos_cliente->cliente_correo_2; ?></p>
									<?php } ?>
									<p>Teléfono N°1: <?php echo $datos_cliente->cliente_telefono_1; ?></p>
									<?php if($datos_cliente->cliente_telefono_2 != null) { ?>
									<p>Teléfono N°2: <?php echo $datos_cliente->cliente_telefono_2; ?></p>
									<?php } ?>
									<!-- información adicional datos -->
									
									<p>Estado del cliente: <?php echo $primer_estado; ?></p>
									<?php if($datos_ia->ia_archivo_adjunto_1 != null) { ?>
									<p>Archivo adjunto N°1: <a href="<?php echo base_url('./uploads/cotizaciones/'.$datos_ia->ia_archivo_adjunto_1); ?>" target="_blank"><?php echo $datos_ia->ia_archivo_adjunto_1; ?></a></p>
									<?php } ?>
									<?php if($datos_ia->ia_archivo_adjunto_2 != null) { ?>
									<p>Archivo adjunto N°2: <a href="<?php echo base_url('./uploads/cotizaciones/'.$datos_ia->ia_archivo_adjunto_2); ?>" target="_blank"><?php echo $datos_ia->ia_archivo_adjunto_2; ?></a></p>
									<?php } ?>
									<?php if($datos_ia->ia_archivo_adjunto_3 != null) { ?>
									<p>Archivo adjunto N°3: <a href="<?php echo base_url('./uploads/cotizaciones/'.$datos_ia->ia_archivo_adjunto_3); ?>" target="_blank"><?php echo $datos_ia->ia_archivo_adjunto_3; ?></a></p>
									<?php } ?>
									<?php if($datos_ia->ia_monto != null) { ?>
									<p>Monto: <?php echo $datos_ia->ia_monto; ?></p>
									<?php } ?>
									<?php if($datos_ia->ia_seo == 1) { ?>
									<p>SEO: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_adwords == 1) { ?>
									<p>Adwords: seleccionado </p>
									<?php } ?>									
									<?php if($datos_ia->ia_sm == 1) { ?>
									<p>Social Media: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_mm == 1) { ?>
									<p>Mail Marketing: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_wc == 1) { ?>
									<p>Web contenido: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_cc == 1) { ?>
									<p>Carro de compra: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_cc_wp == 1) { ?>
									<p>Carro de compra +Web Pay: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_aplicacion == 1) { ?>
									<p>Aplicación: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_agencia == 1) { ?>
									<p>Agencia: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_bc == 1) { ?>
									<p>Branding corporativo: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_audiovisual == 1) { ?>
									<p>Audiovisual: seleccionado </p>
									<?php } ?>
									<?php if($datos_ia->ia_detalles != null) { ?>
									<p>Detalles: <?php echo $datos_ia->ia_detalles; ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>