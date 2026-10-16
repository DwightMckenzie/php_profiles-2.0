$(document).ready(function () {
	/* login selection */
	$(function () {
		$('#user-form-link').click(function (e) {
			e.preventDefault();
			$("#user-form").delay(100).fadeIn(100);
			$("#register-form, #admin-form").fadeOut(100);
			$('#register-form-link, #admin-form-link').removeClass('active');
			$(this).addClass('active');
		});
		$('#admin-form-link').click(function (e) {
			e.preventDefault();
			$("#admin-form").delay(100).fadeIn(100);
			$("#register-form, #user-form").fadeOut(100);
			$('#register-form-link, #user-form-link').removeClass('active');
			$(this).addClass('active');
		});
		$('#register-form-link').click(function (e) {
			e.preventDefault();
			$("#register-form").delay(100).fadeIn(100);
			$("#user-form, #admin-form").fadeOut(100);
			$('#user-form-link, #admin-form-link').removeClass('active');
			$(this).addClass('active');
		});
	});
    
});