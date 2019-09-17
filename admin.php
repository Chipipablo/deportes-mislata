<?php
// Start the session
//session_start();
//setcookie("hola","hola2");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Administración reservas deportes Mislata</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="/styles/style.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.2.6.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
            //var table = document.getElementById('table'),
            //  selected = table.getElementsByClassName('selected');
            //table.onclick = highlight;
            var elementosSeleccionados = [];
            function selectRow(id) {
                var elem=document.getElementById(id).parentNode.parentNode;
                if (elem.id=="col"){
                    if (elem.className == "selected") {
                        elem.className = "";
                        var remove = elementosSeleccionados.indexOf(id);
                        elementosSeleccionados.splice(remove,1);
                    }else {
                        elem.className = "selected";
                        elementosSeleccionados.push(id);
                    }
                }

            }

            var arrayDia=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
            var boton_verde="btn btn-success";
            var boton_azul="btn btn-info";
            var boton_naranja="btn btn-warning";
            var boton_rojo="btn btn-danger disabled";
            var boton_hora_anterior=null;
            var boton_hora_anterior_color=null;
            var boton_diasemana_anterior=null;
            function onLoadBody() {
                //document.getElementById("inputFecha").value = (new Date());
                //updateDeporte();
                //cargarDias(); 
                //alert("holi despues");
                cerrarTextoReserva();
                //alert("a");
            }
            function cerrarTextoReserva(){
                $(document).ready(function(){
                    setTimeout(function(){ $(".reserva").fadeOut(800);}, 3000); 
                });
            }
            function onSubmit() {
                var alertar="";
                if (document.getElementById("inputFecha").value==""){
                    alert("Debes seleccionar el día de la reserva.\n"); 
                    return false;
                }
                if (document.getElementById("inputHora").value==""){
                    alert("Debes seleccionar la hora de la reserva.\n"); 
                    return false;
                }
                if (document.getElementById("inputDNI").value==""){
                    alertar+="El campo del DNI no puede estar vacio.\n"; 
                }
                if (document.getElementById("radioBono1").checked){
                    if (document.getElementById("inputNombre").value==""){
                        alertar+="El campo del Nombre no puede estar vacio.\n"; 
                    }
                    if (document.getElementById("inputApellido").value==""){
                        alertar+="El campo del Apellido no puede estar vacio.\n"; 
                    }
                    /*if (document.getElementById("inputTelefono").value==""){
                        alertar+="El campo del teléfono no puede estar vacio.\n"; 
                    }*/
                    if (document.getElementById("radioPago").value==""){
                        alertar+="No se ha seleccionado la forma de pago.\n"; 
                    }
                }else if (document.getElementById("radioBono2").checked){
                    if (document.getElementById("inputBono").value==""){
                        alertar+="El campo del Bono no puede estar vacio.\n"; 
                    }
                }
                if (alertar==""){
                    /*document.getElementById(boton_hora_anterior).innerHTML="Reservado";
                    boton_hora_anterior=null;
                    document.getElementById("mensajeReserva").innerHTML="Reservado";*/
                    return true;
                }else{
                    alert(alertar);
                    return false;
                }

                //alert("Pista reservada!");

            }

            function onSubmitCancelar() {
                var confirmar = confirm("¿Estás seguro de cancelar la reserva?");
                if (confirmar){
                    document.getElementById("Fecha").value=document.getElementById("inputFecha").value;
                    document.getElementById("Hora").value=document.getElementById("inputHora").value;
                    document.getElementById("Pista").value=document.getElementById("inputPista").value;
                    //alert(document.getElementById("inputFecha").value+"/"+document.getElementById("inputHora").value);
                }
                return confirmar;
            }

            function onSubmitNuevoBono() {
                var alertar="";
                if (document.getElementById("inputNombre").value==""){
                    alertar+="El campo del Nombre no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputApellido").value==""){
                    alertar+="El campo del Apellido no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputDNI").value==""){
                    alertar+="El campo del DNI no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputTipoBono").value==""){
                    alertar+="El campo del Tipo de bono no puede estar vacio.\n";
                    return false;
                }else {
                    return confirm("¿Estás seguro de añadir este bono?");
                }
                alert(alertar);
                return false;
            }

            function onSubmitNuevoDeporte() {
                //alert("hola");
                if (document.getElementById("inputDeporte").value==""){
                    alert("El campo del Deporte genérico no puede estar vacio.\n");
                    return false;
                }else {
                    return confirm("¿Estás seguro de añadir este deporte genérico?");
                }
            }

            function onSubmitNuevoSubdeporte() {
                var alertar="";
                if (document.getElementById("inputDeporte").value==""){
                    alertar+="El campo del Deporte genérico no puede estar vacio.\n";
                }else if (document.getElementById("inputSubdeporte").value==""){
                    alertar+="El campo del Deporte no puede estar vacio.\n";
                }else {
                    return confirm("¿Estás seguro de añadir este deporte?");
                }
                alert(alertar);
                return false;
            }

            function onSubmitNuevaPista() {
                var alertar="";
                if (document.getElementById("inputSubdeporte").value==""){
                    alertar+="El campo del Deporte no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputPista").value==""){
                    alertar+="El campo del Nombre de pista no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputHoraApertura").value==""){
                    alertar+="El campo de la hora de cierre de pista no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputHoraCierre").value==""){
                    alertar+="El campo de la hora de cierre de pista no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputDuracionReserva").value==""){
                    alertar+="El campo de la duración de la reserva no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputPrecioReserva").value==""){
                    alertar+="El campo del Precio de la reserva no puede estar vacio.\n";
                    return false;
                }else if (document.getElementById("inputPrecioIluminacion").value==""){
                    alertar+="El campo del Precio de la iluminación no puede estar vacio.\n";
                    return false;
                }else {
                    return confirm("¿Estás seguro de añadir esta pista?");
                }
                alert(alertar);
                return false;
            }

            var enviarSubmit=false;

            function enviarSubmit() {
                return false;
            }

            function onSubmitModificar() {
                if (elementosSeleccionados.length < 1) {
                    alert("Se debe seleccionar un elemento a modificar");
                    enviarSubmit=false;
                }else if (elementosSeleccionados.length > 1){
                    alert("Se debe seleccionar SÓLO un elemento a modificar");
                    enviarSubmit=false;
                }else {
                    var modificar="";
                    document.getElementById("Opcion").value="modificar";
                    var id_elem = elementosSeleccionados[0].substring("check".length,elementosSeleccionados[0].length);
                    id_elem = "valor"+id_elem;
                    modificar = document.getElementById(id_elem).textContent;
                    document.getElementById("Seleccion").value=modificar;
                    enviarSubmit=true;
                }
            }

            function onSubmitEliminar() {
                if (elementosSeleccionados.length < 1) {
                    alert("Se debe seleccionar al menos un elemento a eliminar");
                    enviarSubmit=false;
                }else {
                    document.getElementById("Opcion").value="eliminar";
                    var eliminar="";
                    for (var i=0;i<elementosSeleccionados.length;i++){
                        var id_elem = elementosSeleccionados[i].substring("check".length,elementosSeleccionados[i].length);
                        id_elem = "valor"+id_elem;
                        eliminar+= document.getElementById(id_elem).textContent;
                        if (i<elementosSeleccionados.length-1) eliminar+="-"; //Separamos los elementos por guiones
                    }
                    document.getElementById("Seleccion").value=eliminar;
                    enviarSubmit=true;
                }
            }

            function post(path, params, method) {
                method = method || "post"; // Set method to post by default if not specified.

                // The rest of this code assumes you are not using a library.
                // It can be made less wordy if you use one.
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                for(var key in params) {
                    if(params.hasOwnProperty(key)) {
                        var hiddenField = document.createElement("input");
                        hiddenField.setAttribute("type", "hidden");
                        hiddenField.setAttribute("name", key);
                        hiddenField.setAttribute("value", params[key]);

                        form.appendChild(hiddenField);
                    }
                }

                document.body.appendChild(form);
                form.submit();
            }
            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for(var i=0; i<ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1);
                    if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
                }
                return "";
            }
            function botonHora(id){
                var boton=document.getElementById(id);
                if (boton.className.indexOf("disabled")==-1){
                    if (boton_hora_anterior!=null) {
                        document.getElementById(boton_hora_anterior).className=boton_hora_anterior_color;
                        document.getElementById("form_reserva").style.display="none";
                        document.getElementById("form_cancelar_reserva").style.display="none";
                    }
                    if (boton.className=="") { // boton.className==boton_azul
                        var pos_ini=id.indexOf("H")+1;
                        var pos_fin=id.indexOf("-",pos_ini);
                        var hora=id.substring(pos_ini,pos_fin)+":00";
                        var inputHora=document.getElementById("inputHora");
                    }else{
                        boton_hora_anterior_color=boton.className;
                        boton.className=boton_naranja;
                        var pos_ini=id.indexOf("H")+1;
                        var pos_fin=id.indexOf("-",pos_ini);
                        var hora=id.substring(pos_ini,pos_fin)+":00";
                        var inputHora=document.getElementById("inputHora");
                        inputHora.value=hora;
                        boton_hora_anterior=id;

                        if (boton_hora_anterior_color==boton_verde){
                            //mostrar formulario de reserva
                            document.getElementById("form_reserva").style.display="";
                            pos_ini=id.indexOf("P")+1;
                            pos_fin=id.indexOf("\"",pos_ini);
                            var pista=id.substring(pos_ini,id.length);
                            document.getElementById("inputPista").value=pista;
                            //alert(pos_ini+" "+pos_fin+" "+pista);
                            window.location.href = '#formulario_reserva';
                        }else if (boton_hora_anterior_color==boton_azul){
                            //mostrar formulario de reservas previas
                            document.getElementById("form_cancelar_reserva").style.display="";
                            pos_ini=id.indexOf("P")+1;
                            pos_fin=id.indexOf("\"",pos_ini);
                            var pista=id.substring(pos_ini,id.length);
                            document.getElementById("inputPista").value=pista;

                            //EJEMPLO CODIFICACION COOKIE
                            // "id=$evento{'dni'}<>$evento{'nombre'}<>$evento{'apellidos'}"
                            // PERO SE VISUALIZA ASI
                            // "id=$evento{'dni'}%3C%3E$evento{'nombre'}%3C%3E$evento{'apellidos'}"

                            // "%3C%3E"  === "<>"

                            var cookie=getCookie(id);
                            //var cookies=cookie.split("<>");

                            try{
                                var cookies=cookie.split("%3C%3E");
                                var dni=cookies[0];
                                var nombre=cookies[1];
                                var apellido=cookies[2];

                                document.getElementById("inputDNICancelar").value=dni;
                                document.getElementById("inputNombreCancelar").value=nombre;
                                document.getElementById("inputApellidoCancelar").value=apellido;


                                //alert(dni+","+nombre+","+apellidos);
                            }catch(e){
                                alert("Error al cargar los datos");
                            }
                            //var cookie = document.cookie;
                            //cookie=JSON.parse(cookie);
                            //alert(cookie);

                            window.location.href = '#formulario_cancelar_reserva';
                        }

                    }
                }
            }
            function botonEnviarFecha(id){
                post("",{id_fecha: id.slice(-1)}); //Enviamos por POST el ultimo caracter de la id de la fecha (el dia)
            }
            /* function botonFecha(id){
      var boton=document.getElementById(id);
        if (boton_diasemana_anterior!=null) {
            document.getElementById(boton_diasemana_anterior).className="btn btn-primary";
        }
        document.getElementById("inputFecha").value=boton.innerHTML;
        boton_diasemana_anterior=id;
        boton.className=boton.className+" pressed";
  }*/
            function sinbonoSelect() {
                var conBonoDiv = document.getElementById("conBonoDiv");
                var sinBonoDiv = document.getElementById("sinBonoDiv");
                conBonoDiv.style.display="none";
                sinBonoDiv.style.display="";
            }
            function conbonoSelect() {
                var conBonoDiv = document.getElementById("conBonoDiv");
                var sinBonoDiv = document.getElementById("sinBonoDiv");
                sinBonoDiv.style.display="none";
                conBonoDiv.style.display="";
            }
            function juegoSocial() {
                var checkJuegoSocial = document.getElementById("checkJuegoSocial");
                var juegoSocial = document.getElementById("juegoSocial");
                if (checkJuegoSocial.checked)
                    juegoSocial.style.display="";
                else juegoSocial.style.display="none";
            }
            function updateDeporte() {
                var deporte = location.href;
                var pos = deporte.indexOf("?deporte=");
                if (pos==-1){
                    deporte="";
                }else{
                    deporte = deporte.substring(pos+"?deporte=".length,deporte.length);
                    if(deporte == "Futbol8"){
                        deporte = "Fútbol 8";
                    }else if(deporte == "Futbol11"){
                        deporte = "Fútbol 11";
                    }else if(deporte == "Fronton"){
                        deporte = "Frontón";
                    }else if(deporte == "Padel"){
                        deporte = "Pádel";
                    }else if(deporte == "Piscina"){
                        deporte = "Piscina de verano";
                    }
                }
                //alert(deporte);
                document.getElementById("deporte").innerHTML=deporte;
            }
        </script>
    </head>
    <body body onload="onLoadBody()">
        <?php include_once("analyticstracking.php") ?>
        <?php
        $username = "root"; //u230540113_root     u763546863_root
        $password = "";  //Labruixadetamare1992
        $hostname = "localhost";  //mysql.hostinger.es

        //connection to the database
        $dbhandle = mysqli_connect($hostname, $username, $password) 
            or die("Unable to connect to mysql");
        // echo "Connected to mysqli<br>";

        //select a database to work with
        $selected = mysqli_select_db($dbhandle,"deportes") //u230540113_sport      u763546863_sport
            or die("Could not select deportes");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");
        $gestion="";
        if(isset($_GET['gestion']) && !empty($_GET['gestion'])){
            $gestion=$_GET['gestion'];
        }
        $operacion="";
        if(isset($_GET['operacion']) && !empty($_GET['operacion'])){
            $operacion=$_GET['operacion'];
        }
        $deporte="";
        if(isset($_GET['deporte']) && !empty($_GET['deporte'])){
            $deporte=$_GET['deporte'];
        }

        //$arrayReservas = array();

        ?>
        <!-- NAVIGATION BAR -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" style="padding: 5px 5px;"><img src="http://www.mislata.es/_code/themes/default/images/logo.png" height="40"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown <?php if ($gestion=="Bonos") echo "active"; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/resources/icons/futbol.svg" height="20px"> Gestión de bonos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="<?php if ($gestion=="Bonos" && $operacion=="Nuevo") echo "active"; ?>"><a href="?gestion=Bonos&operacion=Nuevo">Nuevo bono</a></li>
                                <!-- <li role="separator" class="divider"></li> -->
                                <li class="<?php if ($gestion=="Bonos" && $operacion=="Modificar") echo "active"; ?>"><a href="?gestion=Bonos&operacion=Modificar">Modificar/Borrar bono</a></li>
                            </ul>
                        </li>

                        <?php
                        $dep2 = mysqli_query($dbhandle,"SELECT DISTINCT subdeporte, id_deporte FROM subdeportes ORDER BY deporte ASC;");
                        ?>
                        <li class="dropdown <?php if(isset($deporte) && !empty($deporte))echo "active";?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/resources/icons/tenis.svg" height="20px"> Gestión de reservas<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                for ($id_deporte2=""; $de2 = mysqli_fetch_array($dep2);$id_deporte2=$id_deporte1) {
                                    $subdeporte = $de2{"subdeporte"};
                                    $id_deporte1 = $de2{"id_deporte"};
                                    if ($id_deporte1!=$id_deporte2 && $id_deporte2!="") echo "<li role=\"separator\" class=\"divider\"></li>";
                                ?>
                                <li class="<?php if(isset($deporte) && !empty($deporte) && $deporte==$subdeporte)echo "active";?>"><a href="?deporte=<?php echo $subdeporte; ?>"><?php echo $subdeporte; ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        mysqli_free_result($dep2);
                        ?>


                        <li class="dropdown <?php if ($gestion=="Pistas" || $gestion=="Subdeportes" || $gestion=="Deportes") echo "active"; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/resources/icons/futbol.svg" height="20px"> Gestión de pistas deportivas<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="<?php if ($gestion=="Deportes" && $operacion=="Nuevo") echo "active"; ?>"><a href="?gestion=Deportes&operacion=Nuevo">Nuevo deporte</a></li>
                                <li class="<?php if ($gestion=="Deportes" && $operacion=="Modificar") echo "active"; ?>"><a href="?gestion=Deportes&operacion=Modificar">Modificar/Borrar deporte</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="<?php if ($gestion=="Subdeportes" && $operacion=="Nuevo") echo "active"; ?>"><a href="?gestion=Subdeportes&operacion=Nuevo">Nuevo subdeporte</a></li>
                                <!-- <li role="separator" class="divider"></li> -->
                                <li class="<?php if ($gestion=="Subdeportes" && $operacion=="Modificar") echo "active"; ?>"><a href="?gestion=Subdeportes&operacion=Modificar">Modificar/Borrar subdeporte</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="<?php if ($gestion=="Pistas" && $operacion=="Nuevo") echo "active"; ?>"><a href="?gestion=Pistas&operacion=Nuevo">Nueva pista</a></li>
                                <!-- <li role="separator" class="divider"></li> -->
                                <li class="<?php if ($gestion=="Pistas" && $operacion=="Modificar") echo "active"; ?>"><a href="?gestion=Pistas&operacion=Modificar">Modificar/Borrar pista</a></li>
                            </ul>
                        </li>


                        <!--
<li class="<?php //if ($gestion=="Bonos") echo "active"; ?>"><a href="?gestion=Bonos"><img src="/resources/icons/atletismo.svg" height="20px"> Gestión de bonos</a></li>
<li class="<?php //if ($gestion=="Clientes") echo "active"; ?>"><a href="?gestion=Clientes"><img src="/resources/icons/baloncesto.svg" height="20px"> Gestión de clientes</a></li>
<li class="<?php //if ($gestion=="Avisos") echo "active"; ?>"><a href="?gestion=Avisos"><img src="/resources/icons/balonmano.svg" height="20px"> Gestión de avisos</a></li>
<li class="<?php //if ($gestion=="Reservas") echo "active"; ?>"><a href="?gestion=Reservas"><img src="/resources/icons/fronton.svg" height="20px"> Gestión de reservas</a></li>
<li class="<?php //if ($gestion=="Pistas") echo "active"; ?>"><a href="?gestion=Pistas"><img src="/resources/icons/padel.svg" height="20px"> Gestión de pistas deportivas</a></li>
<li class="<?php //if ($gestion=="Horarios") echo "active"; ?>"><a href="?gestion=Horarios"><img src="/resources/icons/tenis.svg" height="20px"> Gestión de horarios</a></li>
-->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- FINISH NAVIGATION BAR -->



        <?php
        //print_r($_POST);
        //
        // IF NO OPTION IS SELECTED
        //
        if ($gestion=="" && $deporte==""){
            echo "</body></html>";

            // 
            // PARAMETRO OPCION
            //
        }else if (isset($_POST['Opcion'])){
            // 
            // CANCELAR RESERVA
            //
            if ($_POST['Opcion']=="eliminar" && isset($_POST['Tabla']) && !empty($_POST['Tabla']) && isset($_POST['Seleccion']) && !empty($_POST['Seleccion'])){
                $tabla=mysqli_real_escape_string($dbhandle,$_POST['Tabla']);
                $seleccion=mysqli_real_escape_string($dbhandle,$_POST['Seleccion']);
                $nombre_columna="";

                $results=mysqli_query($dbhandle,"SELECT * FROM $tabla LIMIT 1;");
                while ($cols = mysqli_fetch_field($results)){
                    $nombre_columna=$cols->name;
                    break;
                }
                if ($nombre_columna!="") $results=mysqli_query($dbhandle,"DELETE FROM $tabla WHERE $nombre_columna = $seleccion;");

            }else if ($_POST['Opcion']=="modificar" && isset($_POST['Tabla']) && !empty($_POST['Tabla']) && isset($_POST['Seleccion']) && !empty($_POST['Seleccion'])){




            }else if ($_POST['Opcion']=="cancelarReserva" && isset($_POST['Fecha']) && !empty($_POST['Fecha']) && isset($_POST['Hora']) && !empty($_POST['Hora']) && isset($_POST['inputDNICancelar']) && !empty($_POST['inputDNICancelar']) && isset($_POST['Pista']) && !empty($_POST['Pista']) && isset($deporte) && !empty($deporte)){
                $inputDNI=mysqli_real_escape_string($dbhandle,$_POST['inputDNICancelar']);
                $inputFecha=mysqli_real_escape_string($dbhandle,$_POST['Fecha']);
                $inputHora=mysqli_real_escape_string($dbhandle,$_POST['Hora']);
                $inputPista=mysqli_real_escape_string($dbhandle,$_POST['Pista']);
                $results=mysqli_query($dbhandle,"DELETE FROM eventos WHERE id_cliente = (SELECT id_cliente FROM `clientes` WHERE dni='$inputDNI') AND id_evento = (SELECT id_evento FROM pistas,subdeportes WHERE pista='$inputPista' AND fecha='$inputFecha' AND hora='$inputHora' AND subdeportes.subdeporte = '$deporte' AND pistas.id_subdeporte = subdeportes.id_subdeporte AND pistas.id_pista=eventos.id_pista);");

                //
                // NUEVO BONO
                //
            }else if ($_POST['Opcion']=="nuevoBono" && isset($_POST['inputNombre']) && !empty($_POST['inputNombre']) && isset($_POST['inputApellido']) && !empty($_POST['inputApellido']) && isset($_POST['inputDNI']) && !empty($_POST['inputDNI']) && isset($_POST['inputTipoBono']) && !empty($_POST['inputTipoBono'])){
                $inputNombre=mysqli_real_escape_string($dbhandle,$_POST['inputNombre']);
                $inputApellido=mysqli_real_escape_string($dbhandle,$_POST['inputApellido']);
                $inputDNI=mysqli_real_escape_string($dbhandle,$_POST['inputDNI']);
                $inputTipoBono=mysqli_real_escape_string($dbhandle,$_POST['inputTipoBono']);
                $inputTelefono=mysqli_real_escape_string($dbhandle,$_POST['inputTelefono']);
                $id_cliente="";

                $sel = mysqli_query($dbhandle,"SELECT id_cliente FROM `clientes` WHERE dni = '$inputDNI';");

                if ($sel===true || $sel===false || mysqli_num_rows($sel)==0){ //SI NO EXISTE DICHO CLIENTE
                    //
                    //SE CREA EL CLIENTE
                    //
                    $results=mysqli_query($dbhandle,"INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `dni`, `telefono`, `id_bono`) VALUES ('', '$inputNombre', '$inputApellido', '$inputDNI', '$inputTelefono', '');");

                    $sel = mysqli_query($dbhandle,"SELECT id_cliente FROM `clientes` WHERE dni = '$inputDNI';");
                }

                while ($se = mysqli_fetch_array($sel)) { //SE COMPRUEBA KE EXISTEN LA PISTA DNI Y BONO
                    $id_cliente = $se{"id_cliente"};
                }
                mysqli_free_result($sel);

                $results=mysqli_query($dbhandle,"INSERT INTO `bonos` (`id_bono`, `id_cliente`, `horas_restantes`) VALUES ('', '$id_cliente', '$inputTipoBono');");
                //print_r($results);
                //mysqli_free_result($results);
                //FIN ELSE (SUBDEPORTE CREADO Y TODO CORRECTO) 

                //
                // NUEVO DEPORTE 
                //
            }else if ($_POST['Opcion']=="nuevoDeporte" && isset($_POST['inputDeporte']) && !empty($_POST['inputDeporte'])){
                $inputDeporte=mysqli_real_escape_string($dbhandle,$_POST['inputDeporte']);

                $sel = mysqli_query($dbhandle,"SELECT id_deporte FROM `deportes` WHERE deporte = '$inputDeporte';");
                //print_r($sel);
                if ($sel===true || $sel===false || mysqli_num_rows($sel)==0){ //SI NO EXISTE DICHO DEPORTE
                    echo "NO EXISTE DEPORTE";
                    $results=mysqli_query($dbhandle,"INSERT INTO `deportes` (`id_deporte`, `deporte`, `nombre_simple`) VALUES ('', '$inputDeporte', '$inputDeporte');");
                }
                //
                // NUEVO SUBDEPORTE 
                //
            }else if ($_POST['Opcion']=="nuevoSubdeporte" && isset($_POST['inputDeporte']) && !empty($_POST['inputDeporte']) && isset($_POST['inputSubdeporte']) && !empty($_POST['inputSubdeporte'])){
                $inputDeporte=mysqli_real_escape_string($dbhandle,$_POST['inputDeporte']);
                $inputSubdeporte=mysqli_real_escape_string($dbhandle,$_POST['inputSubdeporte']);
                $id_deporte="";

                $sel = mysqli_query($dbhandle,"SELECT id_subdeporte FROM `subdeportes` WHERE subdeporte = '$inputSubdeporte' ORDER BY deporte ASC;");

                if ($sel===true || $sel===false || mysqli_num_rows($sel)==0){ //SI NO EXISTE DICHO DEPORTE
                    //
                    //SE OBTIENE LA ID_DEPORTE
                    //
                    $sel = mysqli_query($dbhandle,"SELECT id_deporte FROM deportes WHERE deporte = '$inputDeporte';");
                    while ($se = mysqli_fetch_array($sel)) { //SE COMPRUEBA KE EXISTEN LA PISTA DNI Y BONO
                        $id_deporte = $se{"id_deporte"};
                    }
                    mysqli_free_result($sel);
                    if (!(isset($id_deporte) && !empty($id_deporte))){
                        //echo "Cliente no encontrado. No se ha realizado la reserva";
                        $error_reserva="Deporte no encontrado. No se ha realizado la inserción";
                    }else{ //SE PROCEDE A LA INSERCIÓN
                        $results=mysqli_query($dbhandle,"INSERT INTO `subdeportes` (`id_subdeporte`, `id_deporte`, `deporte`, `subdeporte`) VALUES ('', '$id_deporte', '$inputDeporte', '$inputSubdeporte');");
                        //print_r($results);
                        //mysqli_free_result($results);
                    }//FIN ELSE (SUBDEPORTE CREADO Y TODO CORRECTO) 
                }

                //
                // NUEVA PISTA 
                //
            }if ($_POST['Opcion']=="nuevaPista" && isset($_POST['inputSubdeporte']) && !empty($_POST['inputSubdeporte']) && isset($_POST['inputPista']) && !empty($_POST['inputPista']) && isset($_POST['inputHoraApertura']) && !empty($_POST['inputHoraApertura']) && isset($_POST['inputHoraCierre']) && !empty($_POST['inputHoraCierre']) && isset($_POST['inputDuracionReserva']) && !empty($_POST['inputDuracionReserva']) && isset($_POST['inputPrecioReserva']) && !empty($_POST['inputPrecioReserva']) && isset($_POST['inputPrecioIluminacion']) && !empty($_POST['inputPrecioIluminacion'])){
                $inputSubdeporte=mysqli_real_escape_string($dbhandle,$_POST['inputSubdeporte']);
                $inputPista=mysqli_real_escape_string($dbhandle,$_POST['inputPista']);
                $inputHoraApertura=mysqli_real_escape_string($dbhandle,$_POST['inputHoraApertura']);
                $inputHoraCierre=mysqli_real_escape_string($dbhandle,$_POST['inputHoraCierre']);
                $inputDuracionReserva=mysqli_real_escape_string($dbhandle,$_POST['inputDuracionReserva']);
                $inputPrecioReserva=mysqli_real_escape_string($dbhandle,$_POST['inputPrecioReserva']);
                $inputPrecioIluminacion=mysqli_real_escape_string($dbhandle,$_POST['inputPrecioIluminacion']);
                $id_subdeporte="";

                $sel = mysqli_query($dbhandle,"SELECT id_pista FROM `pistas` WHERE subdeporte = '$inputSubdeporte' AND pista = '$inputPista';");

                if ($sel===true || $sel===false || mysqli_num_rows($sel)==0){ //SI NO EXISTE DICHO DEPORTE
                    //
                    //SE OBTIENE LA ID_DEPORTE
                    //
                    $sel = mysqli_query($dbhandle,"SELECT id_subdeporte FROM subdeportes WHERE subdeporte = '$inputSubdeporte' ORDER BY deporte ASC;");
                    while ($se = mysqli_fetch_array($sel)) { //SE COMPRUEBA KE EXISTEN LA PISTA DNI Y BONO
                        $id_subdeporte = $se{"id_subdeporte"};
                    }
                    mysqli_free_result($sel);
                    if (!(isset($id_subdeporte) && !empty($id_subdeporte))){
                        //echo "Cliente no encontrado. No se ha realizado la reserva";
                        $error_reserva="Deporte no encontrado. No se ha realizado la inserción";
                    }else{ //SE PROCEDE A LA INSERCIÓN
                        $results=mysqli_query($dbhandle,"INSERT INTO `pistas` (`id_pista`, `id_subdeporte`, `subdeporte`, `pista`, `hora_apertura`, `hora_cierre`, `precio`, `tiempo_reserva`, `precio_iluminacion`) VALUES ('', '$id_subdeporte', '$inputSubdeporte', '$inputPista', '$inputHoraApertura', '$inputHoraCierre', '$inputDuracionReserva', '$inputPrecioReserva', '$inputPrecioIluminacion');");
                        //print_r($results);
                        //mysqli_free_result($results);
                    }//FIN ELSE (SUBDEPORTE CREADO Y TODO CORRECTO) 
                }
            }
        }if (isset($deporte) && !empty($deporte)){
            //
            // RESERVAR
            //
            if(isset($_POST['inputDNI']) && !empty($_POST['inputDNI']) && isset($_POST['inputFecha']) && !empty($_POST['inputFecha']) && isset($_POST['inputHora']) && !empty($_POST['inputHora']) && isset($_POST['inputPista']) && !empty($_POST['inputPista'])){ //SE VERIFICA QUE TENEMOS EL POST, SI ESTÁ ENTRA AL IF
                $reservaCorrecta=false;
                $error_reserva="";
                $inputDNI=mysqli_real_escape_string($dbhandle,$_POST['inputDNI']);
                $inputFecha=mysqli_real_escape_string($dbhandle,$_POST['inputFecha']);
                $inputHora=mysqli_real_escape_string($dbhandle,$_POST['inputHora']);
                $inputPista=mysqli_real_escape_string($dbhandle,$_POST['inputPista']);

                $sel = mysqli_query($dbhandle,"SELECT id_evento FROM eventos,pistas,subdeportes WHERE pista='$inputPista' AND fecha='$inputFecha' AND hora='$inputHora' AND subdeportes.subdeporte = '$deporte' AND pistas.id_subdeporte = subdeportes.id_subdeporte AND pistas.id_pista=eventos.id_pista;");

                if ($sel===true || $sel===false || mysqli_num_rows($sel)==0){ //SI NO EXISTE UNA RESERVA PARA ESA FECHA, HORA Y PISTA SE PUEDE CONTINUAR

                    //
                    //SE COMPRUEBA SI SE RESERVA POR BONO
                    //
                    if (isset($_POST['radioBono']) && $_POST['radioBono']==="bonoSi" && isset($_POST['inputBono']) && !empty($_POST['inputBono'])){

                        $inputBono=mysqli_real_escape_string($dbhandle,$_POST['inputBono']);
                        $sel = mysqli_query($dbhandle,"SELECT id_pista,clientes.id_cliente FROM pistas,subdeportes,clientes,bonos WHERE subdeportes.subdeporte = '$deporte' AND pistas.id_subdeporte = subdeportes.id_subdeporte AND dni='$inputDNI' AND bonos.id_bono=$inputBono AND bonos.id_cliente = clientes.id_cliente AND pistas.pista=$inputPista;");
                        while ($se = mysqli_fetch_array($sel)) { //SE COMPRUEBA KE EXISTEN LA PISTA DNI Y BONO
                            $id_pista = $se{"id_pista"};
                            $id_cliente = $se{"id_cliente"};

                        }
                        mysqli_free_result($sel);
                        if (!(isset($id_cliente) && !empty($id_cliente) && isset($id_pista) && !empty($id_pista))){
                            //echo "Cliente no encontrado. No se ha realizado la reserva";
                            $error_reserva="Cliente/Bono no encontrado. No se ha realizado la reserva";
                        }else{
                            $results=mysqli_query($dbhandle,"INSERT INTO `eventos` (`id_evento`, `estado`, `id_pista`, `fecha`, `hora`, `id_cliente`, `modo_pago`, `id_bono`, `iluminacion`) VALUES ('', 'Reservado', '$id_pista', '$inputFecha', '$inputHora', '$id_cliente', 'BONO', '$inputBono', '');");
                            //print_r($results);
                            $reservaCorrecta=true;
                        }//FIN ELSE (CLIENTE ENCONTRADO Y TODO CORRECTO) 
                        //
                        //SE COMPRUEBA SI SE RESERVA SIN BONO
                        //
                    }else if (isset($_POST['radioBono']) && $_POST['radioBono']==="bonoNo" && isset($_POST['inputNombre']) && !empty($_POST['inputNombre']) && isset($_POST['inputApellido']) && !empty($_POST['inputApellido']) && isset($_POST['radioPago']) && !empty($_POST['radioPago']) && isset($_POST['radioLuz'])){

                        $inputNombre=mysqli_real_escape_string($dbhandle,$_POST['inputNombre']);
                        $inputApellido=mysqli_real_escape_string($dbhandle,$_POST['inputApellido']);
                        $inputTelefono=mysqli_real_escape_string($dbhandle,$_POST['inputTelefono']);
                        $radioPago=mysqli_real_escape_string($dbhandle,$_POST['radioPago']);
                        $radioLuz=mysqli_real_escape_string($dbhandle,$_POST['radioLuz']);
                        if ($radioLuz!=1) $radioLuz=0;
                        $results=mysqli_query($dbhandle,"INSERT INTO `clientes`(`id_cliente`, `nombre`, `apellidos`, `dni`, `telefono`, `id_bono`) VALUES ('','$inputNombre','$inputApellido','$inputDNI','$inputTelefono',NULL);");
                        $sel = mysqli_query($dbhandle,"SELECT DISTINCT id_pista,clientes.id_cliente FROM pistas,subdeportes,clientes,bonos WHERE subdeportes.subdeporte = '$deporte' AND pista=$inputPista AND pistas.id_subdeporte = subdeportes.id_subdeporte AND dni='$inputDNI';");


                        while ($se = mysqli_fetch_array($sel)) {
                            $id_pista = $se{"id_pista"};
                            $id_cliente = $se{"id_cliente"};

                        }
                        mysqli_free_result($sel);
                        $results=mysqli_query($dbhandle,"INSERT INTO `eventos` (`id_evento`, `estado`, `id_pista`, `fecha`, `hora`, `id_cliente`, `modo_pago`, `id_bono`, `iluminacion`) VALUES ('', 'Reservado', '$id_pista', '$inputFecha', '$inputHora', '$id_cliente', '$radioPago', '', '$radioLuz');");
                        $reservaCorrecta=true;
                        //mysqli_free_result($results);
                        //echo "reserva sin bono";
                    }else{ //NO ENTRA NI POR BONO NI SIN BONO
                        print_r("Datos incorrectos");
                    }
                }else{
                    //NO SE PUEDE RESERVAR; LA RESERVA YA EXISTIA
                    //echo "Ya existía la reserva.";
                    $error_reserva="Ya existía la reserva.";
                }


        ?>
        <div class="reserva" display:"">
            <?php
                if ($reservaCorrecta){
                    echo "Reserva para $deporte, pista $inputPista, el $inputFecha a las $inputHora!";
                }else{
                    echo "¡Error al efectuar la reserva! $error_reserva";
                }
            ?>
        </div>
        <?php


            }//Final if comprobacion de si se reserva

        ?>

        <?php
            $columnas = mysqli_query($dbhandle,"SELECT pista, precio, tiempo_reserva, precio_iluminacion, TIME_FORMAT(hora_apertura, '%H'),TIME_FORMAT(hora_cierre, '%H') FROM pistas WHERE subdeporte = '".$deporte."';");
            $num_pistas=mysqli_num_rows($columnas);

        ?>
        <h2 class="col-md-12" id="deporte"><?php echo $deporte; ?></h2>

        <div class="container col-md-2 col-lg-2">
            <?php
            $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
            $date = new DateTime();
            $fecha = $date->format('Y-m-d');
            if(isset($_POST['id_fecha']) && !empty($_POST['id_fecha'])){ //SE VERIFICA QUE TENEMOS EL POST CON LA FECHA NUEVA, SI ESTÁ ENTRA AL IF
                $id_fecha=mysqli_real_escape_string($dbhandle,$_POST['id_fecha']);
            }else/* if (!isset($inputFecha))*/{
                $id_fecha=1;
            }
            for ($dia=1; $dia<8; $dia++){
                /*if (isset($inputFecha) && $inputFecha==$date) $id_fecha=$dia;
                else*/ if (isset($id_fecha) && $dia==$id_fecha && $dia > 1) $fecha = $date->format('Y-m-d');
            ?>
            <a id="Dia<?php echo $dia;?>" class="btn btn-primary <?php if ($dia==$id_fecha) echo "active" ?>" onclick="botonEnviarFecha(id)"><?php echo $dias[$date->format('w')]."<br>".$date->format('d/m'); ?></a>
            <?php
                $date->modify('+1 day');
            }
            ?>
        </div>


        <div class="container col-md-<?php if($num_pistas>3) echo "6";else echo "4"; ?> col-lg-<?php if($num_pistas>3) echo "6";else echo "4"; ?>">
            <table class="table table-striped">
                <tr>
                    <th>Hora</th>
                    <?php
            //$columnas = mysqli_query($dbhandle,"SELECT pista, precio, tiempo_reserva, precio_iluminacion, TIME_FORMAT(hora_apertura, '%H'),TIME_FORMAT(hora_cierre, '%H') FROM pistas WHERE subdeporte = '".$deporte."';");
            $num_pistas=0;
            while ($row = mysqli_fetch_array($columnas)) {
                //echo "Pista:".$row{'pista'}."<br>"; //display the results
                $hora_apertura = $row{"TIME_FORMAT(hora_apertura, '%H')"};
                $hora_cierre = $row{"TIME_FORMAT(hora_cierre, '%H')"};
                $num_pistas++;
                $precio = $row{"precio"};
                $duracion_reserva = $row{"tiempo_reserva"};
                $precio_iluminacion = $row{"precio_iluminacion"};

                    ?>

                    <th>Pista <?php echo $row{'pista'};?></th>
                    <?php
            }
            mysqli_free_result($columnas);
            $hora_actual = $hora_apertura;

            //$filas = mysqli_query($dbhandle,"SELECT estado,hora,pista FROM eventos,pistas WHERE fecha = '2015-08-26' and eventos.id_pista=pistas.id_pista and pistas.subdeporte = '".$deporte."';");
            while ($hora_actual<=$hora_cierre) {
                    ?>
                </tr>
                <tr>
                    <th class="col-md-1 col-xs-1"><?php echo $hora_actual.":00"; ?></th>
                    <?php
                //$fecha = date('Y-m-d');

                for ($pista_actual=1; $pista_actual<=$num_pistas; $pista_actual++) {
                    $eventos = mysqli_query($dbhandle,"SELECT DISTINCT estado,pista,dni,nombre,apellidos,dni FROM eventos,pistas,clientes WHERE fecha = '$fecha' AND hora = '$hora_actual:00' AND eventos.id_pista=pistas.id_pista AND pistas.subdeporte = '".$deporte."' AND pista = '$pista_actual' AND eventos.id_cliente=clientes.id_cliente;");
                    $entra_evento=false;
                    while ($evento = mysqli_fetch_array($eventos)) {
                        if (!$entra_evento) $entra_evento=true;
                        $boton_verde="btn btn-success";
                        $boton_azul="btn btn-info";
                        $boton_naranja="btn btn-warning";
                        $boton_rojo="btn btn-danger";
                        if ($evento{'estado'}=='Reservado'){ 
                            $color=$boton_azul;
                            // "btn-H$hora_actual-P$pista_actual"
                            // json_encode(array("dni" => $evento{'dni'}, "nombre" => $evento{'nombre'}, "apellidos" => $evento{'apellidos'}))

                            // "btn-H$hora_actual-P$pista_actual","dni=>$evento{'dni'}<>nombre=>$evento{'nombre'}<>apellidos=>$evento{'apellidos'}"
                            //echo json_encode(array($evento{'dni'},$evento{'nombre'},$evento{'apellidos'}));
                            //echo "{".$evento{'dni'}.",".$evento{'nombre'}.",".$evento{'apellidos'}."}";
                            setcookie("btn-H$hora_actual-P$pista_actual",$evento{'dni'}."<>".$evento{'nombre'}."<>".$evento{'apellidos'});
                        }else if ($evento{'estado'}=='Reservado (S)'){
                            $color=$boton_azul;
                        }else if ($evento{'estado'}=='Cerrado'){
                            $color=$boton_rojo;
                        }
                    ?>
                    <td class="col-md-2 col-xs-2"><button type="button" class="<?php echo $color; ?>" id="btn-H<?php echo $hora_actual; ?>-P<?php echo $pista_actual; ?>" onclick="botonHora(id)"><?php echo $evento{'estado'}; ?></button></td>
                    <?php

                    }
                    mysqli_free_result($eventos);
                    if (!$entra_evento){
                    ?>
                    <td class="col-md-2 col-xs-2"><button type="button" class="btn btn-success" id="btn-H<?php echo $hora_actual; ?>-P<?php echo $pista_actual; ?>" onclick="botonHora(id)">Libre</button></td>
                    <?php
                    }
                }
                    ?>
                </tr>
                <?php
                $hora_actual=$hora_actual+'1:00';
                if ($hora_actual<10) $hora_actual='0'.$hora_actual;
            }
                ?>


            </table>
        </div>
        <div class="container col-md-4 col-lg-4">
            <form onsubmit="return onSubmit()" method="post" action="">
                <a name="formulario_reserva"></a>
                <div class="form-group">
                    <label for="inputFecha">Fecha y hora de la reserva</label>
                    <input type="text" id="inputFecha" name="inputFecha" value="<?php echo "$fecha"; ?>" readonly><input type="text" name="inputHora" id="inputHora" readonly>
                    <input type="hidden" id="inputPista" name="inputPista">
                </div>
                <p><b>Duración de la reserva: </b><?php echo "$duracion_reserva h"; ?></p>
                <div class="form-group" id="form_reserva" style="display: none">
                    <div class="table">
                        <tr>
                            <td><label for="inputDNI">DNI:</label></td>
                            <td><input type="text" class="form-control" id="inputDNI" name="inputDNI" placeholder="12345678X"></td>
                        </tr>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="radioBono" id="radioBono1" value="bonoNo" onclick="sinbonoSelect()">
                            Reservar sin bono
                        </label>
                    </div>
                    <div id="sinBonoDiv" style="display: none">
                        <div class="form-group">
                            <label for="inputNombre">Nombre:</label>
                            <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Juan">
                        </div>
                        <div class="form-group">
                            <label for="inputApellido">Apellido:</label>
                            <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Pérez Gómez">
                        </div>
                        <div class="form-group">
                            <label for="inputTelefono">Teléfono (Optativo):</label>
                            <input type="tel" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="123456789">
                        </div>
                        <?php
            if ($precio_iluminacion>0){
                        ?>
                        <label for="radioLuz">Iluminación:</label>
                        <div class="radio" id="radioLuz">
                            <label>
                                <input type="radio" name="radioLuz" value="1"> Con iluminación (<?php echo "+ $precio_iluminacion €"; ?>)
                            </label>
                            <label>
                                <input type="radio" name="radioLuz" value="0" checked> Sin iluminación
                            </label>
                        </div>
                        <?php
            }
                        ?>
                        <p><b>Precio de pista: </b><?php echo "$precio €"; ?></p>
                        <label for="radioPago">Formas de pago:</label>
                        <div class="radio" id="radioPago">
                            <label>
                                <input type="radio" name="radioPago" value="PagoEntrada" checked> Pago en la entrada
                            </label>
                            <label>
                                <input type="radio" name="radioPago" value="Paypal"> Paypal
                            </label>
                        </div>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="radioBono" id="radioBono2" value="bonoSi" onclick="conbonoSelect()" checked>
                            Reservar con bono
                        </label>
                    </div>
                    <div class="form-group" id="conBonoDiv">
                        <label for="inputBono">Bono:</label>
                        <input type="number" class="form-control" id="inputBono" name="inputBono" placeholder="12345">
                    </div>
                    <label for="checkJuegoSocial">Requerir juego social:</label>
                    (Este modo te ayuda a encontrar personas con los que jugar).
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="checkJuegoSocial" name="checkJuegoSocial" onclick="juegoSocial()">Juego social
                        </label>
                    </div>


                    <div id="juegoSocial" style="display: none">
                        <div class="form-group">
                            <label for="inputSGJugadores">Jugadores actuales:</label>
                            <input type="number" class="form-control" id="inputSGJugadores" name="inputSGJugadores" placeholder="2">
                        </div>
                        <div class="form-group">
                            <label for="inputSGJugadoresTotales">Jugadores totales requeridos:</label>
                            <input type="number" class="form-control" id="inputSGJugadoresTotales" name="inputSGJugadoresTotales" placeholder="4">
                        </div>
                        <div class="form-group">
                            <label for="inputSGInformacion">Información adicional:</label>
                            (Expón aquí la información que consideres necesaria para los jugadores que se quieran apuntar a jugar contigo).<br>
                            <textarea class="form-control" id="inputSGInformacion" name="inputSGInformacion" rows="5"> </textarea>
                        </div>
                    </div>


                    <button id="boton_reserva" type="submit" class="btn btn-default" style="width: 100%">Reservar</button>
                </div> <!-- form-reserva -->
                <h1 class="col-md-12" id="mensajeReserva"></h1>
            </form>
            <!-- -->
            <!-- Formulario de cancelacion de reserva -->
            <!-- -->
            <form onsubmit="return onSubmitCancelar()" method="post" action="">
                <a name="formulario_cancelar_reserva"></a>
                <div class="form-group" id="form_cancelar_reserva" style="display: none">
                    <div class="form-group">
                        <label for="inputNombre">Nombre:</label>
                        <input type="text" class="form-control" id="inputNombreCancelar" name="inputNombreCancelar" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputApellido">Apellido:</label>
                        <input type="text" class="form-control" id="inputApellidoCancelar" name="inputApellidoCancelar" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputApellido">DNI:</label>
                        <input type="text" class="form-control" id="inputDNICancelar" name="inputDNICancelar" placeholder="" readonly>
                    </div>
                    <!-- CAMPOS OCULTOS -->
                    <input type="hidden" id="Opcion" name="Opcion" value="cancelarReserva">
                    <input type="hidden" id="Fecha" name="Fecha">
                    <input type="hidden" id="Hora" name="Hora">
                    <input type="hidden" id="Pista" name="Pista">

                    <button id="boton_cancelar_reserva" type="submit" class="btn btn-default" style="width: 100%">Cancelar reserva</button>
                </div> <!-- form-reserva -->
                <h1 class="col-md-12" id="mensajeReservaCancelada"></h1>
            </form>
        </div>

        <?php
        }else {   
            //
            //IF OPTION IS SELECTED
            //
        ?>



        <?php 
            //QUERY THE SELECTED TABLE
            $tabla="";
            if ($gestion=="Reservas"){ 
                $tabla="eventos";
            }else {
                $tabla=strtolower($gestion);
            }
            if ($operacion=="Modificar") {   // IF (SELECTED MODIFY/DELETE)
                $query = mysqli_query($dbhandle,"SELECT * FROM $tabla;");

        ?>



        <div class="container col-md-10 col-lg-10">
            <table class="table table-striped"><?php echo "$gestion\n"; ?>
                <tr>
                    <?php 
                $num_columnas=mysqli_num_fields($query);
                echo "\n\t\t<tr>";
                for ($n=0; $n<$num_columnas; $n++) {
                    if ($n==0) {
                        echo "\n\t\t<td></td>";
                    }
                    echo "\n\t\t<td><input type=\"text\" class=\"form-control\" id=\"input$n\" name=\"input$n\" placeholder=\"\" style=\"width: 150px;\"></td>";
                }
                echo "\n\t\t\t\t</tr>";
                $num_columnas=0;
                while ($cols = mysqli_fetch_field($query)){
                    if ($num_columnas==0) {
                        echo "\n\t\t<th></th>";
                    }
                    echo "\n\t\t<th>".$cols->name."</th>";
                    $num_columnas++;
                }

                echo "\n\t\t<div class=\"checkbox\">";
                for ($n=0; $elem = mysqli_fetch_array($query); $n++) {
                    echo "\n\t\t<tr id=\"col\">";
                    echo "\n\t\t<td><input type=\"checkbox\" id=\"check$n\" name=\"check$n\" onclick=\"selectRow(id)\"></td>";
                    for ($i=0;$i<$num_columnas;$i++){
                        if ($i!=0) echo "<td>$elem[$i]</td>";
                        else if ($i==0) echo "<td id=\"valor$n\">$elem[$i]</td>";
                    }
                    echo "</div>";
                    echo "</tr>";

                }
                mysqli_free_result($query);



                    ?>


                </tr>

            </table>
        </div>
        <form onsubmit="return enviarSubmit" method="post" action="">
            <input type="hidden" id="Tabla" name="Tabla" value="<?php echo $tabla; ?>">
            <input type="hidden" id="Opcion" name="Opcion" value="">
            <input type="hidden" id="Seleccion" name="Seleccion" value="">
            <div class="table col-md-4 col-lg-4">
                <button type="submit" class="btn btn-inverse" onclick="onSubmitModificar()" style="width: 10%">Modificar</button>
                <button type="submit" class="btn btn-inverse" onclick="onSubmitEliminar()" style="width: 10%">Eliminar</button>
            </div>
        </form>

        <?php
                // FINISH IF (SELECTED MODIFY/DELETE)
            }else {// ELSE (ADD NEW)
        ?>
        <!-- <form onsubmit="return onSubmit()" method="post" action=""> -->
        <?php
                if ($gestion=="Bonos"){

        ?>
        <div class="container col-md-4 col-lg-4">
            <form onsubmit="return onSubmitNuevoBono()" method="post" action="">
                <input type="hidden" id="Opcion" name="Opcion" value="nuevoBono">
                <div class="form-group">
                    <label for="inputNombre">Nombre:</label>
                    <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Juan">
                </div>
                <div class="form-group">
                    <label for="inputApellido">Apellido:</label>
                    <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Pérez Gómez">
                </div>
                <div class="form-group">
                    <label for="inputDNI">DNI:</label>
                    <input type="text" class="form-control" id="inputDNI" name="inputDNI" placeholder="12345678A">
                </div>
                <div class="form-group">
                    <label for="inputTelefono">Teléfono (Optativo):</label>
                    <input type="tel" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="123456789">
                </div>
                <div class="form-group">
                    <label for="inputTipoBono">Tipo de bono:</label>
                    <select class="form-control" id="inputTipoBono" name="inputTipoBono">
                        <option value=""></option>
                        <option value="5">5 horas</option>
                        <option value="10">10 horas</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default" style="width: 100%">Insertar</button>
                <h1 class="col-md-12" id="mensajeReserva"></h1>
            </form>
        </div>

        <?php

                }else if ($gestion=="Deportes"){
        ?>
        <div class="container col-md-4 col-lg-4">
            <form onsubmit="return onSubmitNuevoDeporte()" method="post" action="">
                <input type="hidden" id="Opcion" name="Opcion" value="nuevoDeporte">
                <div class="form-group">
                    <label for="inputDeporte">Nuevo deporte genérico:</label>
                    <input type="text" class="form-control" id="inputDeporte" name="inputDeporte" placeholder="Fútbol">
                </div>
                <button type="submit" class="btn btn-default" style="width: 100%">Insertar</button>
                <h1 class="col-md-12" id="mensajeReserva"></h1>
            </form>
        </div>
        <?php
                }else if ($gestion=="Subdeportes"){
        ?>
        <div class="container col-md-4 col-lg-4">
            <form onsubmit="return onSubmitNuevoSubdeporte()" method="post" action="">
                <input type="hidden" id="Opcion" name="Opcion" value="nuevoSubdeporte">
                <div class="form-group">
                    <label for="inputDeporte">Deporte genérico:</label>
                    <select class="form-control" id="inputDeporte" name="inputDeporte">
                        <option value=""></option>
                        <?php
                    $sel = mysqli_query($dbhandle,"SELECT deporte FROM `deportes` ORDER BY deporte ASC;");
                    while ($se = mysqli_fetch_array($sel)) { //SE COMPRUEBA KE EXISTEN LA PISTA DNI Y BONO
                        $deporte=$se{'deporte'};
                        print_r("<option value='$deporte'>$deporte</option>");
                    }
                    mysqli_free_result($sel);
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="inputSubdeporte">Deporte:</label>
                        <input type="text" class="form-control" id="inputSubdeporte" name="inputSubdeporte" placeholder="Fútbol 11 o Tenis">
                    </div>
                </div>
                <button type="submit" class="btn btn-default" style="width: 100%">Insertar</button>
                <h1 class="col-md-12" id="mensajeReserva"></h1>
            </form>
        </div>
        <?php
                }else if ($gestion=="Pistas"){
        ?>
        <div class="container col-md-4 col-lg-4">
            <form onsubmit="return onSubmitNuevaPista()" method="post" action="">
                <input type="hidden" id="Opcion" name="Opcion" value="nuevaPista">
                <div class="form-group">
                    <label for="inputSubdeporte">Deporte:</label>
                    <select class="form-control" id="inputSubdeporte" name="inputSubdeporte">
                        <option value=""></option>
                        <?php
                    $sel = mysqli_query($dbhandle,"SELECT subdeporte FROM `subdeportes` ORDER BY subdeporte ASC;");
                    while ($se = mysqli_fetch_array($sel)) { //SE COMPRUEBA KE EXISTEN LA PISTA DNI Y BONO
                        $subdeporte=$se{'subdeporte'};
                        print_r("<option value='$subdeporte'>$subdeporte</option>");
                    }
                    mysqli_free_result($sel);
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="inputPista">Nombre pista:</label>
                        <input type="text" class="form-control" id="inputPista" name="inputPista" placeholder="3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputHoraApertura">Hora apertura:</label>
                    <input type="time" class="form-control" id="inputHoraApertura" name="inputHoraApertura" value="08:00">
                </div>
                <div class="form-group">
                    <label for="inputHoraCierre">Hora cierre:</label>
                    <input type="time" class="form-control" id="inputHoraCierre" name="inputHoraCierre" value="23:00">
                </div>
                <div class="form-group">
                    <label for="inputDuracionReserva">Duración reserva (en horas):</label>
                    <input type="time" class="form-control" id="inputDuracionReserva" name="inputDuracionReserva" value="01:00">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="inputPrecioReserva">Precio reserva (€):</label>
                        <input type="number" min="0" step="0.10" max="2500" class="form-control" id="inputPrecioReserva" name="inputPrecioReserva" value="4.80">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="inputPrecioIluminacion">Precio iluminación (€)(-1 si no tiene):</label>
                        <input type="number" min="-1" step="0.10" max="2500" class="form-control" id="inputPrecioIluminacion" name="inputPrecioIluminacion" value="-1">
                    </div>
                </div>
                <button type="submit" class="btn btn-default" style="width: 100%">Insertar</button>
                <h1 class="col-md-12" id="mensajeReserva"></h1>
            </form>
        </div>
        <?php
                }

            }
        ?>
        <!-- </form> -->
        <?php 
        ?>

    </body>
</html>
<?php
        }// ELSE (OPTION SELECTED)

        //close the connection
        mysqli_close($dbhandle);
?>

