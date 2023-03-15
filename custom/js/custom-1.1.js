//FUNCIONALIDADES GENERALES -----------------------------------------------------------

    //AJAX

    function Ajax()

    {

        /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por

        lo que se puede copiar tal como esta aqui */

        var xmlhttp=false;

        try

        {

            // Creacion del objeto AJAX para navegadores no IE

            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");

        }

        catch(e)

        {

            try

            {

                // Creacion del objet AJAX para IE

                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

            }

            catch(E) { xmlhttp=false; }

        }

        if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); }



        return xmlhttp;

    }

    //AJAX



    //SOLO PERMITIR NUMEROS

    function JustNumbers(e,val)

    {

        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla==8)

        {

            return true;

        }



        patron =/[0-9]/;

        tecla_final = String.fromCharCode(tecla);

        return patron.test(tecla_final);

    }

    //SOLO PERMITIR NUMEROS



    //ALERTA

    function View_alert(text, type)

    {

        $.notify({

            message: text



        },{

            type: type,

            timer: 9000

        });

    }

    //ALERTA

function banks_size(value){

        var max_banks = document.getElementById("number_account");

        if(value == 13){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }else if(value == 2){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }else if(value == 306){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',11);
        }        else if(value == 29){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }else if(value == 24){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }
        else if(value == 19){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',10);
        }
        else if(value == 8){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',10);
        }
        else if(value == 37){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }
        else if(value == 304){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }
        else if(value == 3){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',16);
        }
        else if(value == 1){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }
        else if(value == 39){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',8);
        }
        else if(value == 21){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }
        else if(value == 38){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }else if(value == 7){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }else if(value == 40){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',12);
        }else if(value == 4){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',10);
        }else if(value == 17){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }else if(value == 35){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }else if(value == 305){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',9);
        }else if(value == 16){
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',10);
        }else{
            max_banks.removeAttribute('maxlength');
            max_banks.setAttribute('maxlength',45);
        }

    }


    //SOLO LETRAS Y NUMEROS

    function Only_letter(e) 
    {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " abcdefghijklmnopqrstuvwxyz&";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    //SOLO LETRAS Y NUMEROS

//FUNCIONALIDADES GENERALES -----------------------------------------------------------



//Tipo de incorporacion

function Type_person(country)

{

    $('#type-incorporate').html('<option value="">Cargando...</option>');

    $.ajax({

        url: 'custom/page/type-incorporate.php',

        data: 'country=' + country,

        success: function(resp){

         $('#type-incorporate').html(resp)

         }

    });

}

//Tipo de incorporacion



//Tipo de documento

function Type_document(country, type, type_incorporate)

{

    $('#type-document').html('<option value="">Cargando...</option>');

    $.ajax({

        url: 'custom/page/type-document.php',

        data: 'country=' + country + '&type=' + type + '&type_incorporate=' + type_incorporate,

        success: function(resp){

         $('#type-document').html(resp)

         }

    });

}

//Tipo de documento



//Mostrar nombres según tipo de incorporación



function View_names(type)

{

    var divMensaje = document.getElementById("names-incorporate");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/name-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("type=" + type);

}

//Mostrar nombres según tipo de incorporación



//Mostrar los datos de residencia

function View_residency(country)

{

    var divMensaje = document.getElementById("residency-incorporate");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/residency-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("country=" + country);

}

//Mostrar los datos de residencia



//Mostrar los datos de identificación

function View_identity()

{

    var type = $('input[name=type]:checked', '#wrapped').val();

    var type_incorporate = document.getElementById("type-incorporate").value;

    var country = document.getElementById("country").value;



    var divMensaje = document.getElementById("identify-incorporate");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/identity-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("country=" + country + "&type=" + type + "&type_incorporate=" + type_incorporate);

}

//Mostrar los datos de identificación

// $( "#number_document" ).blur(function() {
//     pais = $('#country').val();
//     identificacion = $('#number_document').val();
//     datos = {
//         "identificacion" : identificacion,
//         "pais" : pais
//      };
//     $.ajax({

//         url: 'https://cmsnikken.nikkenlatam.com/api/validar_identificacion',
//         datatype : "application/json",
//         data: datos,

//         success: function(resp){

//         //  $('#type-document-cotitular').html(resp)
//             console.log(resp);
//          }

//     });

//   });
//COTITULAR ------------------------------------------------------------------------------------------

    //Tipo de documento cotitular

    function Type_document_cotitular(country, type, type_incorporate)

    {

        $('#type-document-cotitular').html('<option value="">Cargando...</option>');

        $.ajax({

            url: 'custom/page/type-document-cotitular.php',

            data: 'country=' + country + '&type=' + type + '&type_incorporate=' + type_incorporate,

            success: function(resp){

             $('#type-document-cotitular').html(resp)

             }

        });

    }

    //Tipo de documento cotitular

function Always_ABI(){
   $("#abi").prop("checked", true);
}

    //Mostrar los datos de identificación cotitular

    function View_identity_cotitular()

    {

        if (jQuery("#check-cotitular").is(":checked")) {

            var country = document.getElementById("country").value;



            var divMensaje = document.getElementById("identify-incorporate-cotitular");

            var ajax = Ajax();



            ajax.onreadystatechange=function()

            {

                if (ajax.readyState == 4 && ajax.status==200)

                {

                    var scs=ajax.responseText.extractScript();

                    divMensaje.innerHTML=ajax.responseText;

                    scs.evalScript();

                    divMensaje.innerHTML=ajax.responseText;

                }

                else

                {

                    divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

                }

            }



            ajax.open("POST", "custom/page/identity-incorporate-cotitular.php", true);

            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            ajax.send("country=" + country + "&type=1&type_incorporate=1");

        }

        else 

        {

            $("#identify-incorporate-cotitular").html("");

        }

    }

    //Mostrar los datos de identificación cotitular

        //Mostrar los datos de identificación cotitular

    function View_identity_nrc()

    {

        if (jQuery("#check-nrc").is(":checked")) {

            document.getElementById("ContribuyenteIva").removeAttribute("hidden",false);

        }

        else 

        {

            document.getElementById("ContribuyenteIva").setAttribute("hidden",true);

        }

    }

//COTITULAR ------------------------------------------------------------------------------------------



//Mostrar información bancaria

function View_bank()

{

    if (jQuery("#check-bank").is(":checked")) {


        var country = document.getElementById("country").value;

       // var bank = document.getElementById("choose_banks_dates").value;


        //alert(bank);
        var divMensaje = document.getElementById("bank-incorporate");

        var ajax = Ajax();



        ajax.onreadystatechange=function()

        {

            if (ajax.readyState == 4 && ajax.status==200)

            {

                var scs=ajax.responseText.extractScript();

                divMensaje.innerHTML=ajax.responseText;

                scs.evalScript();

                divMensaje.innerHTML=ajax.responseText;

            }

            else

            {

                divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

            }

        }



        ajax.open("POST", "custom/page/bank-incorporate.php", true);

        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        ajax.send("country=" + country + "checkbank=1");

    }

    else 

    {

        $("#bank-incorporate").html("");

    }

}

//Mostrar información bancaria



//Catálogo de bancos

function Catalog_banks(country)

{

    $('#bank').html('<option value="">Cargando...</option>');

    $.ajax({

        url: 'custom/page/catalog-banks.php',

        data: 'country=' + country,

        success: function(resp){

         $('#bank').html(resp)

         }

    });

}

//Catálogo de bancos



//Catálogo tipo de banco

function Catalog_banks_type(country)

{

    $('#bank-type').html('<option value="">Cargando...</option>');

    $.ajax({

        url: 'custom/page/catalog-banks-type.php',

        data: 'country=' + country,

        success: function(resp){

         $('#bank-type').html(resp)

         }

    });

}

//Catálogo tipo de banco



//Catálogo de ciudades

function Catalog_residency(country)

{

    $('#residency-two').html('<option value="">Cargando...</option>');

    $.ajax({

        url: 'custom/page/catalog-residency.php',

        data: 'country=' + country,

        success: function(resp){

         $('#residency-two').html(resp)

         }

    });

}

//Catálogo de ciudades

/*Mostrar municipios*/

function Search_municipality(state)

{

    

    //esperando la carga...

   $('#residency-three').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-municipality.php',

        data: 'state='+state,

        success: function(resp){

         $('#residency-three').html(resp)

         }

    });

}

//Mostrar cargador de documentos

function View_upload_documentos()

{

    var type = $('input[name=type]:checked', '#wrapped').val();

    var type_incorporate = document.getElementById("type-incorporate").value;

    var country = document.getElementById("country").value;

    var acountbank = 0;

    if (jQuery("#check-bank").is(":checked")) { acountbank = 1; }



    var cotitular = 0;

    if (jQuery("#check-cotitular").is(":checked")) { cotitular = 1; }



    var divMensaje = document.getElementById("view-upload-document");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/upload-documents-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("country=" + country + "&type=" + type + "&type_incorporate=" + type_incorporate + "&cotitular=" + cotitular + "&acountbank=" + acountbank);

}

//Mostrar cargador de documentos

function View_upload_documents()

{

    var type = $('input[name=type]:checked', '#wrapped').val();

    var type_incorporate = document.getElementById("type-incorporate").value;

    var country = document.getElementById("country").value;


    var cotitular = 0;

    if (jQuery("#check-cotitular").is(":checked")) { cotitular = 1; }



    var divMensaje = document.getElementById("view-upload-document");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/upload-documents-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("country=" + country + "&type=" + type + "&type_incorporate=" + type_incorporate + "&cotitular=" + cotitular);

}

//Mostrar cargador de documentos



//Mostrar información del sponsor

function View_sponsor()

{

    var country = document.getElementById("country").value;

    var type = $('input[name=type]:checked', '#wrapped').val();

    

    var divMensaje = document.getElementById("view-sponsor");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/sponsor-information.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("type=" + type + "&country=" + country);

}

//Mostrar información del sponsor



//Buscar sponsor

function Search_sponsor(code)

{

    var email = document.getElementById("email-incorporate").value;

    var divMensaje = document.getElementById("view-name-sponsor");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="20" height="20" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/querys/search-sponsor.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("code=" + code + "&email=" + email);

}

//Buscar sponsor



//Opacar opciones

function Opacity_type_sponsor()

{

    var type = $('input[name=type-sponsor]:checked', '#wrapped').val();



    if(type == 1)

    {

        document.getElementById("option-sponsor-one").style.opacity = "1";

        document.getElementById("option-sponsor-two").style.opacity = "0.6";

        document.getElementById("option-sponsor-three").style.opacity = "0.6";



        document.getElementById("code-sponsor").disabled = false;

        document.getElementById("code-sponsor-validate").value = "";

    }

    else if(type == 2)

    {

        document.getElementById("option-sponsor-one").style.opacity = "0.6";

        document.getElementById("option-sponsor-two").style.opacity = "1";

        document.getElementById("option-sponsor-three").style.opacity = "0.6";



        $("#view-name-sponsor").html("");

        document.getElementById("code-sponsor").value = "";

        document.getElementById("code-sponsor").disabled = true;

        document.getElementById("code-sponsor-validate").value = "0";

    }

    else if(type == 3)

    {

        document.getElementById("option-sponsor-one").style.opacity = "0.6";

        document.getElementById("option-sponsor-two").style.opacity = "0.6";

        document.getElementById("option-sponsor-three").style.opacity = "1";



        $("#view-name-sponsor").html("");

        document.getElementById("code-sponsor").value = "";

        document.getElementById("code-sponsor").disabled = true;

        document.getElementById("code-sponsor-validate").value = "0";

    }

}

//Opacar opciones



//Mostrar información terminos y condiciones/politica de privacidad

function Load_documents_modal(country, type)

{

    var divMensaje = document.getElementById("view-contract");

    var ajax = Ajax();



    ajax.onreadystatechange=function()

    {

        if (ajax.readyState == 4 && ajax.status==200)

        {

            var scs=ajax.responseText.extractScript();

            divMensaje.innerHTML=ajax.responseText;

            scs.evalScript();

            divMensaje.innerHTML=ajax.responseText;

        }

        else

        {

            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';

        }

    }



    ajax.open("POST", "custom/page/contract-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("country=" + country + "&type=" + type);

}

//Mostrar información terminos y condiciones/politica de privacidad



//Retomar incorporación

$(function () {



    "use strict";



    var $form = $('#modal-return-incorporate');

    $form.find('.process-button').on('click', function ()

    {

        var email = $form.find('.input-email').val();

        if(email == '')

        {

            $form.find('.input-email').focus();



            View_alert("Por favor <strong>ingresa el correo electrónico</strong>.", "warning");

            return false;

        }



        var dataString = 'email=' + email;



        document.getElementById('btn-return-incorporate').disabled = true;

        document.getElementById('btn-return-incorporate').innerHTML = '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>';



        $.ajax({

            type: 'POST',

            url: 'custom/querys/return-incorporate.php',

            data: dataString,

            success: function (data)

            {

                var elements = data.split('///');



                //Variables de documentos

                var type = elements[0];

                var message = elements[1];



                if(type == 1)

                {

                    document.location.href = message;

                }

                else

                {

                    document.getElementById('btn-return-incorporate').disabled = false;

                    document.getElementById('btn-return-incorporate').innerHTML = 'Retomar';



                    View_alert("Lo sentimos, " + data, "danger");

                    return false;

                }

            }

        });



        return false;

    });

});

//Retomar incorporación

//Validar identificacion

function Validate_identification(identification)

{

    if(identification != "")

    {

        var dataString = 'identification=' + identification;



        $.ajax({

            type: 'POST',

            url: 'custom/querys/validate-identification.php',

            data: dataString,

            success: function (data)

            {

                if(data != "")

                {        

                    document.getElementById("validator-identification").value = "";

                    View_alert("Lo sentimos, " + data, "danger");

                    return false;

                }

                else

                {

                    document.getElementById("validator-identification").value = "1";

                }

            }

        });



        return false;

    }

}

function validar_identificacion() {
  pais = $("#country").val();
  if (pais != 7) {
    identificacion = $("#number-document-one").val();
  } else {
    identificacion = $("#number-document-two").val();
  }

  datos = { identificacion, pais };
  console.log(datos);

  if (identificacion != "") {
    $.ajax({
      type: "POST",
      url: "https://cmsnikken.nikkenlatam.com/api/validar_identificacion",
      datatype: "application/json",
      data: datos,
      success: function (resp) {
        if (resp == 1) {
          View_alert(
            "<strong>Lo sentimos, el número de identificación ya ha sido utilizado.<br>Te sugerimos contactar a servicio a clientes para validar tu información.",
            "warning"
          );
          if (pais != 7) {
            $("#number-document-one").val("");
            $("#number-document-one").focus();
          } else {
            $("#number-document-two").val("");
            $("#number-document-two").focus();
          }
        }else{
            $('#validator-identification').val('1');
        }
        //  $('#type-incorporate').html(resp)
        //console.log(resp);
      },
    });
  }
}
//Validar identificacion

//Validar email

function Validate_email(email)

{

    if(email != "")

    {

        var dataString = 'email=' + email;



        $.ajax({

            type: 'POST',

            url: 'custom/querys/validate-email.php',

            data: dataString,

            success: function (data)

            {

                if(data != "")

                {        

                    document.getElementById("validator-email").value = "";

                    View_alert("Lo sentimos, " + data, "danger");

                    return false;

                }

                else

                {

                    document.getElementById("validator-email").value = "1";

                }

            }

        });



        return false;

    }

}

//Validar email



//Validar cumpleaños

function Validate_birthday(birthday)

{

    var birthday_arr = birthday.split("/");

    var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);

    var ageDifMs = Date.now() - birthday_date.getTime();

    var ageDate = new Date(ageDifMs);

    return Math.abs(ageDate.getUTCFullYear() - 1970);

}

//Validar cumpleaños



/*Validar pais de acceso*/

function Verify_country(value)

{

    if(value == "3")

    {

        document.location.href = "peru/";

    }



    if(value == "2")

    {

        // document.location.href = "mexico/";
        location.href = 'https://incorporacionregional.nikkenlatam.com/mexico';

    }

    

    if(value == "8")

    {

        document.location.href = "costarica/";

    }

    if(value == "10")

    {

        document.location.href = "https://signuptesting.nikkenlatam.com:8282/";

    }

}



//Guardar información

$(function () {



    "use strict";



    var $form = $('#wrapped');

    $form.find('.process-button').on('click', function ()

    {

        //Información general

	var type_item = $form.find('#type-kit').val(); 

        var type_msi = $form.find('#type-msi').val();

        var playera = $form.find('#shirt-size').val();

        var tallaLetra = $form.find('#tallaLetra').val();

        var id = $form.find('.input-id').val(); //ID de la incorporación

        var type = $('input[name=type]:checked', '#wrapped').val(); // Si es asesor o club

        var country = $form.find('.input-country').val(); // País

        var type_incorporate = $form.find('.input-type-incorporate').val(); // Persona o empresa



        var last_name = $form.find('.input-last-name').val(); // Apellidos

        if(last_name == undefined || last_name == 'undefined'){ last_name = ''; }



        var name = $form.find('.input-name').val(); // Nombre del asesor o nombre de la empresa



        var birthday = $form.find('.input-birthday').val(); // Cumpleaños

        if(Validate_birthday(birthday) < 18 || isNaN(Validate_birthday(birthday)))

        {

            document.getElementById('validator-birthday').value = "";

            View_alert("Lo sentimos, <strong>debes ser mayor de edad</strong> para inscribirte a NIKKEN", "warning");

            return false;

        }



        var email = $form.find('.input-email').val(); // Correo electrónico
        var cellular = $form.find('.input-cellular').val(); // Teléfono celular
        if(country == 5){
        
            cellular = '507' + cellular;
        }
        
        if(country == 3)

        {

            if (cellular.length != 9)

            {

                View_alert("Lo sentimos, <strong>el teléfono celular debe contener 9 caracteres", "warning");

                return false;

            }

        }



        //Información de residencia

        var residency_one = $form.find('.input-residency-one').val(); //Datos de residencia

        if(residency_one == undefined || residency_one == 'undefined'){ residency_one = ''; }



        var residency_two = $form.find('.input-residency-two').val(); //Datos de residencia

        var residency_three = $form.find('.input-residency-three').val(); //Datos de residencia



        var residency_four = $form.find('.input-residency-four').val(); //Datos de residencia

        if(residency_four == undefined || residency_four == 'undefined'){ residency_four = ''; }



        //Información del titular

        var name_legal_representative = $form.find('.input-name-legal-representative').val(); // Nombre representante legal solo empresa

        if(name_legal_representative == undefined || name_legal_representative == 'undefined'){ name_legal_representative = ''; }

        var type_document = $form.find('.input-type-document').val(); // Tipo de documento

        if(type_document == undefined || type_document == 'undefined'){ type_document = ''; }



        var number_document = $form.find('.input-number-document').val(); // Número de documento


            var type_document_two =0;
            var number_document_two =0;
             var number_document_nrc =0;

        type_document_two = $form.find('.input-type-document-two').val(); // Tipo de documento

        number_document_two = $form.find('.input-number-document-two').val(); // Número de documento

        number_document_nrc = $form.find('.input-number-document-nrc').val(); // Número de documento iva slv



        var rfc = $form.find('.input-rfc').val(); // RFC

        if(rfc == undefined || rfc == 'undefined'){ rfc = ''; }



        var address = $form.find('.input-address').val(); // Dirección



        //Información cotitular

        var name_cotitular = $form.find('.input-name-cotitular').val(); // Nombre cotitular

        if(name_cotitular == undefined || name_cotitular == 'undefined'){ name_cotitular = ''; }

        var type_document_cotitular = $form.find('.input-type-document-cotitular').val(); // Tipo documento

        if(type_document_cotitular == undefined || type_document_cotitular == 'undefined'){ type_document_cotitular = ''; }

        var number_document_cotitular = $form.find('.input-number-document-cotitular').val(); // Número de documento

        if(number_document_cotitular == undefined || number_document_cotitular == 'undefined'){ number_document_cotitular = ''; }



        var bank = $form.find('.input-bank').val(); // Nombre del banco

        if(bank == undefined || bank == 'undefined'){ bank = ''; }

        var bank_type = $form.find('.input-bank-type').val(); // Tipo de cuenta

        if(bank_type == undefined || bank_type == 'undefined'){ bank_type = ''; }

        var number_account = $form.find('.input-number-account').val(); // Número de la cuenta

        if(number_account == undefined || number_account == 'undefined'){ number_account = ''; }

        var number_clabe = $form.find('.input-number-clabe-account').val(); // Clave cuenta

        if(number_clabe == undefined || number_clabe == 'undefined'){ number_clabe = ''; }

      


        var type_sponsor = $('input[name=type-sponsor]:checked', '#wrapped').val(); // Tipo de seleccion de patrocinador

        if(type_sponsor == 1)

        {

            if($form.find('.input-validator-sponsor').val() == 0)

            {

                View_alert("Lo sentimos, <strong>debes ingresar el código del Asesor de Bienestar</strong> con el que te vas a incorporar", "warning");

                return false;

            }

        }



        var terms = 0;

        if (jQuery("#terms-document").is(":checked")) { terms = 1; }else{

            View_alert("Lo sentimos, <strong>debes aceptar los términos del contrato</strong>", "warning");

            return false;

        }



        if(country == 1 || country == 2 || country == 3)

        {

            var polity = 0;

            if (jQuery("#polity-document").is(":checked")) { polity = 1; }else{

                View_alert("Lo sentimos, <strong>debes aceptar los política de privacidad</strong>", "warning");

                return false;

            }

        }

        

        var declare = 0;

        if (jQuery("#declare-document").is(":checked")) { declare = 1; }else{

            View_alert("Lo sentimos, <strong>debes aceptar la declaración de información valida</strong>", "warning");

            return false;

        }



        var gender = $form.find('.input-gender').val(); // Genero

        var sponsor = $form.find('.input-sponsor').val(); // Código de patrocinador

        if(sponsor == undefined || sponsor == 'undefined'){ sponsor = ''; }

        var verify_digit = $form.find('.verify_digit').val(); 
        
        var dgi_value = $('#dgi_value').val(); 

        var dataString = 'id=' + id + '&type=' + type + '&gender=' + gender + '&country=' + country + '&type_incorporate=' + type_incorporate + '&last_name=' + encodeURIComponent(last_name) + '&name=' + encodeURIComponent(name) + '&birthday=' + encodeURIComponent(birthday) + '&email=' + encodeURIComponent(email) + '&cellular=' + encodeURIComponent(cellular) + '&residency_one=' + encodeURIComponent(residency_one) + '&residency_two=' + residency_two + '&residency_three=' + encodeURIComponent(residency_three) + '&residency_four=' + encodeURIComponent(residency_four) + '&name_legal_representative=' + encodeURIComponent(name_legal_representative) + '&type_document=' + type_document + '&number_document=' + encodeURIComponent(number_document) + '&address=' + encodeURIComponent(address) + '&name_cotitular=' + encodeURIComponent(name_cotitular) + '&type_document_cotitular=' + type_document_cotitular + '&number_document_cotitular=' + encodeURIComponent(number_document_cotitular) + '&bank=' + bank + '&bank_type=' + bank_type + '&number_account=' + encodeURIComponent(number_account) + '&number_clabe=' + encodeURIComponent(number_clabe) + '&type_sponsor=' + type_sponsor + '&sponsor=' + encodeURIComponent(sponsor) + '&rfc=' + encodeURIComponent(rfc) + '&type-kit=' + encodeURIComponent(type_item) + '&type-msi=' + encodeURIComponent(type_msi) + '&shirt-size=' + encodeURIComponent(playera) + '&tallaLetra=' + encodeURIComponent(tallaLetra) + '&verify_digit=' + encodeURIComponent(verify_digit) + '&type_document_two=' + encodeURIComponent(type_document_two) + '&number_document_two=' + encodeURIComponent(number_document_two) + '&number_document_nrc=' + encodeURIComponent(number_document_nrc) + '&dgi=' + dgi_value;

                    

        document.getElementById('btn-process-form').disabled = true;

        document.getElementById('btn-process-form').innerHTML = '<strong><i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only"></span> Guardando<strong>';


        $.ajax({

            type: 'POST',

            url: 'custom/querys/save-form.php',

            data: dataString,

            success: function (data)

            {


                var elements = data.split('///');



                //Variables de documentos

                var type = elements[0];

                var message = elements[1];



                if(type == 1)

                {

                    document.location.href = message;

                }

                else if(type == 2)

                {

                    document.getElementById('btn-process-form').innerHTML = 'Proceder a pagar';



                    View_alert("Gracias, en las <strong>próximas 24 horas hábiles</strong> un ejecutivo de servicio al cliente se pondrá en contacto contigo para la <strong>asignación de un asesor de bienestar</strong> y así poder continuar con tu proceso de incorporación a NIKKEN.", "success");

                    return false;

                }

                else

                {

                    document.getElementById('btn-process-form').disabled = false;

                    document.getElementById('btn-process-form').innerHTML = 'Proceder a pagar';



                    View_alert("Lo sentimos, " + data, "danger");

                    return false;

                }

            }

        });



        return false;

    });

});

//Guardar información

//Mostrar los datos de identificaci?
function View_kit(type,country){
        
    var divMensaje = document.getElementById("kit-incorporate");
    //var country = document.getElementById('country').value;
    var ajax = Ajax();

    ajax.onreadystatechange=function(){
        if (ajax.readyState == 4 && ajax.status==200){
            var scs=ajax.responseText.extractScript();
            divMensaje.innerHTML=ajax.responseText;
            scs.evalScript();
            divMensaje.innerHTML=ajax.responseText;
        }
        else{
            divMensaje.innerHTML='<img src="custom/img/general/loading.gif" width="40" height="40" class="center-block"/>';
        }
    }
    ajax.open("POST", "custom/page/kit-incorporate.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("type=" + type + "&country=" + country);
}
//Mostrar los datos de identificaci?


$('#country').on('change',function(){
    if($('#country').val() != ''){
        $('#kit-incorporate').show();
    }
    else{
        $('#kit-incorporate').hide();
    }
})

// $('#type-document').on('change',function(){
//     console.log($(this).val());
//     if($(this).val() ==  11){
//         $('#div_gdi').show();
//     }
// })

// $('#type-document').change(function(){
//     console.log($(this).val());
//     if($(this).val() ==  11){
//         $('#div_gdi').show();
//     }
// })


$( document ).ready(function() {
    $('#kit-incorporate').hide();
    
});