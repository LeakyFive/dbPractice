$(document).on('click', '.edit-button', function() {
	let line = $(this).parent().parent().parent();
	let inputs = line.find('input[disabled]');
	inputs.prop('disabled', false);
	line.find('.icons-ed-del').hide();
	line.find('.icons-сonf-canc').show();
});

$(document).on('click', '.cancel-button', function() {
	let line = $(this).parent().parent().parent();
	let inputs = line.find('input');
	inputs.prop('disabled', true);
	line.find('.icons-ed-del').show();
	line.find('.icons-сonf-canc').hide();
});

$(document).on('click', '.showadd-button', function() {
	$('#showTable').hide();
	$('#addContainer').show();
});

$(document).on('click', '.button-add', function(e) {
	e.preventDefault();
	let form = $(this).parent();
	let inputs = form.find('input');
	let fields = [];
	let values = [];
	let types = "";
	let action = 'insert';
	let table = 'users';
	inputs.each(function() {
		fields.push($(this).attr('name'));
		values.push($(this).val());
		types += $(this).attr('data-type');
	})
	$.ajax({
		url: '../php/CRUD.php',
		type: 'POST',
		data: {
			table: table,
			action: action,
			fields: JSON.stringify(fields),
			values: JSON.stringify(values),
			types: types,
		},
		success: function(response) {
			console.log(response);
			location.reload();
		},
		error: function(error) {
			console.log(error);
		}
	})
});

$(document).on('click', '.delete-button', function() {
	let form = $(this).parent().parent().parent();
	let inputs = form.find('input');
	let id = $(this).attr('data-id');
	let types = 'i';
	let action = 'delete';
	let table = 'users';
	$.ajax({
		url: '../php/CRUD.php',
		type: 'POST',
		data: {
			table: table,
			action: action,
			id: id,
			types: types,
		},
		success: function(response) {
			console.log(response);
			form.remove();
		},
		error: function(error) {
			console.log(error);
		}
	})
});