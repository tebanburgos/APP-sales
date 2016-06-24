<div class="col-md-12" style="margin-top: 75px;">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-building-o"></i> Ingresar Información del cliente</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
			</div>
			<form class="form" action="<?php echo site_url('cliente/ingresar_cliente').'/'.$this->uri->segment(3); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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
													<input type="text" name="cliente_nombre" class="form-control" maxlength="128" placeholder="Ej: Juán Pérez" required>
												</div>
												<div class="form-group">
													<label>Empresa</label>
													<input type="text" name="cliente_empresa" class="form-control" maxlength="128" placeholder="Ej: Imacom Ltda." required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Correo N°1</label>
															<input type="email" name="cliente_correo_1" class="form-control" maxlength="255" placeholder="Ej: soporte@imacom.cl" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Correo N°2</label>
															<input type="email" name="cliente_correo_2" class="form-control" maxlength="255" placeholder="Ej: soporte@imacom.cl">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Teléfono N°1</label>
															<input name="cliente_telefono_1" onpaste="return false;" onkeypress="return solonumeros(event);" class="form-control" maxlength="32" placeholder="Ej: 228341356" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Teléfono N°2</label>
															<input name="cliente_telefono_2" onpaste="return false;" onkeypress="return solonumeros(event);" class="form-control" maxlength="32" placeholder="Ej: 228341356">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row" align="center">
							<p>Nota: estos 6 primeros campos son universales. Una vez ingresados no se podrán cambiar. Si desea cambiarlos más adelante contáctese con unos de los Gerentes o con Soporte Técnico.</p>
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
							<div class="row">
								<div class="col-md-6">
									<label for="servicios">Servicios</label>
									<div class="form-group">
										<div class="col-md-3">
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_seo" >
												<label><input type="checkbox" name="ia_seo" value="1"> SEO</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_adwords" >
												<label><input type="checkbox" name="ia_adwords" value="1"> Adwords</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_sm" >
												<label><input type="checkbox" name="ia_sm" value="1"> Social Media</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_mm" >
												<label><input type="checkbox" name="ia_mm" value="1"> Mail Marketing</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_wc" >
												<label><input type="checkbox" name="ia_wc" value="1"> Web contenido</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_cc" >
												<label><input type="checkbox" name="ia_cc" value="1"> Carro de compra</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_cc_wp" >
												<label><input type="checkbox" name="ia_cc_wp" value="1"> Carro de compra +Web Pay</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_aplicacion" >
												<label><input type="checkbox" name="ia_aplicacion" value="1"> Aplicación</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_agencia" >
												<label><input type="checkbox" name="ia_agencia" value="1"> Agencia</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_bc" >
												<label><input type="checkbox" name="ia_bc" value="1"> Branding corporativo</label>
											</div>
											<div class="checkbox">
												<input type="hidden" value="0" name="ia_audiovisual" >
												<label><input type="checkbox" name="ia_audiovisual" value="1"> Audiovisual</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Monto</label>
												<input name="ia_monto" onpaste="return false;" onkeypress="return solonumeros(event);" class="form-control" maxlength="25" placeholder="Ej: 395000">
											</div>
										</div>
										<div class="col-md-6">
											<label>Estado</label>
											<div class="form-group">
												<select class="form-control" id="estado_cliente" name="estado_cliente" required>
													<option value="">Seleccione un tipo de estado:</option>
													<?php $estados = $this->cliente_model->obtener_estados(); ?>
													<?php foreach ( $estados->result() as $e): ?>
													<option value="<?php echo $e->estado_cliente_id; ?>"><?php echo $e->estado_cliente_nombre; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="bitacora">Detalles</label> <p class="help-block" id="contador"></p>
												<textarea class="form-control" rows="5" id="ia_detalles" name="ia_detalles" maxlength="1000" placeholder="Escribir aquí..."></textarea>
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
				<a href="#"><button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-plus"></i> Agregar Información</button></a>
			</div>
			</form>
		</div>
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