<?php 

/*vars*/
$type = $_POST["type"];
$country = $_POST["country"];
$code = "";
/*vars*/

@session_name("incorporacion");
@session_start();

if(isset($_SESSION["sponsor"]))
{
	$code = $_SESSION["sponsor"];
}

/*NIKKEN CHALLENGE*/
	if(isset($_SESSION["sponsor_nc"])){
		$code = $_SESSION["sponsor_nc"];
	}
/*NIKKEN CHALLENGE*/

?>

<div class="row">
	<div class="col-sm-12">
		<label id="option-sponsor-one"><input type="radio" value="1" name="type-sponsor" onclick="Opacity_type_sponsor();" checked <?php if(isset($_SESSION["sponsor"])){ ?> disabled="true" <?php }?>>&nbsp;<strong>Me voy a incorporar con un Asesor de Bienestar</strong><br/><small>Conocí NIKKEN a través de un Asesor de Bienestar y me voy a incorporar bajo su código.</small></label>
		<div class="row">
			<div class="col-sm-5">
				<div class="form-group">
					<input type="text" class="form-control input-sponsor" id="code-sponsor" onkeyup="Search_sponsor(this.value);" onkeypress="return JustNumbers(event);" maxlength="12" placeholder="Ingresa aquí el código aquí" value="<?php echo $code ?>" <?php if(isset($_SESSION["sponsor"])){ ?> disabled="true" <?php }?>>
					<input type="hidden" class="form-control required input-validator-sponsor" id="code-sponsor-validate">
				</div>
			</div>
			<div class="col-sm-7">
				<div class="form-group">
					<div id="view-name-sponsor" class="margin-sponsor"></div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="col-sm-12" hidden="true">
		<label id="option-sponsor-two"><input type="radio" value="2" name="type-sponsor" id="option-sponsor-1" onclick="Opacity_type_sponsor();">&nbsp;<strong>Un Asesor de Bienestar me presentó NIKKEN</strong><br/><small>Conocí NIKKEN a través de un Asesor de Bienestar. Sin embargo, <u>no conozco su código</u>.</small></label>
		<br/><br/>
	</div>
	<div class="col-sm-12">
		<label id="option-sponsor-three"><input type="radio" value="3" name="type-sponsor" id="option-sponsor-2" onclick="Opacity_type_sponsor();">&nbsp;<strong>Supe de NIKKEN a través del sitio Web</strong><br/><small>Conocí NIKKEN al visitar su página Web o a través de una búsqueda en Internet y estoy muy interesado (a) en incorporarme.</small></label>
	</div>
</div>


<hr>
<div class="col-md-12 format-radio">
	<p>Queremos conocerte mejor y saber qué es lo que más te interesa en NIKKEN.
Por favor, responde las siguientes preguntas:
<br>
¿Quién está llenando la incorporación?
:</p>
	<div class="form-group radio_input">
		<label><input type="radio" value="1" name="type_question" id="asesor" checked onclick="Encuesta();">&nbsp;Soy influencer (patrocinador) y estoy incorporando &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<label><input type="radio" value="0" name="type_question" id="persona" onclick="Encuesta();"  >&nbsp;Soy la persona interesada en ingresar a la comunidad NIKKEN como influencer </label>
	</div>
</div>
<div class="col-sm-12" id="patrocinador">
	
	<input type="radio" id="segmentacion" name="segmentacion" value="10" checked="true">
	<label for="html">1. Consumo</label><br>
	<input type="radio" id="segmentacion" name="segmentacion" value="20">
	<label for="css">2. Recuperar tu inversión</label><br>
	<input type="radio" id="segmentacion" name="segmentacion" value="30">
	<label for="javascript">3. Emprender.</label>
	<input type="radio" id="segmentacion" name="segmentacion" value="40">
	<label for="javascript">4. Estoy trabajando una estrategia como patrocinador.</label>
	
	<div class="form-group">
		<input type="text" name="other" id="other" onkeypress="return Only_letter(event);" oncopy="return false" onpaste="return false" maxlength="60" class="form-control input-other required" placeholder="<?php echo $last_name_value ?>"  value="<?php echo $last_name_nc ?>">
		<label for="other">5. Otro.</label>
	</div>
	
</div>
<div class="col-md-12" id="nuevoincorporado" hidden="true">
	
	<input type="radio" id="segmentacion" name="segmentacion" value="10" checked="true">
	<label for="html">1. Consumo </label><br>
	<input type="radio" id="segmentacion" name="segmentacion" value="20">
	<label for="css">2. Recuperar tu inversión</label><br>
	<input type="radio" id="segmentacion" name="segmentacion" value="30">
	<label for="javascript">3. Emprender.</label>
	<input type="radio" id="segmentacion" name="segmentacion" value="40">
	
	<div class="form-group">
		<input type="text" name="other" id="other" onkeypress="return Only_letter(event);" oncopy="return false" onpaste="return false" maxlength="60" class="form-control input-other required" placeholder="<?php echo $last_name_value ?>"  value="<?php echo $last_name_nc ?>">
		<label for="other">4. Otro.</label>
	</div>
</div>
<br/>
</div>

<div class="form-group terms format-check">
	<label><input name="terms-document" type="checkbox" class="icheck required" id="terms-document">&nbsp;Acepto los <a href="#" data-toggle="modal" data-target="#terms-txt" onclick="Load_documents_modal(<?php echo $country ?>, <?php echo $type ?>);">términos de este contrato</a></label>
</div>

<?php 

if($country == 1)
{
	?>
	<div class="form-group format-check">
		<label><input name="polity-document" type="checkbox" class="icheck required" id="polity-document">&nbsp;Acepto la <a href="http://vivenikken.s3.amazonaws.com/pdf/others/Colombia/Privacy+policy.pdf" target="_blank">política de privacidad</a></label>
	</div>
	<?php
}
elseif($country == 2)
{
	?>
	<div class="form-group format-check">
		<label><input name="polity-document" type="checkbox" class="icheck required" id="polity-document">&nbsp;Acepto la <a href="http://vivenikken.s3.amazonaws.com/pdf/others/M%C3%A9xico/Privacy+policy.pdf" target="_blank">política de privacidad</a></label>
	</div>
	<?php
}
elseif($country == 3)
{
	?>
	<div class="form-group format-check">
		<label><input name="polity-document" type="checkbox" class="icheck required" id="polity-document">&nbsp;Acepto la <a href="http://vivenikken.s3.amazonaws.com/pdf/others/Peru/Privacy+policy.pdf" target="_blank">política de privacidad</a></label>
	</div>
	<?php
}

?>

<div class="form-group terms format-check">
	<label><input name="declare-document" type="checkbox" class="icheck required" id="declare-document">&nbsp;Declaro que la información proporcionada es verdadera, correcta y completa a mi mejor saber y entender. Comprendo que la información proporcionada en esta solicitud estará sujeta a verificación por parte de NIKKEN y en su momento podrá ser rechazada la solicitud de inscripción de acuerdo a las políticas y/o ordenamientos legales vigentes. Entiendo que no se pueden hacer cambios en las facturas de acuerdo a los datos proporcionados.</a></label>
</div>
<script type="text/javascript">
	
	function Encuesta(){
		var divpatrocinador = document.getElementById('patrocinador');
		var divnuevoincorporado = document.getElementById('nuevoincorporado');
		var typeencuesta = $('input[name=type_question]:checked', '#wrapped').val();
		if (typeencuesta == 1) {
			divnuevoincorporado.setAttribute("hidden", true);
			divpatrocinador.removeAttribute("hidden", true);
				

		}else{
			divpatrocinador.setAttribute("hidden", true);
			divnuevoincorporado.removeAttribute("hidden", true);
				
		}
	}
</script>

<!-- Buscar asesor -->
<script>
	Opacity_type_sponsor();
	<?php if($code != ""){ ?> Search_sponsor(<?php echo $code ?>); <?php } ?>	
</script>
<!-- Buscar asesor -->