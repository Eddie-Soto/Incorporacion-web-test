<?php

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
$number_document_nc = "";
$rfc_nc = "";
$address_nc = "";
$name_legal_representative_nc = "";

if (isset($_SESSION["number_document_nc"])) {
	$number_document_nc = $_SESSION["number_document_nc"];
}

if (isset($_SESSION["rfc_nc"])) {
	$rfc_nc = $_SESSION["rfc_nc"];
}

if (isset($_SESSION["address_nc"])) {
	$address_nc = $_SESSION["address_nc"];
}

if (isset($_SESSION["name_legal_representative_nc"])) {
	$name_legal_representative_nc = $_SESSION["name_legal_representative_nc"];
}

$type_incorporate_nc = "";

if (isset($_SESSION["type_incorporate_nc"])) {
	$type_incorporate_nc = $_SESSION["type_incorporate_nc"];
}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_POST["country"];
$type = $_POST["type"];
$type_incorporate = $_POST["type_incorporate"];
if ($type_incorporate_nc != "") {
	$type_incorporate = $type_incorporate_nc;
}
/*vars*/

$number_document_value = "Número de documento";
$legal_representative_name_value = "Apellidos y nombres completos del representante legal";
$address_value = "Dirección de residencia";

if ($type_incorporate == 0) {
	if ($country == 1) {
		$number_document_value = "Número de Identificación Tributaria";
	}
	if ($country == 2) {
		$number_document_value = "Registro Federal de Contribuyentes (RFC)";
	}
	if ($country == 3 || $country == 4 || $country == 5) {
		$number_document_value = "Número de Identificación (RUC)";
	}
	if ($country == 6 || $country == 7) {
		$number_document_value = "Número de Identificación (NIT)";
	}
	if ($country == 8) {
		$number_document_value = "Número de Identificación";
	}
}

if ($country == 2) {
	$address_value = "Dirección de residencia (Ingresa solo Calle y Número)";
}

?>

<div class="row">
	<?php
	if ($country != 7) {
		$columns = "6";

		if ($type_incorporate == 0 && $country == 2) /*Solo para empresas méxico*/ {
			$columns = "12";
		} else {
	?>
			<div class="col-md-<?php echo $columns ?>">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-type-document" onchage="disabledbtn()" name="type-document" id="type-document" <?php
																												if ($country == 5) {
																												?> onchange="exist_dv();" <?php
																																		} ?> <?php
																																				if ($country == 1) {
																																				?> onchange="Empresas_validate();" <?php
																																												} ?>></select>
					</div>
				</div>
			</div>

			<!-- Cargar tipos de documento -->
			<script>
				Type_document('<?php echo $country ?>', '<?php echo $type ?>', '<?php echo $type_incorporate ?>');
			</script>
			<!-- Cargar tipos de documento -->
		<?php
		}

		# code...

		?>

		<div class="col-md-<?php echo $columns ?>">
			<div class="form-group">
				<?php if ($country == 5) { ?>
					<!-- -->
					<input type="text" id="number-document-one" name="number-document" <?php if ($country == 1) { ?> minlength="6" maxlength="10" <?php } ?> onblur="validar_identificacion()" maxlength="26" class="form-control required input-number-document" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>">
				<?php } else { ?>
					<input type="text" id="number-document-one" name="number-document" <?php if ($country == 1) { ?> minlength="6" maxlength="10" <?php } ?> onblur="validar_identificacion()" maxlength="13" class="form-control required input-number-document" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>">

				<?php } ?>
				<input type="hidden" class="form-control required" id="validator-identification" value="">

				<?php
				if ($country == 5) {
				?>
					<!-- <div class="col-md-12" id="dv" hidden="">
						<div class="form-group">
							<div class="row">
								<div class="col-12">
									<p style="font-weight:bold ; color:maroon">Incluye los guiones como se muestra en tu identificación</p>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<input type="text" id="verify_digit" onkeypress="return JustNumbers(event,$(this).val());" name="verify_digit" class="form-control verify_digit" placeholder="DV" maxlength="2" minlength="2" required="">
								</div>
							</div>
						</div> -->
					<div class="col-md-12" id="dv" hidden="">
						<div class="row">
							<div class="form-group">
								<p style="font-weight:bold ; color:maroon">Incluye los guiones como se muestra en tu identificación</p>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<input type="text" id="verify_digit" onkeypress="return JustNumbers(event,$(this).val());" name="verify_digit" class="form-control verify_digit" placeholder="DV" maxlength="2" minlength="2" required="">
							</div>
						</div>
					</div>


				<?php
				}
				?>

				<pre id="RFCResultMoral"></pre>
				<input id="number_document_input_value" style="display: none;" value="<?php echo $number_document_value ?>">
			</div>
		</div>
	<?php } else { /*SOLO PARA SLV*/ ?>



		<?php if ($type_incorporate == 1) {
		?>
			<div class="col-md-6">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-type-document" name="type-document" id="type-document">
							<option value="9" selected="true">DUI</option>
						</select>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" id="number-document-one" name="number-document" onclick="DuiSlv();" onblur="validar_identificacion()" maxlength="10" minlength="10" onkeypress="return JustNumbers(event,$(this).val());" class="form-control required input-number-document" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>">
					<input type="hidden" class="form-control required" id="validator-identification" value="">
				</div>
			</div>
		<?php } ?>
		<div class="col-md-6">
			<div class="form-group">
				<div class="styled-select">
					<select class="required input-type-document-two" name="type-document-two" id="type-document-two">
						<option value="23" selected="true">NIT</option>
					</select>

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<!-- <input type="text" id="number-document-two" onclick="NitSlv();" name="number-document-two" minlength="17" maxlength="17" class="form-control required input-number-document-two" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>" required> -->
				<input type="text" id="number-document-two" onclick="validar_identificacion();" name="number-document-two" minlength="17" maxlength="17" class="form-control required input-number-document-two" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>" required>

			</div>
		</div>


		<div class="col-md-12">
			<div class="form-group">
				<input name="check-nrc" id="check-nrc" type="checkbox" class="icheck" value="1" onclick="View_identity_nrc(); ">
				<label>Contribuyente de IVA</label>
			</div>
		</div>



		<div class="col-md-12" hidden="true" id="ContribuyenteIva">
			<div class="form-group">
				<input type="text" id="number-document-nrc" onchange="NrcSlv();" name="number-document-nrc" minlength="3" maxlength="12" class="form-control required input-number-document-nrc" placeholder="N° de Registro (NRC)" value="<?php echo $number_document_nc ?>" required>

			</div>
		</div>




	<?php } ?>

</div>
<input type="hidden" name="dgi_value" id="dgi_value" value="">
<div id="div_gdi" style="margin-bottom:1rem;">
	<!-- <div class="row">
		<div class="col-12">

			<p for="">¿Es usted contribuyente afiliado en la DGI?</p>


		</div>
	</div>
	<div class="row">
		
		<div class="col-12 col-md-3 col-sm-6" style="display:flex;justify-content:space-evenly;align-items:baseline;"><label for="dgi_1">SI</label><input type="radio" name="dgi" id="dgi_1" value="1" onclick="set_dgi(1)" required></div>
		<div class="col-12 col-md-3 col-sm-6" style="display:flex;justify-content:space-evenly;align-items:baseline;"><label for="dgi_2">NO</label><input type="radio" name="dgi" id="dgi_2" value="0" onclick="set_dgi(0)"></div>
	</div> -->
</div>



<script type="text/javascript">
	function View_alert(text, type)

	{

		$.notify({

			message: text



		}, {

			type: type,

			timer: 9000

		});

	}

	function soloNumeros(e) {
		var key = window.Event ? e.which : e.keyCode
		return (key >= 48 && key <= 57)
	}
</script>



<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<input type="text" name="address" class="form-control required input-address" placeholder="<?php echo $address_value ?>" value="<?php echo $address_nc ?>">
		</div>
	</div>
</div>

<?php

if ($type_incorporate == 0) /*Solo para empresas*/ {
?>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<input type="text" name="name-legal-representative" maxlength="120" class="form-control required input-name-legal-representative" placeholder="<?php echo $legal_representative_name_value ?>" value="<?php echo $name_legal_representative_nc ?>">
			</div>
		</div>
	</div>
<?php
}

if ($type_incorporate == 1 && $type == 1) {
?>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<input name="check-cotitular" id="check-cotitular" type="checkbox" class="icheck" value="1" onclick="View_identity_cotitular(); ">
				<label>Deseo incorporarme con un Cotitular</label>
			</div>
		</div>
	</div>

	<div id="identify-incorporate-cotitular"></div>

	<?php
}

if ($type == 1) {
	if ($country != 2) {
	?>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input name="check-bank" id="check-bank" type="checkbox" class="icheck" value="1" onclick="View_bank();View_upload_documentos();">
					<label>Deseo ingresar mi información bancaria <small>(Necesaria para el pago de bonificaciones)</small></label>

				</div>
			</div>
		</div>

		<div id="bank-incorporate"></div>
<?php
	}
}

?>
<script>
	function Empresas_validate() {
		var empresa = document.getElementById("type-incorporate").value;
		var regimen_comun = document.getElementById("type-document").value;

		if (empresa == 0 && regimen_comun == 12) {
			var num_ident = document.getElementById('number-document-one');
			num_ident.setAttribute('minLength', 10);

			$('#number-document-one').mask('000000000-0');

		}
	}

	function DuiSlv() {
		$('#number-document-one').mask('00000000-0');
	}

	function NitSlv() {
		$('#number-document-two').mask('0000-000000-000-0');
	}

	function NrcSlv() {
		let nrc = $('#number-document-nrc').val();
		let search = nrc.includes('-');
		if (search == true) {

		} else {
			//alert("error debe llevar -");
			View_alert("Lo sentimos, N° de Registro (NRC) debe contener <strong>-</strong>", "warning");
		}

	}
</script>

<!-- No permitir espacios en input -->
<script>
	function validaRFC() {
		let pattern = /^[a-zA-Z]{3,4}(\d{6})((\D|\d){2,3})?$/;
		let rfc = document.getElementById("number-document-two").value;

		rfcLength = 13;

		if (pattern.test(rfc) && rfc.length == rfcLength) { // ⬅️ Acá se comprueba
			valido = "Válido";
			//resultado.classList.add("ok");
			validate = true;
		} else {
			valido = "No válido";

			validate = false;
			//resultado.classList.remove("ok");
		}

		document.getElementById("RFCResult").innerText = "\nFormato: " + valido;
		return validate;
	}

	function Disabled_space(e, campo) {
		key = e.keyCode ? e.keyCode : e.which;
		if (key == 32) {
			return false;
		}
	}

	$('#number-document-one').on('input', function(e) {
		if (!/^[a-z0-9]-*$/i.test(this.value)) {
			this.value = this.value.replace(/[^a-z0-9]-+/ig, "");
		}
	});

	$("#number-document-one").on("change", function() {

		validate_document_one()

	});

	$("#number-document-one").keypress(function() {

		validate_document_one()

	});

	$("#btn-continue").on("click", function() {
		validate_document_one()
	});




	$('#type-document').on("change", function(e) {

		if ($('#type-document').val() == 13) {
			$('#number-document-one').val('');
			$('#number-document-one').attr('maxlength', '10');
		}
		if ($('#type-document').val() == 21) {
			$('#number-document-one').val('');
			$('#number-document-one').attr('maxlength', '12');
		}
		if ($('#type-document').val() == 39) {
			$('#number-document-one').val('');
			$('#number-document-one').attr('maxlength', '13');
		}

	});


	$('#number-document-one').on("keypress", function(e) {

		if ($('#type-document').val() == 13) {

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-one").val() == "") {
				return false;
			}

			var myLength = $("#number-document-one").val().length;
			if ($(this).val() == 1) //To check only when entering first character.
			{
				if ($("#number-document-one").val() === '0') {
					//alert('No se permite el 0 como primer carácter');
					$("#number-document-one").val('');
				}
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}

			Disabled_space(event, this);

		}
		if ($('#type-document').val() == 21) {

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-one").val() == "") {
				return false;
			}

			var myLength = $("#number-document-one").val().length;
			if ($(this).val() == 1) //To check only when entering first character.
			{
				if ($("#number-document-one").val() === '0') {
					//alert('No se permite el 0 como primer carácter');
					$("#number-document-one").val('');
				}
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}

			Disabled_space(event, this);

		}
		if ($('#type-document').val() == 40) {

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-one").val() == "") {
				return false;
			}

			var myLength = $("#number-document-one").val().length;
			if ($(this).val() == 1) //To check only when entering first character.
			{
				if ($("#number-document-one").val() === '0') {
					//alert('No se permite el 0 como primer carácter');
					$("#number-document-one").val('');
				}
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}

			Disabled_space(event, this);

		}
		if ($('#type-document').val() == 39) {

			Disabled_space(event, this);

		}

	});

	$('#number-document-two').on('input', function(e) {
		if (!/^[a-z0-9]-*$/i.test(this.value)) {
			this.value = this.value.replace(/[^a-z0-9]-+/ig, "");
		}
	});

	$(document).ready(function() {
		$("#number-document-one").on('paste', function(e) {
			e.preventDefault();
			alert('Esta acción está prohibida');
		})

		$("#number-document-one").on('copy', function(e) {
			e.preventDefault();
			alert('Esta acción está prohibida');
		})

		$("#number-document-cotitular").on('paste', function(e) {
			e.preventDefault();
			alert('Esta acción está prohibida');
		})

		$("#number-document-cotitular").on('copy', function(e) {
			e.preventDefault();
			alert('Esta acción está prohibida');
		})
		$('#div_gdi').hide();
	})
	$('#type-document').change(function() {
		//console.log($(this).val());
		 //var radio_dgi = $('input:radio[name=dgi]');

            // $radios.filter('[value=]').prop('checked', true);
        
		if ($(this).val() == 11) {
			$('#div_gdi').append(`<div class="row">
		<div class="col-12">

			<p for="">¿Es usted contribuyente afiliado en la DGI?</p>


		</div>
	</div>
	<div class="row">
			<input type="hidden" name="dgi_value" id="dgi_value" value="">
		<div class="col-12 col-md-3 col-sm-6" style="display:flex;justify-content:space-evenly;align-items:baseline;"><label for="dgi_1">SI</label><input type="radio" name="dgi" id="dgi_1" value="1" onclick="set_dgi(1)" required></div>
		<div class="col-12 col-md-3 col-sm-6" style="display:flex;justify-content:space-evenly;align-items:baseline;"><label for="dgi_2">NO</label><input type="radio" name="dgi" id="dgi_2" value="0" onclick="set_dgi(0)"></div>
	</div>`);
			$('#div_gdi').show();
			//radio_dgi.prop('required',true);
		}
		if($(this).val()== 28){
			$('#div_gdi').empty();
			$('#div_gdi').hide();
			// $radios.filter("[value=1]").prop('checked', true);
			$('#dgi_value').val(1);
			//radio_dgi.prop('required',false);
			// $radios.change();
			// $radios.setAttribute('required', true);
			console.log($('#dgi_value').val());
		
		}
		if($(this).val()== 29){
			$('#div_gdi').hide();
			$('#div_gdi').empty();
			//radio_dgi.prop('required',false);
			// $radios.filter("[value=0]").prop('checked', true);
			$('#dgi_value').val(0);
			// $radios.change();
			// $radios.removeAttr('required',false);
			//console.log($radios.val());
			console.log($('#dgi_value').val());
		}
	})

	function set_dgi(value){
		$('#dgi_value').val(value);
	}

	function exist_dv() {
		var document_t = document.getElementById("type-document").value;
		var digit_input = document.getElementById("verify_digit");
		var dv = document.getElementById("dv");
		// var gdi = document.getElementById('div_gdi');
		if (document_t == '28' || document_t == '11') {
			dv.removeAttribute('hidden', false);
			digit_input.setAttribute('required', true);
			//gdi.removeAttribute('hidden',false);
			//digit_input.addClass("required");
		} else {
			dv.setAttribute('hidden', true);
			//gdi.setAttribute('hidden',true);
			digit_input.removeAttribute('required', false);
			//digit_input.removeClass("required");
		}
	}
</script>
<!-- No permitir espacios en input -->