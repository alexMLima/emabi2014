function atualizarDataPagamento(t, op) {
    
    ajax = ajaxInit();

    var datapgto = document.getElementById("dtpgto_" + t).value;

    if (op == 'N')
        document.getElementById("dtpgto_" + t).value = "";

    if(ajax) {
        ajax.open("GET", "conferir_pagto.php?id=" + t + "&op=" + op + "&dt=" + datapgto, true);
        ajax.onreadystatechange = function() {
            if(ajax.readyState == 4) {
                if(ajax.status == 200) {
                    var texto = ajax.responseText;
                    texto=texto.replace(/\+/g," ")
                    texto=unescape(texto)
                    document.getElementById("pago_" + t).innerHTML = texto;
                    alert("Data atualizada com sucesso!");
                } else {
                    alert(ajax.statusText);
                }
            }
        }
        ajax.send(null);
    }
}
