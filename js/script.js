var $total_selected = 0;
var $input;
$(document).ready(function(){

	$total_selected = $('.minicursos_selected > ul > li:not(#empty)').length;
	if( $('#minicursos').length > 0 ){
		
		if( $total_selected > 0 ){
			setMinicursos();	
		}
		
		$('.minicursos_selected > ul > li').each(function(index, elem){
			$id = $(elem).data('id');
			$('#minicursos .to_select > li[data-id="'+$id+'"]').hide();
		});
		
		
		$input = $('input[name="minicursos"]');
		$selected_container = $('.minicursos_selected > ul');
		$to_container = $('.to_select');
		$('#minicursos .to_select > li').click( function(){
			if( $total_selected < 2 ) {
				$clone = $(this).clone();
				if( $total_selected == 0 ){
					setEmpty();
				}
				$selected_container.append( $clone );
				$(this).hide();
				$total_selected++;
				
				setMinicursos();
				// console.log( $total_selected );
			}
		});
	}
});

function setMinucursosValue(){
	$input = $('input[name="minicursos"]');
	$current = $input.val('');
	$value = '';
	$('.minicursos_selected ul li').each(function(index, elem){
		if( index > 0 ){
			$value += ',';
		}
		$value += $(elem).data('id');
	});
	$input.val( $value );
}

function setMinicursos(){
	setMinucursosValue();
	$('.minicursos_selected ul > li').unbind().click( function(){
		$parent = $('li[data-id='+$(this).data('id')+']');
		$parent.fadeIn('fast');
		$total_selected--;
		$(this).remove();
		
		if( $total_selected == 0 ){
			setEmpty();	
		}
		setMinucursosValue();	
	});	
}

function setEmpty(){
	console.log( $( 'li#empty' ) );
	if( $( 'li#empty' ).length > 0 ){
		$( 'li#empty' ).remove();
	} else {
		$('.minicursos_selected ul').append('<li id="empty">Nenhum minicurso selecionado</li>');
	}
}