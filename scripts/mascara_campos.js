function aplicaMascara(campo,event, mascara) {
    if (event.keyCode >= 46||event.keyCode == 8){   
        position = campo.selectionStart;
        valor = campo.value;
        v = event.keyCode;
        m = mascara.charAt(position);
        c = campo.value.charAt(position);    
        //Verifica se a mascara é para numero e se o valor inserido tb é 
        if (((m == '9')||(m == '0'))&&((event.keyCode >= 48 && event.keyCode <= 57)                
            ||(event.keyCode >= 96 && event.keyCode <= 105)))  {  
            if (c != '')  {
                valor = atualizaValor(valor,position,'');
                document.getElementById(campo.id).value = valor;
                setCursorPosition(campo,position,position);
            }            
        //Verifica se a mascara é para texto e se o valor inserido tb é 
        } else if ((m == '#')&&(event.keyCode >= 65 && event.keyCode <= 90))  {  
            if (c != '')  {
                valor = atualizaValor(valor,position,'');
                document.getElementById(campo.id).value = valor;
                setCursorPosition(campo,position,position);
            }            
        } else {  
            if (m=='')  {
                return false;
            //Trata o valor caso o usuario pressione DEL, para nao sair da estrutura
            } else if (event.keyCode == 46)  {
                for (del = position ;del < campo.selectionEnd ; del ++)  {
                       valor = atualizaValor(valor,del,' ')
                }
                 document.getElementById(campo.id).value = valor;
                 setCursorPosition(campo,position,position);
                return false;
            //Trata o valor caso o usuario pressione Backspace, para nao sair da 
            // estrutura
            } else if(event.keyCode == 8){
                valor = atualizaValor(valor,position-1,' ');
                document.getElementById(campo.id).value = valor;
                setCursorPosition(campo,position-1,position-1);
                return false;
            } else if ((m != '0')&&(m != '9')&&(m != '#')) {
                //insere o saparador ou digito especial no texto
                valor = atualizaValor(valor,position,m);
                //verifica se o proximo campo da mascara atende as caracteristicas 
                // do valor inserido
                if (((mascara.charAt(position+1) == '9')
                      ||(mascara.charAt(position+1) == '0'))
                    &&((event.keyCode >= 48 && event.keyCode <= 57) 
                      ||(event.keyCode >= 96 && event.keyCode <= 105)))  {  
                    if (c != '')  {
                        valor = atualizaValor(valor,position+1,'');
                        document.getElementById(campo.id).value = valor;
                        setCursorPosition(campo,position+1,position+1);
                    }            
                } else if ((mascara.charAt(position+1) == '#')
                            &&(event.keyCode >= 65 && event.keyCode <= 90))  {  
                    if (c != '')  {
                        valor = atualizaValor(valor,position+1,'');
                        document.getElementById(campo.id).value = valor;
                        setCursorPosition(campo,position+1,position+1);
                    }            
                }  else {
                    return false;
                }              
            } else {
                return false;
            }
        }
        document.getElementById(campo.id).value = valor;  
    }
}    

//Recebe um texto e substitui o valor passado na posicao indicada
function atualizaValor(texto,posicao,valor){
    var novoTexto = "";
    for (i = 0; i <= texto.length; i++) {
        if (i == posicao)  {
            novoTexto =   novoTexto + valor;             
        } else {
            v = texto.charAt(i);
            novoTexto =   novoTexto + v; 
        }
    }
    return novoTexto;
}

//Seta o cursor para a posicao desejada no campo
function setCursorPosition(oInput,oStart,oEnd) {
    if( oInput.setSelectionRange ) {
        oInput.setSelectionRange(oStart,oEnd);
    } else if( oInput.createTextRange ) {
        var range = oInput.createTextRange();
        range.collapse(true);
        range.moveEnd('character',oEnd);
        range.moveStart('character',oStart);
        range.select();
    }
}