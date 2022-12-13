<?php
    $newRepoConcurso = new RepoConcurso($conexion);


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $newConcurso = new Concurso($conexion, $id);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
var end = new Date('<?php echo $newConcurso->getFin_concurso()?> ');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'CONCURSO TERMINADO!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = days + ' dias, ';
        document.getElementById('countdown').innerHTML += hours + ' horas, ';
        document.getElementById('countdown').innerHTML += minutes + ' minutos y ';
        document.getElementById('countdown').innerHTML += seconds + ' segundos';
    }

    timer = setInterval(showRemaining, 1000);
</script>
</head>
<body>
<?php
        require_once './Vistas/Principal/headerUser.php';
    ?>

    <h1>Listado de mis concursos</h1>

    <nav>
        
    </nav>


            <!-- <div id="countdown"></div>

            <h1>El concurso termina el dia  <?php echo $newConcurso->getFin_concurso()?> </h1>


            <div class="contenedor2">
            <form action="#" method="POST">
            <h1>El concurso termina el dia  <?php echo $newConcurso->getFin_concurso()?> </h1>
            
            
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>  ">

            <button type="submit" name="inscripcion" >Inscribete</button>
            
        </form>
        </div> -->
         
    
</body>
</html>