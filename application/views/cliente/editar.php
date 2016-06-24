<div class="col-md-12" style="margin-top: 75px;">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-building-o"></i> Ingresar Información del cliente</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
			</div>
			<form class="form" action="<?php echo site_url('cliente/editar_cliente').'/'.$this->uri->segment(3).'/'.$this->uri->segment(4); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			<?php if ($this->session->userdata('tipo') == "3"){ ?>
			<?php $permisos_edicion = "disabled"; } else { ?>
			<?php $permisos_edicion = ""; ?>
			<? } ?>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Información General del cliente</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
											<input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $this->session->userdata('id'); ?>" />
												<div class="form-group">
													<label>Nombre</label>
													<input type="text" name="cliente_nombre" class="form-control" value="<?php echo $datos_cliente->cliente_nombre; ?>" disabled />
												</div>
												<div class="form-group">
													<label>Empresa</label>
													<input type="text" name="cliente_empresa" class="form-control" value="<?php echo $datos_cliente->cliente_empresa; ?>" disabled />
												</div>
											</div>
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Correo N°1</label>
															<input type="email" name="cliente_correo_1" class="form-control" value="<?php echo $datos_cliente->cliente_correo_1; ?>" disabled />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Correo N°2</label>
															<input type="email" name="cliente_correo_2" class="form-control" value="<?php echo $datos_cliente->cliente_correo_2; ?>" disabled />
														</div>
													</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Teléfono N°1</label>
															<input name="cliente_telefono_1" onpaste="return false;" onkeypress="return solonumeros(event);" class="form-control" value="<?php echo $datos_cliente->cliente_telefono_1; ?>" <?php echo $permisos_edicion; ?>>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Teléfono N°2</label>
															<input name="cliente_telefono_2" onpaste="return false;" onkeypress="return solonumeros(event);" class="form-control" value="<?php echo $datos_cliente->cliente_telefono_2; ?>" <?php echo $permisos_edicion; ?>>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" align="center">
									<p>Nota: Si desea cambiar unos de los primeros datos contáctese con unos de los Gerentes o con Soporte Técnico.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Información adicional</h3>
							</div>									
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="ia_archivo_adjunto_1">Adjuntar cotización N°1</label>
													<input type="file" id="ia_archivo_adjunto_1" name="ia_archivo_adjunto_1">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="ia_archivo_adjunto_2">Adjuntar cotización N° 2</label>
													<input type="file" id="ia_archivo_adjunto_2" name="ia_archivo_adjunto_2">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="ia_archivo_adjunto_3">Adjuntar cotización N° 3</label>
													<input type="file" id="ia_archivo_adjunto_3" name="ia_archivo_adjunto_3">
												</div>
											</div>
										</div>
									<p class="help-block" align="center">Los sólo se permite adjuntar documentos con extensión GIF, PNG, JPG, DOC, DOCX, TXT, PDF, PPT, PPTX, XLSX, CSV, XLS, ZIP, RAR. No debe superar los 5MB.</p>
									</div>
								</div>
										
										<?php $ia_seo_check = ""; ?>
										<?php $ia_adwords_check = ""; ?>
										<?php $ia_sm_check = ""; ?>
										<?php $ia_mm_check = ""; ?>
										<?php $ia_wc_check = ""; ?>
										<?php $ia_cc_check = ""; ?>
										<?php $ia_cc_wp_check = ""; ?>
										<?php $ia_aplicacion_check = ""; ?>
										<?php $ia_agencia_check = ""; ?>
										<?php $ia_bc_check = ""; ?>
										<?php $ia_audiovisual_check = ""; ?>
										
										<?php if($datos_informacion_adicional->ia_seo == "1" ){$ia_seo_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_adwords == "1" ){$ia_adwords_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_sm == "1" ){$ia_sm_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_mm == "1" ){$ia_mm_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_wc == "1" ){$ia_wc_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_cc == "1" ){$ia_cc_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_cc_wp == "1" ){$ia_cc_wp_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_aplicacion == "1" ){$ia_aplicacion_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_agencia == "1" ){$ia_agencia_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_bc == "1" ){$ia_bc_check = "checked";} ?>
										<?php if($datos_informacion_adicional->ia_audiovisual == "1" ){$ia_audiovisual_check = "checked";} ?>

								<div class="row">
									<div class="col-md-6">
										<label for="servicios">Servicios</label>
										<div class="form-group">
											<div class="col-md-3">
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_seo" >
													<label><input type="checkbox" name="ia_seo" <?php echo $ia_seo_check; ?> value="1"> SEO</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_adwords" >
													<label><input type="checkbox" name="ia_adwords" <?php echo $ia_adwords_check; ?> value="1"> Adwords</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_sm" >
													<label><input type="checkbox" name="ia_sm"  <?php echo $ia_sm_check; ?> value="1"> Social Media</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_mm" >
													<label><input type="checkbox" name="ia_mm" <?php echo $ia_mm_check; ?> value="1"> Mail Marketing</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_wc" >
													<label><input type="checkbox" name="ia_wc" <?php echo $ia_wc_check; ?> value="1"> Web contenido</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_cc" >
													<label><input type="checkbox" name="ia_cc" <?php echo $ia_cc_check; ?> value="1"> Carro de compra</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_cc_wp" >
													<label><input type="checkbox" name="ia_cc_wp" <?php echo $ia_cc_wp_check; ?> value="1"> Carro de compra +Web Pay</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_aplicacion" >
													<label><input type="checkbox" name="ia_aplicacion" <?php echo $ia_aplicacion_check; ?> value="1"> Aplicación</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_agencia" >
													<label><input type="checkbox" name="ia_agencia" <?php echo $ia_agencia_check; ?> value="1"> Agencia</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_bc" >
													<label><input type="checkbox" name="ia_bc" <?php echo $ia_bc_check; ?> value="1"> Branding corporativo</label>
												</div>
												<div class="checkbox">
													<input type="hidden" value="0" name="ia_audiovisual" >
													<label><input type="checkbox" name="ia_audiovisual" <?php echo $ia_audiovisual_check; ?> value="1"> Audiovisual</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Monto</label>
													<input name="ia_monto" onpaste="return false;" onkeypress="return solonumeros(event);" class="form-control" value="<?php echo $datos_informacion_adicional->ia_monto; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<label>Estado</label>
												<div class="form-group">
													<select class="form-control" id="estado_cliente" name="estado_cliente" required>
														<option value="">Seleccione un tipo de estado:</option>
														<?php $estados = $this->cliente_model->obtener_estados(); ?>
														<?php foreach ( $estados->result() as $e): ?>
														<?php $estado_check = ""; ?>
														<?php if($datos_informacion_adicional->estado_cliente_id == $e->estado_cliente_id) $estado_check = "selected"; ?>
														<option value="<?php echo $e->estado_cliente_id; ?>" <?php echo $estado_check; ?>><?php echo $e->estado_cliente_nombre; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="bitacora">Detalles</label> <p class="help-block" id="contador"></p>
													<textarea class="form-control" rows="5" id="ia_detalles" name="ia_detalles" maxlength="1000"><?php echo $datos_informacion_adicional->ia_detalles; ?></textarea>
												</div>
											</div>
										</div>
									</div>								
								</div>
							</div>
						</div>
					</div>									
					<div class="col-md-12">
						<a href="<?php echo base_url() ?>"><button type="button" class="btn btn-default btn-lg pull-left"><i class="fa fa-arrow-left"></i> Volver</button></a>
						<a href="#"><button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-plus"></i> Editar Información</button></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 1000;

    $('#max').html(max_chars);

    $('#ia_detalles').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador').html(diff);   
    });
});

</script>

<script type="text/javascript">
function solonumeros(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
		
</script>