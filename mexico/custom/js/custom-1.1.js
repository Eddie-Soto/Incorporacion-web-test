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

    function JustNumbers(e)

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



    //SOLO LETRAS Y NUMEROS

    function Only_letter(e) 

    {

        key = e.keyCode || e.which;

        tecla = String.fromCharCode(key).toLowerCase();

        letras = " abcdefghijklmnopqrstuvwxyz123456789&";

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

function Type_billing(type_incorporate,country)

{
    var type = $('input[name=type]:checked', '#wrapped').val();
    //alert(type);
    var isbilling = $('input[name=billing-type]:checked', '#wrapped').val();

    $('#type-billing').html('<option value="">Cargando...</option>');

    $.ajax({

        url: 'custom/page/billing-options.php',

        data: '&type_incorporate=' + type_incorporate + '&type=' + type + '&country=' + country,

        success: function(resp){

         $('#type-billing').html(resp)

         }

    });

}

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

function View_Billing_Options(typeperson,requirebilling)
{
    
      var divMensaje = document.getElementById("billing");

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



    ajax.open("POST", "custom/page/billing-options.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("typeperson=" + typeperson + "&requirebilling=" + requirebilling);

}

//Mostrar los datos de identificaci�n
function View_kit(type,country)
{
      var divMensaje = document.getElementById("kit-incorporate");

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



    ajax.open("POST", "custom/page/kit-incorporate.php", true);

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("type=" + type + "&country=" + country);

}
//Mostrar los datos de identificaci�n


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

    var isbilling = $('input[name=billing-type]:checked', '#wrapped').val(); 
    


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

    ajax.send("country=" + country + "&type=" + type + "&type_incorporate=" + type_incorporate + "&isbilling=" + isbilling);

}

//Mostrar los datos de identificación



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

//COTITULAR ------------------------------------------------------------------------------------------



//Mostrar información bancaria

function View_bank()

{

    if (jQuery("#check-bank").is(":checked")) {

        var country = document.getElementById("country").value;



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

        ajax.send("country=" + country);

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



//Validar email

function Validate_email(email)

{

    // if(email != "")

    // {

    //     var dataString = 'email=' + email;



    //     $.ajax({

    //         type: 'POST',

    //         url: 'custom/querys/validate-email.php',

    //         data: dataString,

    //         success: function (data)

    //         {

    //             if(data != "")

    //             {        

    //                 document.getElementById("validator-email").value = "";

    //                 View_alert("Lo sentimos, " + data, "danger");

    //                 return false;

    //             }

    //             else

    //             {

    //                 document.getElementById("validator-email").value = "1";

    //             }

    //         }

    //     });



    //     return false;

    // }
    if(email != ''){
        var regex =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        
        if(regex.test(email)){
            $.ajax({
                url: "https://cmsnikken.nikkenlatam.com/api/validate_email",
                type: "POST",
                datatype: "application/json",
                data: { email },
                success: function (resp) {
                  if(response.status == 200){
                    switch (resp.validate) {
                        case 0:
                            $('#validator-email').val(1);
                          break;
                        case 1:
                            $('#validator-email').val('');
                            $('#email-incorporate').val('');
                            View_alert("Lo sentimos, " + 'el correo ya se encuentra activo. Por favor utilice otro correo.', "danger");
                          break;
                        case 2:
                            $('#validator-email').val('');
                            $('#email-incorporate').val('');
                            View_alert("Lo sentimos, " + 'el correo ya se encuentra en proceso de pago, favor de revisar con Servico al cliente.', "danger");
                          break;
                        case 3:
                            $('#validator-email').val('');
                            $('#email-incorporate').val('');
                            View_alert("Lo sentimos, " + 'el correo cuenta con pago pendiente, por favor utilice RETOMAR INCORPORACIÓN.', "danger");
                          break;
                        case 4:
                            $('#validator-email').val('');
                            $('#email-incorporate').val('');
                            View_alert("Lo sentimos, " + 'el correo esta registrado de manera incorrecta por favor solicite depuración en Servicio al Cliente.', "danger");
                            break;
                        default:
                            $('#validator-email').val('');
                            $('#email-incorporate').val('');
                            View_alert("Lo sentimos, " + 'hubo un error de conexión por favor escriba de nuevo su correo.', "danger");
                        }
                  }else{
                    $('#validator-email').val('');
                    View_alert("Lo sentimos, " + 'hubo un error de conexión por favor escriba de nuevo su correo.', "danger");
                    $('#email-incorporate').val('');
                  }

                    
                },
            });
        }else{
            $('#validator-email').val('');
            View_alert("Por favor coloque un correo válido.", "danger");
            $('#email-incorporate').val('');
        }
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

        document.location.href = "../peru/";

    }

    else if(value == "10")

    {

        document.location.href = "https://signuptesting.nikkenlatam.com:8282/";

    }

    else if(value != "2")

    {

        document.location.href = "../?country=" + value;

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

        var isbilling = $('input[name=billing-type]:checked', '#wrapped').val(); // Si requiere factura o no

        var rfc = $form.find('.input-rfc').val(); // RFC

        if(rfc == undefined || rfc == 'undefined'){ rfc = ''; }

        var cfdi = $form.find('.input-cfdi').val(); //Datos de residencia

        var type_billing = 0;
        if (isbilling == 1) {
                 type_billing = $form.find('.input-type-billig').val(); // tipo de facturacion Persona o empresa
        }else{
                type_billing = 616;
                rfc = 'XAXX010101000';
                cfdi = 'S01';
        }

        



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

        if(country == 3)

        {

            if (cellular.length != 9)

            {

                View_alert("Lo sentimos, <strong>el teléfono celular debe contener 9 caracteres", "warning");

                return false;

            }

        }



        //Información del titular

        var name_legal_representative = $form.find('.input-name-legal-representative').val(); // Nombre representante legal solo empresa

        if(name_legal_representative == undefined || name_legal_representative == 'undefined'){ name_legal_representative = ''; }

        var type_document = $form.find('.input-type-document').val(); // Tipo de documento

        if(type_document == undefined || type_document == 'undefined'){ type_document = ''; }



        var number_document = $form.find('.input-number-document').val(); // Número de documento



        var rfc = $form.find('.input-rfc').val(); // RFC

        if(rfc == undefined || rfc == 'undefined'){ rfc = ''; }



        //Información de residencia -----------------------------------------------------

            var address = $form.find('.input-address').val() + ', ' + $form.find('.input-address-number').val(); // Dirección

            var residency_one = $form.find('.input-residency-one').val(); //Datos de residencia

            if(residency_one == undefined || residency_one == 'undefined'){ residency_one = ''; }



            var residency_two = $form.find('.input-residency-two').val(); //Datos de residencia

            if(residency_two == undefined || residency_two == 'undefined'){ residency_two = ''; }



            var residency_three = $form.find('.input-residency-three').val(); //Datos de residencia

            if(residency_three == undefined || residency_three == 'undefined'){ residency_three = ''; }



            var residency_four = $form.find('.input-residency-four').val(); //Datos de residencia

            if(residency_four == undefined || residency_four == 'undefined'){ residency_four = ''; }

        //Información de residencia -----------------------------------------------------



        //Información de residencia FACTURA -----------------------------------------------------

        var address_invoice = $form.find('.input-address-invoice').val() + ', ' + $form.find('.input-address-number-invoice').val(); // Dirección

        if($form.find('.input-address-invoice').val() == undefined){ address_invoice = ''; }





        var residency_one_invoice = $form.find('.input-residency-invoice-one').val(); //Datos de residencia

        if(residency_one_invoice == undefined || residency_one_invoice == 'undefined'){ residency_one_invoice = ''; }



        var residency_two_invoice = $form.find('.input-residency-invoice-two').val(); //Datos de residencia

        if(residency_two_invoice == undefined || residency_two_invoice == 'undefined'){ residency_two_invoice = ''; }



        var residency_three_invoice = $form.find('.input-residency-invoice-three').val(); //Datos de residencia

        if(residency_three_invoice == undefined || residency_three_invoice == 'undefined'){ residency_three_invoice = ''; }



        var residency_four_invoice = $form.find('.input-residency-invoice-four').val(); //Datos de residencia

        if(residency_four_invoice == undefined || residency_four_invoice == 'undefined'){ residency_four_invoice = ''; }



        

        //Información de residencia FACTURA -----------------------------------------------------







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


        var type_question = $('input[name=type_question]:checked', '#wrapped').val();
        var segmentacion = $('input[name=segmentacion]:checked', '#wrapped').val();
        var comentsquestions = $form.find('.input-other').val(); // Nombre del asesor o nombre de la empresa

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



        var dataString = 'id=' + id + '&type=' + type + '&gender=' + gender + '&country=' + country + '&type_incorporate=' + type_incorporate + '&last_name=' + encodeURIComponent(last_name) + '&name=' + encodeURIComponent(name) + '&birthday=' + encodeURIComponent(birthday) + '&email=' + encodeURIComponent(email) + '&cellular=' + encodeURIComponent(cellular) + '&address=' + encodeURIComponent(address) + '&residency_one=' + encodeURIComponent(residency_one) + '&residency_two=' + residency_two + '&residency_three=' + encodeURIComponent(residency_three) + '&residency_four=' + encodeURIComponent(residency_four) + '&address_invoice=' + encodeURIComponent(address_invoice) + '&residency_one_invoice=' + encodeURIComponent(residency_one_invoice) + '&residency_two_invoice=' + residency_two_invoice + '&residency_three_invoice=' + encodeURIComponent(residency_three_invoice) + '&residency_four_invoice=' + encodeURIComponent(residency_four_invoice) + '&name_legal_representative=' + encodeURIComponent(name_legal_representative) + '&type_document=' + type_document + '&number_document=' + encodeURIComponent(number_document) + '&name_cotitular=' + encodeURIComponent(name_cotitular) + '&type_document_cotitular=' + type_document_cotitular + '&number_document_cotitular=' + encodeURIComponent(number_document_cotitular) + '&bank=' + bank + '&bank_type=' + bank_type + '&number_account=' + encodeURIComponent(number_account) + '&number_clabe=' + encodeURIComponent(number_clabe) + '&type_sponsor=' + type_sponsor + '&sponsor=' + encodeURIComponent(sponsor) + '&rfc=' + encodeURIComponent(rfc) + '&cfdi=' + encodeURIComponent(cfdi) + '&type-kit=' + encodeURIComponent(type_item) + '&type-msi=' + encodeURIComponent(type_msi) + '&shirt-size=' + encodeURIComponent(playera) + '&tallaLetra=' + encodeURIComponent(tallaLetra) + '&segmentacion=' + encodeURIComponent(segmentacion) + '&type_question=' + encodeURIComponent(type_question) + '&othercoments=' + encodeURIComponent(comentsquestions) + '&type_billing=' + encodeURIComponent(type_billing);



        document.getElementById('btn-process-form').disabled = true;

        document.getElementById('btn-process-form').innerHTML = '<strong><i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only"></span> Guardando<strong>';


    setTimeout(function() {
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
    }, 10000);



        return false;

    });

});

//Guardar información



/*Mostrar estados*/

function Search_state(cp)

{

    //esperando la carga...

   $('#residency-two').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-state.php',

        data: 'cp='+cp,

        success: function(resp){

         $('#residency-two').html(resp)

         }

    });

}

/*Mostrar estados*/



/*Mostrar municipios*/

function Search_municipality(state)

{

    var cp = document.getElementById("residency-one").value;

    //esperando la carga...

   $('#residency-three').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-municipality.php',

        data: 'state='+state+'&cp='+cp,

        success: function(resp){

         $('#residency-three').html(resp)

         }

    });

}

/*Mostrar municipios*/



/*Mostrar colonia*/

function Search_colony(municipality)

{

    var state = document.getElementById("residency-two").value;

    var cp = document.getElementById("residency-one").value;

    //esperando la carga...

   $('#residency-four').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-colony.php',

        data: 'municipality='+municipality+'&state='+state+'&cp='+cp,

        success: function(resp){

         $('#residency-four').html(resp)

         }

    });

}

/*Mostrar colonia*/

//Validacion identificacion 2 pasos
function validar_identificacion() {
  identificacion = $("#number-document-two").val().trim();

 // console.log(datos);

  if (identificacion != "") {
    if (identificacion != "XAXX010101000") {
      $.ajax({
        type: "POST",
        url: "https://services.nikkenlatam.com/api/validate_identity",
        datatype: "application/json",
        data: {identificacion},
        success: function (resp) {
            response = JSON.parse(resp);
          if (response.status == 200 && response.validate == 1) {
            View_alert(
              "<strong>Lo sentimos, el número de identificación ya ha sido utilizado.<br>Te sugerimos contactar a servicio a clientes para validar tu información.",
              "warning"
            );
            $("#number-document-two").val("");
            $("#number-document-two").focus();
          }
          //  $('#type-incorporate').html(resp)
          // console.log(resp);
        },
      });
    }
  }
}


/*Validar RFC*/

function Validate_rfc(value)

{
   
    string = value.replace ("&", "%26");

    if(string != "")

    {

        var dataString = 'rfc=' + string;



        $.ajax({

            type: 'POST',

            url: 'custom/querys/validate-rfc.php',

            data: dataString,

            success: function (data)

            {
                validar_identificacion();
                if(data != "200")

                {        

                    document.getElementById("validator-rfc").value = "";

                    document.getElementById("RFCResult").innerHTML = "RFC Inválido";

                    document.getElementById("btn-continue").disabled = true;

                    View_alert("Lo sentimos, <strong>el RFC es incorrecto</strong>, por favor verifica la información antes de continuar", "danger");

                    return false;

                }

                else

                {
                    
                    document.getElementById("btn-continue").disabled = false;

                    document.getElementById("validator-rfc").value = "1";

                    document.getElementById("RFCResult").innerHTML = "";

                }

            }

        });



        return false;

    }

    else

    {

        document.getElementById("validator-rfc").value = "";

    }

}
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


//Mostrar los datos de factura fiscal

function View_identity_invoice()

{

    var isbilling = $('input[name=billing-type]:checked', '#wrapped').val();
        alert(isbilling);
    if (isbilling == 1) {
        $('#check-invoice').prop('checked', true);
        //$('#check-invoice').removeAttr("hidden");
    }else if(isbilling == 0){
        alert("entro al else de no quiero");
        //$('#check-invoice').attr("hidden",true);
    }

    if (jQuery("#check-invoice").is(":checked")) {

        var last_name = document.getElementById("last-name").value;

        var name = document.getElementById("name").value;

        var document_one = document.getElementById("number-document-one").value;

        var document_two = document.getElementById("number-document-two").value;



        document.getElementById("view-cfdi").style.display = "inline-block";

        document.getElementById("view-invoice-revert").style.display = "inline-block";



        var divMensaje = document.getElementById("identify-incorporate-invoice");

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



        ajax.open("POST", "custom/page/identity-incorporate-invoice.php", true);

        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        ajax.send("last_name=" + last_name + "&name=" + name + "&document_one=" + document_one + "&document_two=" + document_two);

    }

    else 

    {

        $("#identify-incorporate-invoice").html("");

        document.getElementById("view-cfdi").style.display = "none";

        document.getElementById("view-invoice-revert").style.display = "none";

    }

}

//Mostrar los datos de factura fiscal



//Mostrar los datos de factura fiscal

function View_identity_invoice_revert()

{

    if (jQuery("#check-invoice-revert").is(":checked")) {

        $("#identify-incorporate-invoice").html("");

    }

    else 

    {

        View_identity_invoice();

    }

}

//Mostrar los datos de factura fiscal



/*Mostrar estados factura*/

function Search_invoice_state(cp)

{

    //esperando la carga...

   $('#residency-invoice-two').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-state.php',

        data: 'cp='+cp,

        success: function(resp){

         $('#residency-invoice-two').html(resp)

         }

    });

}

/*Mostrar estados factura*/



/*Mostrar municipios factura*/

function Search_invoice_municipality(state)

{

    var cp = document.getElementById("residency-invoice-one").value;

    //esperando la carga...

   $('#residency-invoice-three').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-municipality.php',

        data: 'state='+state+'&cp='+cp,

        success: function(resp){

         $('#residency-invoice-three').html(resp)

         }

    });

}

/*Mostrar municipios factura*/



/*Mostrar colonia factura*/

function Search_invoice_colony(municipality)

{

    var state = document.getElementById("residency-invoice-two").value;

    var cp = document.getElementById("residency-invoice-one").value;

    //esperando la carga...

   $('#residency-invoice-four').html('<option value="">Cargando...</option>');

   //realizo la call via jquery ajax

   $.ajax({

        url: 'custom/page/catalog-colony.php',

        data: 'municipality='+municipality+'&state='+state+'&cp='+cp,

        success: function(resp){

         $('#residency-invoice-four').html(resp)

         }

    });

}

/*Mostrar colonia factura*/