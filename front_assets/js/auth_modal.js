$(function(){

	$(document).on('click', '#btnLoginModal', function(){
		console.log('hello world');
		$('#loginmodal').modal('show');
		
		$("#logForm").validetta({
			showErrorMessages : true,
			errorClass : 'validetta-error',
			realTime : true,
		});
		
	});

	$(document).on('click', '#btnRegisterModal', function(){

		// console.log('hello world');
		$('#regmodal').modal('show');
		$("#regForm").validetta({
			showErrorMessages : true,
			errorClass : 'validetta-error',
			realTime : true,
		});
	});

	$(document).on('click', '#newReg', function(){

		// console.log('hello world');
		$('#loginmodal').modal('hide');
		$('#regmodal').modal('show');
		$("#regForm").validetta({
			showErrorMessages : true,
			errorClass : 'validetta-error',
			realTime : true,
		});
	});

	$(document).on('click', '#newLog', function(){

		// console.log('hello world');
		$('#regmodal').modal('hide');
		$('#loginmodal').modal('show');
		$("#logForm").validetta({
			showErrorMessages : true,
			errorClass : 'validetta-error',
			realTime : true,
		});
	});

});
