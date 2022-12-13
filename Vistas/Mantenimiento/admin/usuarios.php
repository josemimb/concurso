<?php
    // logica para crear concurso
    $newConcurso = new RepoConcurso($conexion);

    if(isset($_POST['crear'])){
        $id = $usuarioData-> getId();
        $nombre = $_POST['nombre'];
        $distintivo = $_POST['distintivo'];
        $descripcion = $_POST['descripcion'];
        $inscripcion_inicio = $_POST['inscripcion_inicio'];
        $inscripcion_fin = $_POST['inscripcion_fin'];
        $inicio_concurso = $_POST['inicio_concurso'];
        $fin_concurso = $_POST['fin_concurso'];

        $succes = $newConcurso-> crear($id, $nombre, $distintivo, $descripcion, $inscripcion_inicio, $inscripcion_fin, $inicio_concurso, $fin_concurso);

        if($succes){
            header ("location: ?menu=administrador");
        }
    }

    if(isset($_POST['botonEliminar'])){
        echo 'borraaaaaaaaar';
        $id = $_POST["id"];
        $succes = $newConcurso->borrar($id);
        if($succes){
            header ("location: ?menu=administrador");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script>var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})</script> -->
<script type="text/javascript">
// function actualizar(){location.reload(true);}
// //Función para actualizar cada 5 segundos(5000 milisegundos)
// setInterval("actualizar()",5000);
//window.location.reload();
</script>
<script type="text/javascript">

    
Paginador = function(divPaginador, tabla, tamPagina)
{
    this.miDiv = divPaginador; //un DIV donde irán controles de paginación
    this.tabla = tabla;           //la tabla a paginar
    this.tamPagina = tamPagina; //el tamaño de la página (filas por página)
    this.pagActual = 1;         //asumiendo que se parte en página 1
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina); //¿?
 
    this.SetPagina = function(num)
    {
        if (num < 0 || num > this.paginas)
            return;
 
        this.pagActual = num;
        var min = 1 + (this.pagActual - 1) * this.tamPagina;
        var max = min + this.tamPagina - 1;
 
        for(var i = 1; i < this.tabla.rows.length; i++)
        {
            if (i < min || i > max)
                this.tabla.rows[i].style.display = 'none';
            else
                this.tabla.rows[i].style.display = '';
        }
        this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
    }
 
    this.Mostrar = function()
    {
        //Crear la tabla
        var tblPaginador = document.createElement('table');
 
        //Agregar una fila a la tabla
        var fil = tblPaginador.insertRow(tblPaginador.rows.length);
 
        //Ahora, agregar las celdas que serán los controles
        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn'; //con eso le asigno un estilo
        var self = this;
        ant.onclick = function()
        {
            if (self.pagActual == 1)
                return;
            self.SetPagina(self.pagActual - 1);
        }
 
        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';
 
        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn';
        sig.onclick = function()
        {
            if (self.pagActual == self.paginas)
                return;
            self.SetPagina(self.pagActual + 1);
        }
 
        //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
        this.miDiv.appendChild(tblPaginador);
 
        //¿y esto por qué?
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
            this.paginas = this.paginas + 1;
 
        this.SetPagina(this.pagActual);
    }
}
</script>

  </head>
<body> 
<?php
        require_once './Vistas/Principal/headerAdmin.php';
    ?>
   
    <h1>Pantalla del administrador</h1> 

    <div class="contenedor">
            <div class="header--table">
                <h1 class="tittle">Alta de Usuarios</h1>
                <button id="añadir" name="añadir" class="button"><i class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo</button>

            </div>
            <br>
            <div class="error_box" id="error_box">
                <!-- <p>Se ha producido un error.</p> -->
            </div>
            <table class="editable resultado tblDatos table table-striped table-hover" >
           <thead>
               <tr>
                   <th id="id">ID</th>
                   <th>INDICATIVO</th>
                   <th>EMAIL</th>
                   <th>LOCALIZACION</th>
                   <th>IMAGEN</th>
                   <th>NOMBRE</th>
                   <th>CONTRASEÑA</th>
                   <th>ROL</th>
               </tr>
           </thead>
           <tbody id="cuerpoTabla">
            </tbody>
        
      </table> 
      <div id="paginador"></div>
<table border="1" align="center" id="tblDatos">
  <tbody id="cuerpoTabla">

</tbody>
    
    </table>
    <!-- <script type="text/javascript">
    var p = new Paginador(
        document.getElementById('paginador'),
        document.getElementById('tblDatos'),
        4
    );
    p.Mostrar();
    </script> -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>
    <!-- Vertically centered modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
    </div>
</body>
</html>