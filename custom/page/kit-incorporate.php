<?php 

@session_name("incorporacion");
@session_start();

if(isset($_SESSION["type_incorporate_nc"])){
		$type_incorporate_nc = $_SESSION["type_incorporate_nc"];
}


if(isset($_SESSION["kit"]))
{
	$kitcupon = $_SESSION["kit"];
}

$type = $_POST["type"];
$country = $_POST['country'];

$kit = "5006 Kit Clasico";
$kit2 = "5023 KIT INFLUENCER  PI WATER";
$kit3 = "5024 KIT INFLUENCER  WATERFALL	";
$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER ";
$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	";
$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER";
$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE";
$kit8 = "5002 KIT MOKUTEKI";

$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD";

$kitcbapart = "5032 Inscripción con Alcancía Electrónica";
if($country == 1 and $type== 1)
{


	$kit = "5006 Kit Clásico $61,000.00";

	/* 
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$755,400.00";

	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$1,513,000.00";*/
	

	$kit2 = "50239 KIT INFLUENCER  PI WATER	$644,600.00";

	$kit3 = "50249 KIT INFLUENCER  WATERFALL	$1,281,240.00";

	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $1,910,600.00";

	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $2,668,200.00";

	//$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $1,216,000.00";

	$kit6 = "502719 KIT INFLUENCER  + PIMAG OPTIMIZER $1,031,756.00";

	

	
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $1,042,600.00";
	
	$kit8 = "5002 KIT MOKUTEKI";

	
	/*
	$kit = "5006 Kit Clásico $61000.00";

	$kit2 = "5023 KIT INFLUENCER  PI WATER	$591,400.00";

	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$1,170,280.00";

	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $1,473,417.00";

	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $2,052,297.00";

	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $943,017.00";

	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $810,600.00";

	$kit8 = "5002 KIT MOKUTEKI";
	*/

/*
	$kit = "5006 Kit Clasico $61,000.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$547,648.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$1,079,008.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $1,387,312.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $1,918,672.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $900,664.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $748,528.00";
	*/
}
if($country == 2 and $type== 1)
{
	$kit = "5006 Kit Clásico $400.00";

	$kit2 = "5023 KIT INFLUENCER  PI WATER	$4,301.00";

	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$8,166.00";

	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER + OPTIMIZER  $11,811.00";

	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $15,676.00";

	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $7,910.00";

	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $7,918.00";

	$kit8 = "5002 KIT MOKUTEKI";
}
if($country == 3 and $type== 1)
{
	$kit = "5006 Kit Clasico S/ 68.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	S/ 719.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	S/ 1,444.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  S/ 2,095.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 S/ 2,820.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER S/ 1,444.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE S/ 1,316.00";
	$kit8 = "5002 KIT MOKUTEKI";
}
if($country == 4 and $type== 1)
{
	//precios nuevos 03/08/2020
	$kit = "5006 Kit Clasico $28.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$264.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$498.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $634.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $869.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $398.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $435.00";
	$kit8 = "5002 KIT MOKUTEKI";

	/*
	$kit = "5006 Kit Clasico $28.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$256.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$483.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $614.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $842.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $386.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $422.00";*/
}
if($country == 5 and $type== 1)
{
	$kit = "5006 Kit Clasico $32.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$209.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$386.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $490.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $666.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $313.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $277.00";
	$kit8 = "5002 KIT MOKUTEKI";

/*
	$kit = "5006 Kit Clasico $32.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$205.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$378.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $480.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $654.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $307.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $272.00";
	*/
}
if($country == 6 and $type== 1) //gTM
{
	$kit = "5006 Kit Clasico Q 196.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	Q 1,461.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	Q 3,109.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  Q 4,082.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 Q 5,730.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER Q 2,817.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE Q 2,844.00";
	$kit8 = "5002 KIT MOKUTEKI";

	/*
	$kit = "5006 Kit Clasico Q 196.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	Q 1,338.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	Q 2,827.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  Q 3,706.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 Q 5,195.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER Q 2,564.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE Q 2,588.00";*/
}
if($country == 7 and $type== 1) //sLV
{
	$kit = "5006 Kit Clasico $28.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$194.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$411.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $539.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $756.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $373.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $347.00";
	$kit8 = "5002 KIT MOKUTEKI";
	/*
	$kit = "5006 Kit Clasico $28.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$181.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$379.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $497.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $695.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER $344.00";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE $347.00";*/
}
if($country == 8 and $type== 1)
{
	$kit = "5006 Kit Clasico ₡ 17100.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	₡ 118,380.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	₡ 216,780.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  ₡ 293,980.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 ₡ 392,380.00";
	$kit6 = "5027 KIT INFLUENCER  + PIMAG OPTIMIZER ₡ 192,700.000";
	$kit7 = "5028 KIT INFLUENCER AQUA POUR DELUXE ₡ 197,980.00";
	$kit8 = "5002 KIT MOKUTEKI";
}

/********************PAISES KIT CLUBS************************/
if($country == 1 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD $0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	$3,800.00";

	

	

}

if($country == 2 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD $0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	$22.00";

}

if($country == 3 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD S/ 0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	S/ 3.60";

}

if($country == 4 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD $0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	$1.00";
}

if($country == 5 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD $0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	$1.00";

}

if($country == 6 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD Q 0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	Q 7.90";
}

if($country == 7 and $type== 0)

{

	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD $0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	$1.00";

}

if($country == 8 and $type== 1)

{
	$kitcb = "5031 INSCRIPCIÓN MIEMBRO DE LA COMUNIDAD ₡ 0.00";

	$kitcbapart = "5032 Inscripción con Alcancía Electrónica	₡ 610.00";
	

}


?>


<?php

if ($country > 0 and $type == 1) {



?>
<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="styled-select">
					<select class="required" name="type-kit" id="type-kit" onchange="getDataShirt()" <?php if(isset($kitcupon)){ ?> disabled="true" <?php } ?> >
						<option value="">Selecciona un Kit de inicio</option>
						<?php if(isset($kitcupon)){ ?>	<option value="5002" <?php if(isset($kitcupon)){ ?> selected="true" <?php } ?> > <?php echo $kit8 ?> </option> <?php } ?>
						<option value="5006"><?php echo $kit ?></option>
						<option value="5023"><?php echo $kit2 ?></option>
						<option value="5024"><?php echo $kit3 ?></option>
						<!--option value="5025"><?php echo $kit4 ?></option> 
						<option value="5026"><?php echo $kit5 ?></option-->  
				<option value="5027"><?php echo $kit6 ?></option> 
						<!--option value="5028"><?php echo $kit7 ?></option-->
						 
					</select>
				</div>
			</div>
        </div>
        <div class="col-md-12">
			<input type="hidden" name="type-msi" id="type-msi" value="">
		</div>
</div>
<?php

	# code...

}elseif ($country > 0 and $type == 0) {
	?>
	<div class="row">

		<div class="col-md-12">

			<div class="form-group">

				<div class="styled-select">

					<select class="required" name="type-kit" id="type-kit"  >

						<option value="">Selecciona un Kit de inicio</option>

						<option value="5031"><?php echo $kitcb ?></option>
						<?php 
							if($country ==11  and $type== 0)

							{
						?>
						<option value="5032"><?php echo $kitcbapart ?></option>
					<?php } ?>
						

					</select>

				</div>

			</div>

		</div>

		

</div>
<?php 
}


else{

	?>
	<div class="row">

		<div class="col-md-12">

			<div class="form-group">

				<div class="styled-select">

					<select class="required" name="type-kit" id="type-kit" onchange="getDataShirt()" <?php if(isset($kitcupon)){ ?> disabled="true" <?php } ?> >

						<option value="">Selecciona un Kit de inicio</option>

						<option value="5006"><?php echo $kit ?></option>

						<option value="5023"><?php echo $kit2 ?></option>

						<option value="5024"><?php echo $kit3 ?></option>

						

						<option value="5027"><?php echo $kit6 ?></option>

						

						<?php if(isset($kitcupon)){ ?>	<option value="5002" <?php if(isset($kitcupon)){ ?> selected="true" <?php } ?> > <?php echo $kit8 ?> </option> <?php } ?>  

					</select>

				</div>

			</div>

		</div>

		<div class="col-md-12">

			<input type="hidden" name="type-msi" id="type-msi">

		</div>

</div>

	<?php
}

/*APARTADO CAMBIO*/
?>











