//Clase Clase
//

//constructor que pasando el puntero tBody crea una instancia
//del objeto clase
function Clase (tBody){
    this.tabla=tBody;
    this.usuarios= [];
    this.orden ={variable:"nombre",creciente:true};

}

//metodo para añadir objetos usuario a la clase
Clase.prototype.anade=function(usuario){
    this.usuarios.push(usuario);
}

//metodo que ordena los usuarios que hay en la case a traves de la prodiedad deseada
//nomColumna es la propiedad por la que se desea ordenar
Clase.prototype.ordena=function(){
    var nombColumna = this.orden.variable;
    var orden=(this.orden.creciente)?1:-1;
    this.usuarios.sort(function(a,b){ 
        return a[nombColumna].localeCompare(b[nombColumna]) * orden});
        this.orden[nombColumna] =! this.orden[nombColumna];
}

//metodoo sincroniza el contenio de tBody con los usuarios
//en la situacion actual
Clase.prototype.pinta=function(){
    var tBodyInnerHTML = "";
    var tamano=this.usuarios.length;
    for(let i=0; i< tamano ;i++){
        tBodyInnerHTML+=this.usuarios[i].nombre.toFila(i);
    }
    this.tabla.innerHTML=tBodyInnerHTML;
}

//metodo para borrar el usuario

Clase.prototype.borra=function(ind){
    this.usuarios.splice(ind,1);
}

//metodo para editar el usuario
Clase.prototype.edita=function(ind){
    this.usuarios.splice(ind,1);
}