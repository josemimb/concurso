<?php
    $newCuenta = new Cuenta ($conexion);
   
    if (isset($_POST["submitButton"])){
        $indicativo = $_POST["indicativo"];
        $email = $_POST["email"];
        $localizacion = $_POST["localizacion"];
        $imagen = $_POST["imagen"];
        //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        //$roles = $_POST["roles"];
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $rol = $_POST["rol"];

        //echo $nombre;

        $listo = $newCuenta->registrar ($indicativo, $email, $localizacion, $imagen, $nombre, $contraseña, $rol);


        if ($listo) {
            header("Location: ?menu=usuario");
        } else {
            echo "no se registro";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script>
        window.addEventListener("load", function(){
    const boton=document.getElementById("snap");
    const video=document.getElementById("video");
    const canvas=document.getElementById("canvas");

    const constraints = {
        audio: true,
        video: {
          width: 250, height: 250
        }
      };
      
      // Access webcam
      async function init() {
        try {
          const stream = await navigator.mediaDevices.getUserMedia(constraints);
          handleSuccess(stream);
        } catch (e) {
          errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        }
      }
      
      // Success
      function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;
      }
      // Load init
        init();
    // Draw image
    var context = canvas.getContext('2d');
    snap.addEventListener("click", function() {
            context.drawImage(video, 0, 0, 250, 250);
    });

    boton.addEventListener("click", function(){
        var ctx=canvas.getContext("2d");
        var imagen=document.createElement("img");
        imagen.setAttribute("src","./img/coche.jpg");
        imagen.addEventListener("load", function(){
        ctx.drawImage(imagen, 0, 0, 250, 250);
        })
    })
})
		function findMe(){
			var output = document.getElementById('map');
			// Verificar si soporta geolocalizacion
			if (navigator.geolocation) {
				output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
			}else{
				output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion</p>";
			}
			//Obtenemos latitud y longitud
			function localizacion(posicion){

				var latitude = posicion.coords.latitude;
				var longitude = posicion.coords.longitude;

				//var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+latitude+","+longitude+"&size=600x300&markers=color:red%7C"+latitude+","+longitude+"&key=YOUR_API_KEY";

				output.innerHTML ="<p>latitud: "+ latitude+"<br> Longitud:"+latitude+"</p>";
                var input = document.createElement("div");
                input.innerHTML = latitude + longitude;
                input.appenchild();
				

			}

			function error(){
				output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";

			}

			navigator.geolocation.getCurrentPosition(localizacion,error);

		}
	</script>
</head>
<body>
<?php
        require_once './Vistas/Principal/headerLogin.php';
    ?>
        <div class="contenedor">
        <button onclick="findMe()">Mostrar ubicación</button>
	
            <div class="contenedor2">
            
                <form action="#" method="POST" enctype="multipart/form-data">
                <i style="margin-left:30% " class="fa-solid fa-user fa-8x"></i>
                <p></p>
                <h1>Registrate</h1>
                <br>
                <label for="nombre">Nombre</label><br>
                <input type="text" class="form-input" name="nombre" placeholder="Ingresa nombre completo" size="35" required> <br>
                <label for="email">Email</label><br>
                <input type="email" class="form-input" name="email" placeholder="josemimb@gmail.com" size="35" required> <br>
                <label for="indicativo">Indicativo</label><br>
                <input type="text" class="form-input" name="indicativo" placeholder="DD2DDD" aria-label="Utiliza el formato DD2DDD" title="Formato DD2DDD" pattern="^[A-Z]{2}[0-9](?:[A-Z]|[A-Z]{2}|[A-Z]{3})$" required> <br>
                <label for="localizacion">Localizacion</label><br>
                <div id="map"></div>
                <input type="text" class="form-input" name="localizacion" placeholder="Localizacion" size="35" required > <br> 
                <!-- <iframe style="margin:20px" name="localizacion" id="localizacion" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25227.38349408476!2d-3.814374576008666!3d37.78012697364766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6dd713cb5302c7%3A0x9cfb2c858b405702!2zSmHDqW4!5e0!3m2!1ses!2ses!4v1667941256946!5m2!1ses!2ses" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> <br> -->
                <label for="imagen">Imagen</label><br>
                <input type="text" class="form-input" name="imagen" placeholder="imagen" size="35" required> <br>
                <!-- Stream video via webcam -->
                <div class="video-wrap">
                    <video id="video" playsinline autoplay></video>
                </div>
                <!-- Trigger canvas web API -->
                <div class="controller">
                    <button id="snap">Capturar Foto</button>
                </div>
                <!-- Webcam video snapshot -->
                <canvas id="canvas" width="250" height="250"></canvas>
                <label for="contraseña">Contraseña</label><br>
                <input type="text" class="form-input" name="contraseña" size="35" required> <br>
                <input type="hidden" class="form-input" name="rol" placeholder="rol" value="2" size="35" required> <br>
                <button style="margin-left:30% " type="submit" name="submitButton">Crear Cuenta</button>
                </form>
            </div>
        </div>
</body>
</html>