function enviarCartaAceite(t) {

    ajax = ajaxInit();
    if(ajax) {
        ajax.open("GET", "enviarCartaAceite.php?idt=" + t, true);
        ajax.onreadystatechange = function() {
            if(ajax.readyState == 4) {
                if(ajax.status == 200) {
                    var texto = ajax.responseText;
                    texto=texto.replace(/\+/g," ")
                    texto=unescape(texto)

                    document.getElementById("dataenvio_" + t).innerHTML = texto;
                    alert("Carta enviada com sucesso!");
                } else {
                    alert(ajax.statusText);
                }
            }
        }
        ajax.send(null);
    }
}
