
function sucesso(){
$(document).ready(function(){
	iziToast.success({
		    icon: 'fa fa-check',
			title:'Sucesso!',
		    message: 'Procedimento realizado com sucesso'
	})
});
}


function erro(){
$(document).ready(function(){
	iziToast.error({
		    icon: 'fa fa-exclamation-triangle',
			title:'Erro',
		    message: 'Erro ao realizar o procedimento'
	})
});
}