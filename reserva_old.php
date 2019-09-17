<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Reserva deportes Mislata</title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="/styles/style.css">
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="/bootstrap/js/bootstrap.js" type="text/javascript"></script>
  <script type="text/javascript">
  var arrayDia=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
  var boton_verde="btn btn-success";
  var boton_azul="btn btn-info";
  var boton_naranja="btn btn-warning disabled";
  var boton_rojo="btn btn-danger disabled";
  var boton_hora_anterior=null;
  var boton_diasemana_anterior=null;
  function onLoadBody() {
    //document.getElementById("inputFecha").value = (new Date());
    //updateDeporte();
      cargarDias();
    //alert("holi despues");
  }
  function onSubmit() {
      var alertar="";
      if (document.getElementById("inputFecha").value==""){
            alert("Debes seleccionar un día.\n"); 
          return false;
          }
       if (document.getElementById("inputHora").value==""){
            alert("Debes seleccionar la hora de la reserva.\n"); 
           return false;
          }
      if (document.getElementById("inputDNI").value==""){
            alertar+="El campo del DNI no puede estar vacio\n"; 
      }
      if (document.getElementById("radioBono1").checked){
          if (document.getElementById("inputNombre").value==""){
            alertar+="El campo del Nombre no puede estar vacio\n"; 
          }
          if (document.getElementById("inputApellido").value==""){
            alertar+="El campo del Apellidos no puede estar vacio\n"; 
          }
          if (document.getElementById("inputTeléfono").value==""){
            alertar+="El campo del DNI no puede estar vacio\n"; 
          }
      }else if (document.getElementById("radioBono2").checked){
          if (document.getElementById("inputBono").value==""){
            alertar+="El campo del Bono no puede estar vacio\n"; 
          }
      }
      if (alertar==""){
        document.getElementById(boton_hora_anterior).innerHTML="Reservado";
        boton_hora_anterior=null;
        document.getElementById("mensajeReserva").innerHTML="Reservado";
          return true;
      }else{
          alert(alertar);
          return false;
      }
    
    //alert("Pista reservada!");
    
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
            boton.className=boton_azul;
            var pos_ini=id.indexOf("H")+1;
            var pos_fin=id.indexOf("-",pos_ini);
            var hora=id.substring(pos_ini,pos_fin)+":00";
            var inputHora=document.getElementById("inputHora");
            inputHora.value=hora;
            boton_hora_anterior=id;
          }
      }
  }
  function botonFecha(id){
      var boton=document.getElementById(id);
        if (boton_diasemana_anterior!=null) {
            document.getElementById(boton_diasemana_anterior).className="btn btn-primary";
        }
        document.getElementById("inputFecha").value=boton.innerHTML;
        boton_diasemana_anterior=id;
        boton.className=boton.className+" pressed";
  }
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
  </script>
</head>
<body body onload="onLoadBody()">
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
          <li><a href="?deporte=Atletismo"><img src="/resources/icons/atletismo.svg" height="20px"> Atletismo</a></li>
          <!-- li del ... -->
          <li><a href="?deporte=Baloncesto"><img src="/resources/icons/baloncesto.svg" height="20px"> Baloncesto</a></li>
          <!-- li del ... -->
          <li><a href="?deporte=Balonmano"><img src="/resources/icons/balonmano.svg" height="20px"> Balonmano</a></li>
          <li><a href="?deporte=Fronton"><img src="/resources/icons/fronton.svg" height="20px"> Frontón</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/resources/icons/futbol.svg" height="20px"> Fútbol<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?deporte=Futbol 8">Fútbol 8</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="?deporte=Futbol 11">Fútbol 11</a></li>
            </ul>
          </li>
          <li><a href="?deporte=Padel"><img src="/resources/icons/padel.svg" height="20px"> Pádel</a></li>

          <!-- li del ... -->
          <li><a href="?deporte=Piscina"><img src="/resources/icons/piscina.svg" height="20px"> Piscina de verano</a></li>

          <li><a href="?deporte=Tenis"><img src="/resources/icons/tenis.svg" height="20px"> Tenis</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
      
      
     <?php
        $username = "root";
        $password = "";
        $hostname = "localhost"; 

        //connection to the database
        $dbhandle = mysql_connect($hostname, $username, $password) 
          or die("Unable to connect to MySQL");
           // echo "Connected to MySQL<br>";

    //select a database to work with
    $selected = mysql_select_db("deportes",$dbhandle) 
        or die("Could not select deportes");
    mysql_query("SET NAMES 'utf8'");

    //execute the SQL query and return records
    /*$result = mysql_query("SELECT id_deporte,deporte FROM deportes");
    
    //fetch tha data from the database 
    while ($row = mysql_fetch_array($result)) {
       echo "ID:".$row{'id_deporte'}." deporte:".$row{'deporte'}."<br>"; //display the results

    }

    $result = mysql_query("SELECT estado,fecha,hora,pista FROM eventos,pistas WHERE eventos.id_pista=pistas.id_pista and pistas.subdeporte = 'Frontón';");

    //fetch tha data from the database 
    while ($row = mysql_fetch_array($result)) {
       echo "Pista:".$row{'pista'}." fecha:".$row{'fecha'}." hora:".$row{'hora'}." estado:".$row{'estado'}."<br>"; //display the results

    }
    */
    if(!(isset($_GET['deporte']) && !empty($_GET['deporte']))){ //SE VERIFICA QUE TENEMOS EL GET 'DEPORTE', SI NO ESTÁ ENTRA AL IF
        ?>
          </div>
              </body>


              <?php
              //close the connection
              mysql_close($dbhandle);
      ?>
      </html>
<?php
        exit; 
    } //FIN IF NO GET


    $deporte=$_GET["deporte"];
    //echo $deporte;

    $dep = mysql_query("SELECT subdeporte FROM subdeportes WHERE subdeporte = '$deporte';");
            while ($de = mysql_fetch_array($dep)) {
                $deporte = $de{"subdeporte"};
        
            }

       // print_r($_POST);

    if(isset($_POST['inputDNI']) && !empty($_POST['inputDNI'])){ //SE VERIFICA QUE TENEMOS EL POST, SI ESTÁ ENTRA AL IF
        
        $inputDNI=$_POST['inputDNI'];
        $inputFecha=$_POST['inputFecha'];
        $inputHora=$_POST['inputHora'];
        if (isset($_POST['radioBono']) && $_POST['radioBono']==="bonoSi"){//SE COMPRUEBA SI SE RESERVA POR BONO
            $inputBono=$_POST['inputBono'];
            $sel = mysql_query("SELECT id_pista,clientes.id_cliente FROM pistas,subdeportes,clientes,bonos WHERE subdeportes.subdeporte = '$deporte' AND pistas.id_subdeporte = subdeportes.id_subdeporte AND dni='$inputDNI' AND bonos.id_bono=$inputBono;
");
            while ($se = mysql_fetch_array($sel)) {
                $id_pista = $se{"id_pista"};
                $id_cliente = $se{"id_cliente"};
        
            }
            $results=mysql_query("INSERT INTO `eventos` (`id_evento`, `estado`, `id_pista`, `fecha`, `hora`, `id_cliente`, `modo_pago`, `id_bono`) VALUES ('', 'Reservado', '$id_pista', '$inputFecha', '$inputHora', '$id_cliente', 'BONO', '$inputBono');");
            //print_r($results);
            //echo "INSERT INTO `eventos` (`id_evento`, `estado`, `id_pista`, `fecha`, `hora`, `id_cliente`, `modo_pago`, `id_bono`) VALUES ('', 'Reservado', '$id_pista', '$inputFecha', '$inputHora', '$id_cliente', 'BONO', '$inputBono');";
            echo "reserva con bono";
            
        }else if (isset($_POST['radioBono']) && $_POST['radioBono']==="bonoNo"){//SE COMPRUEBA SI SE RESERVA SIN BONO
            $inputNombre=$_POST['inputNombre'];
            $inputApellido=$_POST['inputApellido'];
            $inputTelefono=$_POST['inputTelefono'];
            $radioPago=$_POST['radioPago'];
            $radioLuz=$_POST['radioLuz'];
            if ($radioLuz!=1) $radioLuz=0;
            $results=mysql_query("INSERT INTO `clientes`(`id_cliente`, `nombre`, `apellidos`, `dni`, `telefono`, `id_bono`) VALUES ('','$inputNombre','$inputApellido','$inputDNI','$inputTelefono','');");
            
            $sel = mysql_query("SELECT id_pista,clientes.id_cliente FROM pistas,subdeportes,clientes,bonos WHERE subdeportes.subdeporte = '$deporte' AND pistas.id_subdeporte = subdeportes.id_subdeporte AND dni='$inputDNI';
");
            while ($se = mysql_fetch_array($sel)) {
                $id_pista = $se{"id_pista"};
                $id_cliente = $se{"id_cliente"};
        
            }
            $results=mysql_query("INSERT INTO `eventos` (`id_evento`, `estado`, `id_pista`, `fecha`, `hora`, `id_cliente`, `modo_pago`, `id_bono`, `iluminacion`) VALUES ('', 'Reservado', '$id_pista', '$inputFecha', '$inputHora', '$id_cliente', '$radioPago', '', '$radioLuz');");
            
            echo "reserva sin bono";
        }
        
    }


     ?>
           
      
      
    <div class="btn-group btn-group-justified">
      <a id="Dia1" class="btn btn-primary" onclick="botonFecha(id)">Lunes</a>
      <a id="Dia2" class="btn btn-primary" onclick="botonFecha(id)">Martes</a>
      <a id="Dia3" class="btn btn-primary" onclick="botonFecha(id)">Miercoles</a>
      <a id="Dia4" class="btn btn-primary" onclick="botonFecha(id)">Jueves</a>
      <a id="Dia5" class="btn btn-primary" onclick="botonFecha(id)">Viernes</a>
      <a id="Dia6" class="btn btn-primary" onclick="botonFecha(id)">Sábado</a>
      <a id="Dia7" class="btn btn-primary" onclick="botonFecha(id)">Domingo</a>
    </div>
      <h2 class="col-md-12" id="deporte"><?php echo $deporte; ?></h2>
    <div class="container col-md-6">
      <table class="table table-striped">
        <tr>
            <th>Hora</th>
            <?php
        $columnas = mysql_query("SELECT pista, precio, tiempo_reserva, precio_iluminacion, TIME_FORMAT(hora_apertura, '%H'),TIME_FORMAT(hora_cierre, '%H') FROM pistas WHERE subdeporte = '".$deporte."';");
            $num_pistas=0;
            while ($row = mysql_fetch_array($columnas)) {
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
            $hora_actual = $hora_apertura;

//$filas = mysql_query("SELECT estado,hora,pista FROM eventos,pistas WHERE fecha = '2015-08-26' and eventos.id_pista=pistas.id_pista and pistas.subdeporte = '".$deporte."';");
        while ($hora_actual<=$hora_cierre) {
        ?>
        </tr>
        <tr>
          <th class="col-md-1 col-xs-1"><?php echo $hora_actual.":00"; ?></th>
            <?php
            $fecha = date('Y-m-d');
            
            for ($pista_actual=1; $pista_actual<=$num_pistas; $pista_actual++) {
                $eventos = mysql_query("SELECT estado,pista FROM eventos,pistas WHERE fecha = '$fecha' and hora = '$hora_actual:00' and eventos.id_pista=pistas.id_pista and pistas.subdeporte = '".$deporte."' and pista = '$pista_actual';");
                $entra_evento=false;
                while ($evento = mysql_fetch_array($eventos)) {
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
                        <td class="col-md-3 col-xs-3"><button type="button" class="<?php echo $color; ?>" id="btn-H<?php echo $hora_actual; ?>-P<?php echo $pista_actual; ?>" onclick="botonHora(id)"><?php echo $evento{'estado'}; ?></button></td>
            <?php
                    
                }
                if (!$entra_evento){
                ?>
                <td class="col-md-3 col-xs-3"><button type="button" class="btn btn-success" id="btn-H<?php echo $hora_actual; ?>-P<?php echo $pista_actual; ?>" onclick="botonHora(id)">Libre</button></td>
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
    <div class="container col-md-6">
      <form onsubmit="return onSubmit()" method="post" action="">
        <div class="form-group">
          <label for="inputFecha">Fecha y hora de la reserva</label>
          <input type="text" id="inputFecha" name="inputFecha" readonly><input type="text" id="inputHora" name="inputHora" id="inputHora" readonly>
        </div>
          <p><b>Duración de la reserva: </b><?php echo "$duracion_reserva h"; ?></p>
        <div class="form-group">
          <label for="inputDNI">DNI</label>
          <input type="text" class="form-control" id="inputDNI" name="inputDNI" placeholder="12345678X">
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="radioBono" id="radioBono1" value="bonoNo" onclick="sinbonoSelect()">
            Reservar sin bono
          </label>
        </div>
        <div id="sinBonoDiv" style="display: none">
          <div class="form-group">
            <label for="inputNombre">Nombre</label>
            <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Juan">
          </div>
          <div class="form-group">
            <label for="inputApellido">Apellido</label>
            <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Pérez Gómez">
          </div>
          <div class="form-group">
            <label for="inputTelefono">Teléfono</label>
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
          <div class="checkbox" id="radioPago">
            <label>
              <input type="radio" name="radioPago" value="Paypal"> Paypal
            </label>
            <label>
              <input type="radio" name="radioPago" value="PagoEntrada"> Pago en la entrada
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
          <label for="inputBono">Bono</label>
          <input type="number" class="form-control" id="inputBono" name="inputBono" placeholder="12345">
        </div>
          <label for="checkJuegoSocial">Formas de pago:</label>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="checkJuegoSocial" name="checkJuegoSocial" onclick="juegoSocial()">Juego social
            </label>
          </div>
          
          
          <div id="juegoSocial" style="display: none">
              <div class="form-group">
                <label for="inputSGJugadores">Jugadores actuales</label>
                <input type="number" class="form-control" id="inputSGJugadores" name="inputSGJugadores" placeholder="2">
              </div>
                <div class="form-group">
                <label for="inputSGJugadoresTotales">Jugadores totales</label>
                <input type="number" class="form-control" id="inputSGJugadoresTotales" name="inputSGJugadoresTotales" placeholder="4">
               </div>
              <div class="form-group">
                <label for="inputSGInformacion">Información</label>
                  <textarea class="form-control" id="inputSGInformacion" name="inputSGInformacion" rows="5" placeholder=""> </textarea>
               </div>
          </div>
          
          
        <button type="submit" class="btn btn-default">Reservar</button>
        <h1 class="col-md-12" id="mensajeReserva"></h1>
      </form>
    </div>
  </div>
</body>


<?php
//close the connection
mysql_close($dbhandle);
?>
</html>
