<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reserva deportes Mislata</title>
  <meta name="description" content="An interactive getting started guide for Brackets.">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="/styles/style.css">
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="/bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
    <?php include_once("analyticstracking.php") ?>
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
          <li><a href="/reserva.html" >Reservar ahora</a></li>
            <li><a href="/faq.html" >¿Preguntas frecuentes?</a></li>
          
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    
    <div>
        <p>Para reservar en la plataforma solo hay que seguir los siguientes pasos. Es un proceso muy rápido e intuitivo, para que el
        ciudadano solo tenga que utilizar su tiempo en disfrutarlo como quiera.</p>
        <ol>
            <li>En la ventana principal aparece un carrousel con imágenes de las instalaciones. <br>
                Al hacer clic en "¡Reservar ahora!" entrará en la página de reservas.
            </li>
            <li>En el menú superior deberá elegir el deporte/pista que quiere reservar.
            </li>
            <li>Una vez hace clic en el deporte aparecerá la tabla con el horario de reservas para el dia de hoy. <br>
                Ahora deberá clicar en el dia que desea reservar. (La tabla con los horarios se actualizará)
            </li>
            <li>Ahora seleccione la hora y la pista (si hay varias) que desea reservar. <br>
                En la tabla verá casillas en distintos colores: <br>
                <ul>
                    <li>Verde (Libre): Significa que a esa hora, esa pista está disponible.</li>
                    <li>Amarillo (Ocupado): Significa que esa hora en esa pista está reservada por otro usuario. </li>
                    <li>Rojo (cerrado): Indica que la pista no se puede utilizar.</li>
                    <li>Azul (libre): Significa que el usuario la ha marcado para reservar pero todavía no ha confirmado la reserva.</li>
                    <li>Azul (Reservado): Significa que el usuario ha confirmado la reserva y por tanto otro usuario no puede reservar a dicha hora.</li>
                </ul>
            </li>
            <li>
                Ahora tienes dos opciones: 
                <ul> 
                    <li><p>Reservar con bono:</p>
                        <p>Simplemente se debe insertar el DNI <strong>con letra</strong>.<br>
                        Después el número de bono.</p>
                    </li>    
                    <li><p>Reservar sin bono:</p>
                        <p>Insertar el DNI <strong>con letra</strong>.<br>
                        Nombre, apellidos y teléfono de contacto.</p>
                        <p>A diferencia que con la reserva con bono esta se debe pagar por cada reserva. Actualmente existen 3 métodos:
                            <ul>
                                <li>Paypal: Pago por el sistema Paypal.</li>
                                <li>TPV: Pago por transferencia bancaria.</li>
                                <li>Pago en la entrada: Se debe llegar con unos minutos de antelación a la hora reservada para pagar la reserva                                         en la propia pista.</li>
                            </ul>
                        </p>
                    </li> 
                </ul>
                Una vez se han completado los pasos anteriores se clica en "Reservar" y en la tabla de reserva aparecerá el recuadro seleccionado en color azul y con el texto "Reserado".
            </li>
        </ol>
    Estos son todos los pasos para reservar las instalaciones municipales.
    </div>