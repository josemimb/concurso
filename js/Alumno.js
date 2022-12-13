/*
    Clase Usuario 
    Constructor que pasandole nombre, contrasena,rol
    crea un objeto Usuario
*/
    function Usuario(indictavio, email,localizacion,imagen,nombre,contrasena,rol) {
        this.indictavio=indictavio;
        this.email=email;
        this.localizacion=localizacion;
        this.imagen=imagen;
        this.nombre=nombre;
        this.contrasena=contrasena;
        this.rol=rol;
    }

//metodo toFila que genera el html de la fila para ese Usuario
    Usuario.prototype.toFila=function(ind){
        return "<tr><td>"
                        +this.indictavio+"</td><td>"+
                        this.email+"</td> <td>"+
                        this.localizacion+"</td>" +
                        this.imagen+"</td>" +
                        this.nombre+"</td>" +
                        this.contrasena+"</td>" +
                        this.rol+"</td>" +
                        "<td><span onclick='clase.borra("+ind+");clase.pinta()'>❌ </span>"+
                        "<span onclick='editar("+ind+");'> ✍</span></td>"+
                       // "<td style="display:none"> </td>+;
                        "<tr>";
    }

   // document.getElementById('tbody').innerHTML;

    var yo =new Usuario("josemi","martin","berlango");
    yo.toFila()
