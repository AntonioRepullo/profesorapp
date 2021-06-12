function solicitar(id) {
    var output = "<span class=\"bg-orange padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Pendiente</span>";
    console.log(id);
    for (i=0; i < id.length; i++){
        document.getElementById(id[i]).innerHTML=output;
    }

    /**
     * document.getElementById(id).innerHTML=output)
     */
}
