function solicitar(id) {
    var output = "<span class=\"bg-orange padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Pendiente</span>";
    for (i=0; i < id.length; i++){
        document.getElementById(id[i]).innerHTML=output;
    }

    /**
     * document.getElementById(id).innerHTML=output)
     */
}
function solicitarHora(id){
    alert("La solicitud se ha realizado correctamente.");
    var output= $Pendiente="<td id=\"$id\"> <span class=\"bg-orange padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Pendiente</span> </td>";
    document.getElementById(id).innerHTML=output;
}
