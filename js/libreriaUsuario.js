//metodo para activar/desactivar ediccion

HTMLTableElement.prototype.activadaEdiccion = true;

//metodo que convierte la tabla en editar

HTMLTableElement.prototype.editable=function(){
    var tabla = this;
    var thead = tabla.querySelector("thead");
    thead.addEventListener("dblclick", function(){
        if (!tabla.activadaEdiccion){
            tabla.editar();

        }else{
            tabla.desEditar();
        }
        tabla.activadaEdiccion=!tabla.activadaEdiccion;
    })
}

HTMLTableElement.prototype.editar=function(){
    var tabla = this;
    var tHead = tabla.querySelector("thead");
    var tBody = tabla.querySelector("tbody");
    var th=document.createElement("th");
    th.setAttribute("rowspan", tHead.rows.length);
    th.className="AutomaticCreateByEditTable";
    th.innerHTML="Ediccion";
    tHead.rows[0].appendChild(th);
    for (let i=0; i<tBody.rows.length; i++){
        let celda = document.createElement("td");
        let borrar=document.createElement("span");
        borrar.innerHTML="X";
        borrar.onclick= function(){
            this.parentElement.parentElement.eliminar();
        }
        let editar=document.createElement("span");
        editar.innerHTML="E";
        editar.onclick= function(){
            this.parentElement.parentElement.editar();
        }
        let subir=document.createElement("span");
        subir.innerHTML="S";
        subir.onclick= function(){
            this.parentElement.parentElement.subir();
        }
        let bajar=document.createElement("span");
        bajar.innerHTML="B";
        bajar.onclick= function(){
            this.parentElement.parentElement.bajar();
        }
        celda.appendChild(borrar);
        celda.appendChild(editar);
        celda.appendChild(subir);
        celda.appendChild(bajar);
        th.className="AutomaticCreateByEditTable";
        tBody.rows[i].appendChild(celda);
    }
}
HTMLTableElement.prototype.desEditar=function(){
    var tabla = this;
    var tdsMios= this.getElementsByClassName("AutomaticCreateByEditTable");
    var tamano= tdsMios.length;
    for (let i=0; i<tamano; i++){
        tdsMios[0].parentElement.removeChild(tdsMios[0]);
    }
}

HTMLTableRowElement.prototype.subir=function(){
    var anterior=this.previousElementSibling;
    if(anterior!==null){
        this.parentElement.insertBefore(this,anterior);
    }
}
HTMLTableRowElement.prototype.bajar=function(){
    var siguiente=this.nextElementSibling;
    if(siguiente!==null){
        this.parentElement.insertBefore(siguiente,this);
    }
}

HTMLTableRowElement.prototype.eliminar=function(){
    this.parentElement.removeChild(this);
}
HTMLTableRowElement.prototype.editar=function(){
    var celda= this.cells;
    var tamano= celda.length;
    for (let i=0; i<tamano; i++){
        if (celda[i].className!=="AutomaticCreateByEditTable"){
            celda[i].editar();
        }
    }
}

HTMLTableCellElement.prototype.editar=function(){
    if(this.estaEditada===undefined || this.estaEditada===false){
        var txtValor = document.createElement("input");
        txtValor.type="text";
        txtValor.value=this.innerHTML;
       
        txtValor.addEventListener("keypress", function (ev){
            var celda = this.parentElement;
            if (ev.key==="Enter"){
                celda.estaEditada=false;
                celda.innerHTML=this.value;
            }
        })
        this.innerHTML="";
        this.estaEditada=true;
        this.appendChild(txtValor);
    }
}

window.addEventListener("load", function(){
    var tablas = this.document.querySelectorAll("table.editable");
    for (let i=0; i<tablas.length; i++)
    tablas[i].editable();
})