<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Reserva deportes Mislata</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="/styles/style.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.2.6.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
            var arrayDia=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
            var boton_verde="btn btn-success";
            var boton_azul="btn btn-info";
            var boton_naranja="btn btn-warning";
            var boton_rojo="btn btn-danger disabled";
            var boton_hora_anterior=null;
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
            function botonHora(id){
                var boton=document.getElementById(id);
                if (boton.className.indexOf("disabled")==-1){
                    if (boton_hora_anterior!=null) {
                        document.getElementById(boton_hora_anterior).className=boton_verde;
                    }
                    if (boton.className==boton_azul) {
                        var pos_ini=id.indexOf("H")+1;
                        var pos_fin=id.indexOf("-",pos_ini);
                        var hora=id.substring(pos_ini,pos_fin)+":00";
                        var inputHora=document.getElementById("inputHora");
                    }else{
                        boton.className=boton_naranja;
                        var pos_ini=id.indexOf("H")+1;
                        var pos_fin=id.indexOf("-",pos_ini);
                        var hora=id.substring(pos_ini,pos_fin)+":00";
                        var inputHora=document.getElementById("inputHora");
                        inputHora.value=hora;
                        boton_hora_anterior=id;
                        //mostrar formulario de reserva
                        document.getElementById("form_reserva").style.display="";

                        pos_ini=id.indexOf("P")+1;
                        pos_fin=id.indexOf("\"",pos_ini);
                        var pista=id.substring(pos_ini,id.length);
                        document.getElementById("inputPista").value=pista;
                        //alert(pos_ini+" "+pos_fin+" "+pista);

                        window.location.href = '#formulario_reserva';
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
            /*
  function cargarDias() {
      var fecha = new Date();
      //var diasemana = fecha.getDay();
      var diames= fecha.getDate();
      var mes = fecha.getMonth()+1;
      var año = fecha.getFullYear();
      //document.getElementById("inputFecha").value = arrayDia[fecha.getDay()] +" "+fecha.getDate()+"/"+fecha.getMonth();
      document.getElementById("inputFecha").value = año+"-"+mes+"-"+diames;
      var aux = diasemana-7;
      //fecha.setDate(fecha.getDate()+aux-1);
      for(var i=1; i<=7; i++) {
        //alert(fecha.getDate());
          document.getElementById("Dia"+i).innerHTML=arrayDia[fecha.getDay()] +" "+fecha.getDate()+"/"+fecha.getMonth()+1;
          fecha.setDate(fecha.getDate()+1);
      }
  }
  */
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
        ?>

        <nav class="navbar navbar-default">
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

                        <?php
                        if(isset($_GET['deporte']) && !empty($_GET['deporte'])){
                            $dep = mysqli_query($dbhandle,"SELECT subdeporte FROM subdeportes WHERE subdeporte = '".mysqli_real_escape_string($dbhandle,$_GET['deporte'])."';");
                            while ($de = mysqli_fetch_array($dep)) {
                                $deporte = $de{"subdeporte"};

                            }
                            mysqli_free_result($dep);
                        }

                        $dep = mysqli_query($dbhandle,"SELECT deportes.id_deporte,deportes.deporte,deportes.nombre_simple,COUNT(*) FROM deportes,subdeportes WHERE deportes.id_deporte = subdeportes.id_deporte GROUP BY deportes.id_deporte;");
                        while ($de = mysqli_fetch_array($dep)) {
                            $id_deporte = $de{"id_deporte"};
                            $deporte_generico = $de{"deporte"};
                            $nombre_simple = $de{"nombre_simple"};
                            $num_subdeportes = $de{"COUNT(*)"};
                            if ($num_subdeportes==1){
                        ?>

                        <li class="<?php if(isset($deporte) && !empty($deporte) && $deporte==$deporte_generico)echo "active";?>"><a href="?deporte=<?php echo $nombre_simple; ?>"><img src="/resources/icons/<?php echo $nombre_simple; ?>.svg" height="20px"> <?php echo $deporte_generico; ?></a></li>

                        <?php
                            }else if ($num_subdeportes>1){
                                $dep2 = mysqli_query($dbhandle,"SELECT subdeporte FROM subdeportes WHERE id_deporte = $id_deporte;");
                        ?>
                        <li class="dropdown <?php if(isset($deporte) && !empty($deporte) && strpos($deporte,$deporte_generico)===0)echo "active";?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/resources/icons/<?php echo $nombre_simple; ?>.svg" height="20px"><?php echo $deporte_generico; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                while ($de2 = mysqli_fetch_array($dep2)) {
                                    $subdeporte = $de2{"subdeporte"};
                                ?>
                                <li class="<?php if(isset($deporte) && !empty($deporte) && $deporte==$subdeporte)echo "active";?>"><a href="?deporte=<?php echo $subdeporte; ?>"><?php echo $subdeporte; ?></a></li>
                                <li role="separator" class="divider"></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                                mysqli_free_result($dep2);
                            }
                        }
                        mysqli_free_result($dep);

                        ?>
                        <li><a href="/comoreservar.php" >¿Cómo reservar?</a></li>
                        <li><a href="/faq.php" >¿Preguntas frecuentes?</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container ">


            <?php

            //execute the SQL query and return records
            /*$result = mysqli_query($dbhandle,"SELECT id_deporte,deporte FROM deportes");

    //fetch tha data from the database 
    while ($row = mysqli_fetch_array($result)) {
       echo "ID:".$row{'id_deporte'}." deporte:".$row{'deporte'}."<br>"; //display the results

    }

    $result = mysqli_query($dbhandle,"SELECT estado,fecha,hora,pista FROM eventos,pistas WHERE eventos.id_pista=pistas.id_pista and pistas.subdeporte = 'Frontón';");

    //fetch tha data from the database 
    while ($row = mysqli_fetch_array($result)) {
       echo "Pista:".$row{'pista'}." fecha:".$row{'fecha'}." hora:".$row{'hora'}." estado:".$row{'estado'}."<br>"; //display the results

    }
    */
            if(!(isset($_GET['deporte']) && !empty($_GET['deporte']))){ //SE VERIFICA QUE TENEMOS EL GET 'DEPORTE', SI NO ESTÁ ENTRA AL IF
            ?>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="false">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
                <li data-target="#myCarousel" data-slide-to="6"></li>
                <li data-target="#myCarousel" data-slide-to="7"></li>
                <li data-target="#myCarousel" data-slide-to="8"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="/resources/images/main.JPG" alt="Principal">
                    <div class="carousel-caption">
                        <h1>Bienvenido</h1>
                        <p>Aquí podrás reservar las instalaciones deportivas de Mislata</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/fronton.JPG" alt="Frontón">
                    <div class="carousel-caption">
                        <h3>Frontón</h3>
                        <p>Disfruta de 3 pistas de frontón</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/tenis.JPG" alt="Tenis">
                    <div class="carousel-caption">
                        <h3>Tenis</h3>
                        <p>Disfruta de 3 pistas de tenis</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/padel.JPG" alt="Pádel">
                    <div class="carousel-caption">
                        <h3>Pádel</h3>
                        <p> 2 pistas de pádel construidas en los últimos 5 años</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/futbol8.JPG" alt="Fútbol 8">
                    <div class="carousel-caption">
                        <h3>Fútbol 8</h3>
                        <p> Disfrute 2 campos de fútbol 8 de césped artificial </p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/futbol11.JPG" alt="Fútbol 11">
                    <div class="carousel-caption">
                        <h3>Fútbol 11</h3>
                        <p> Disfrute 2 campos de fútbol 11 de césped artificial</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/balonmano.JPG" alt="Balonmano">
                    <div class="carousel-caption">
                        <h3>Balonmano</h3>
                        <p> Una pista de balonmano</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/baloncesto.JPG" alt="Baloncesto">
                    <div class="carousel-caption">
                        <h3>Baloncesto</h3>
                        <p> Una cancha reglamentaria de baloncesto</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="/resources/images/atletismo.JPG" alt="Atletismo">
                    <div class="carousel-caption">
                        <h3>Atletismo</h3>
                        <p> Una pista de atletismo</p>
                        <!-- <a href="/reserva.php" class="btn btn-info btn-lg">¡Reserva ahora!</a> -->
                        <h2> ¡Reserva las pistas haciendo clic en la barra superior!</h2>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>    </body>


    <?php
                //close the connection
                mysqli_close($dbhandle);
    ?>

</html>
<?php
                exit; 
            } //FIN IF NO GET


            //$deporte=$_GET["deporte"];
            //echo $deporte;

            $dep = mysqli_query($dbhandle,"SELECT subdeporte FROM subdeportes WHERE subdeporte = '".mysqli_real_escape_string($dbhandle,$_GET['deporte'])."';");
            while ($de = mysqli_fetch_array($dep)) {
                $deporte = $de{"subdeporte"};

            }
            mysqli_free_result($dep);
            if(!(isset($deporte) && !empty($deporte))){ //SE VERIFICA QUE TENEMOS EL GET 'DEPORTE', SI NO ESTÁ ENTRA AL IF
                echo "<h3>El deporte: ".mysqli_real_escape_string($dbhandle,$_GET['deporte'])." no se encuentra.</h3>";
?>
</div>
</body>


<?php
                //close the connection
                mysqli_close($dbhandle);
?>
</html>
<?php
                exit; 
            } //FIN IF NO GET

            //print_r($_POST);


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
                    $eventos = mysqli_query($dbhandle,"SELECT estado,pista FROM eventos,pistas WHERE fecha = '$fecha' and hora = '$hora_actual:00' and eventos.id_pista=pistas.id_pista and pistas.subdeporte = '".$deporte."' and pista = '$pista_actual';");
                    $entra_evento=false;
                    while ($evento = mysqli_fetch_array($eventos)) {
                        if (!$entra_evento) $entra_evento=true;
                        $boton_verde="btn btn-success";
                        $boton_azul="btn btn-info";
                        $boton_naranja="btn btn-warning disabled";
                        $boton_rojo="btn btn-danger disabled";
                        if ($evento{'estado'}=='Reservado'){
                            $color=$boton_azul;
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


            <button type="submit" class="btn btn-default" style="width: 100%">Reservar</button>
        </div> <!-- form-reserva -->
        <h1 class="col-md-12" id="mensajeReserva"></h1>
    </form>
</div>
</div>
</body>


<?php
//close the connection
mysqli_close($dbhandle);
?>
</html>
