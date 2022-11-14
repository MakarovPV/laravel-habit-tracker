$(document).ready(function() {
	//Отображение поля ввода по клику на кнопку добавления
	$('body').on('click', '#btn', function(e) {
    	$('#add-form').removeClass('d-none');
  	});

	//Добавление новой привычки
    $('body').on("click", "#addNewHabit", function(e){
		e.preventDefault();
		insertNewData();
	});

    function insertNewData(){
		let habit_name = $('input[name=habit_name]').val();
		let _token = $("input[name=_token]").val();

		$.ajax({
			url: `/insert`,
			type: "POST",
			data: {habit_name: habit_name, _token: _token},

			success: function() {
				$(".table").load(document.URL + " .table");
				$("#add-form").load(document.URL + " #add-form");
                $("#mainchild").load(document.URL + " #mainchild");

      		}
		});
	};

    //Изменение активности кнопки, в зависимости от количества введённых символов
	$('body').on('keyup', 'input[name=habit_name]', function(){
		var input = $(this).val().trim();
		if(input.length > 0){
			$('#addNewHabit').prop("disabled", false);
		}
	});


	//Переход по месяцам
	$('.header').children().children().on('click', function(e){
		e.preventDefault();
		setDate(this);
	});

    function setDate(e)
    {
		var page = $(e).data('page');

    	let date = $(e).attr('id');
    	let _token = $("input[name=_token]").val();

    	$.ajax({
			url: `/${date}`,
			type: "GET",
			data: {page: page},

			success: function() {
				$('#mainchild').load(location.href + ' #mainchild');
				$('.monthName').load(location.href + ' .monthName');
      		}
		});
    }

     //Возвращение на текущий месяц
    $('body').on('click', '#return', function(){
    	$.ajax({
			url: `/return`,
			type: "GET",

			success: function() {
				$('#mainchild').load(location.href + ' #mainchild');
				$('.monthName').load(location.href + ' .monthName');
      		}
		});
    })

    //Удаление привычки
    $('body').on('click', '.delete', function(){
    	let id = $(this).parent().parent().attr('data-id');
    	let _token = $("input[name=_token]").val();

    	$.ajax({
			url: `/destroy/${id}`,
			type: "DELETE",
			data: {id: id, _token: _token},

			success: function() {

      		}
		});
    });

    //Изменение значения чекбокса
    $('body').on('change', '.checkbox', function(){
    	var id = $(this).parent().attr('data-id');
    	let _token = $("input[name=_token]").val();
    	var checkBoxes = [];

    	$(this).children('.checkbox-xl').each(function(){
    		if($(this).children('#checkbox-3').is(':checked')){
	    		checkBoxes.push('1');
	    	} else {
	    		checkBoxes.push('0');
	    	}
    	});

    	var checkString = checkBoxes.toString().replace(/[,]/g, '');
    	$.ajax({
			url: `/update/${id}`,
			type: "POST",
			data: {habit_status: checkString, _token: _token},

			success: function() {

      		}
		});
    });

});
