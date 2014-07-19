function buscaEstados()
{
	var uf = document.getElementById('uf');
	
	var op = document.createElement('option');
    op.setAttribute('value', '');
    op.appendChild(document.createTextNode("Carregando..."));
    uf.appendChild(op);
	
	var ajax = openAjax();
	
	ajax.open('GET', 'scripts/funcoes.php?acao=buscaEstados', true);
	
	ajax.onreadystatechange = function()
	{
		if (ajax.readyState == 4)
		{
			if (ajax.status == 200)
			{
				uf.innerHTML = '';
				
				var opcao = document.createElement('option');
				opcao.setAttribute('value', '');
				opcao.appendChild(document.createTextNode('Selecione'));
				uf.appendChild(opcao);
				
				var xml = ajax.responseXML;
				var estado = xml.getElementsByTagName('estado');
				
				for (var i = 0; i < estado.length; i++)
				{
					var idEstado = estado[i].getElementsByTagName('id')[0].firstChild.nodeValue;
					var siglaEstado = estado[i].getElementsByTagName('sigla')[0].firstChild.nodeValue;
					var nomeEstado = estado[i].getElementsByTagName('nome')[0].firstChild.nodeValue;
					
					var opcao = document.createElement('option');
					opcao.setAttribute('value', idEstado);					
					opcao.appendChild(document.createTextNode(siglaEstado + ' - ' + nomeEstado));
					uf.appendChild(opcao);
					
				}
				
			}
		}
	}
    ajax.send(null);
    
}




function buscaCidades(uf)
{
	var cidades = document.getElementById('cidade');
	cidades.innerHTML = '';
	var op = document.createElement('option');
    op.setAttribute('value', '');
    op.appendChild(document.createTextNode("Carregando..."));
    cidades.appendChild(op);
	
	var url = 'scripts/funcoes.php?acao=buscaCidades&uf=' + uf;
	var ajax = openAjax();
	
	ajax.open('GET', url, true);
	ajax.onreadystatechange = function()
	{
		if (ajax.readyState == 4)
		{
			if (ajax.status == 200)
			{
				cidades.innerHTML = '';
				
				var xml = ajax.responseXML;
				var cidade = xml.getElementsByTagName('cidade');
				
				for (var i = 0; i < cidade.length; i++)
				{
					var idCidade = cidade[i].getElementsByTagName('id')[0].firstChild.nodeValue;
					var nomeCidade = cidade[i].getElementsByTagName('nome')[0].firstChild.nodeValue;
					
					var opcao = document.createElement('option');
					opcao.setAttribute('value', idCidade);
					opcao.appendChild(document.createTextNode(nomeCidade));
					cidades.appendChild(opcao);
				}
			}
		}
	}
	ajax.send(null);
}

function carregaInfo(t) {
 var ajax = openAjax();

 if(ajax) {
   ajax.open("GET", "carregaMinicurso.php?id=" + t, true);
   ajax.onreadystatechange = function() {
     if(ajax.readyState == 4) {
       if(ajax.status == 200) {
          	var texto = ajax.responseText;
			texto=texto.replace(/\+/g," ")
            texto=unescape(texto)

		  document.getElementById("info").innerHTML = texto;
       } else {
         alert(ajax.statusText);
       }
     }
   }
   ajax.send(null);
 }
}