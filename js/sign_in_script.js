let UIController=function(){

	$('#new_register').on('click',()=>{
	$('#new_register').fadeOut();
	$('#sign_up_page').fadeIn();
	});

	$('#back').on('click',()=>{
	$('#new_register').fadeIn();
	$('#sign_up_page').fadeOut();
	});

}();

