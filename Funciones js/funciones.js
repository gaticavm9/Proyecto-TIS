var aux=0;

function mostrar_menu(){
    var x = document.getElementById('mymenu');
    if (x.style.display == 'block'){
        x.style.display = 'none';
        console.log("menu display none");
    }
    else{
        x.style.display = 'block';
        console.log("menu display block");
    }
}

function mostrar_animado(){
    var x = document.getElementById('mymenu');
    if(aux==0){
        x.style.transition = "all 1s";
        x.style.transform = "translate3d(0%,0,0)";
        aux=1;
        console.log("desplegado");
    }
    else{
        x.style.transition = "all 1s";
        x.style.transform = "translate3d(-100%,0,0)";
        aux=0;
        console.log("oculto");
    }
    
}

function cambio(elemento){
    if ($(elemento).val() === "") {
      $(elemento).css("background-color", "");
    }
    else{
      $(elemento).css("background-color", "blue");
    }
  }




