$(document).ready(function(){

	// bars

	$(".bars-m").on("click", function(){
		if ($(this).hasClass("active")) {
			$(".m-nav, nav").hide();
			$(this).removeClass("active");
		} else {
			$(".m-nav, nav").show();
			$(this).addClass("active");
		}
	});

	function controlBars() {
		if ($(window).width() > 991) $(".m-nav, nav").show();
		else $(".m-nav, nav").hide();
		$(".bars-m").removeClass("active");
	} controlBars();

	$(window).resize(function(){
		controlBars();
	});

	//

	var pl = $('.owl-pl');

	pl.owlCarousel({
		loop:true,
		items: 1
	});

	$(".bt-pl.prev").on("click", function(){
		pl.trigger('prev.owl.carousel');
	});

	$(".bt-pl.next").on("click", function(){
		pl.trigger('next.owl.carousel');
	});

	$(".owl-rev").owlCarousel({
		loop:true,
		items: 1
	});

	$(".owl-top").owlCarousel({
		loop:true,
		items: 1,
		autoHeight:true
	});


	// ****** CHAT ******

	// открываем диалог

	$(".global-chat-wp").on("click", function(event){
		if ($(this).hasClass("active") || $(event.target).hasClass("close-chat") || $(event.target).hasClass("fa-times-circle")) return false;
		$(this).addClass("active");
		$("#message-area").focus();
	});

	// закрываем чат

	$(".close-chat").on("click", function(){
		console.log("e");
		$(".global-chat-wp").removeClass("active");
	});


	// Отправляем сообщение при нажатии на кнопку (самолетки)

	$("#send-message").on("click", function(){
		sendMessage();
	});


	// Отправляем сообщение при нажатии на энтр

	$("#message-area").keypress(function (e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13) {
			sendMessage();
		    return false;
		}
	});


	// Функция добавления сообщения

	function sendMessage() {
		var message = $("#message-area").val();
		if (message != "" && message.replace(/\s+/g, '') != "") {
			addMessageFromUser(message);
			$("#message-area").val("").focus();
			$(".messages-in-chat").scrollTop(9999);
		}
	}
	

	// Формирования DOM элемента сообщения

	function addMessageFromUser(message) {
		var date = new Date(),
				m = date.getMinutes(25), s = date.getSeconds(25);

		if (m < 10) m = "0" + m;
		if (s < 10) s = "0" + s;

		var time = m + ":" + s;

		var result = "";
		result += '<div class="wp-message message-from">';
		result += '   <div class="message-in">';
		result += message;
		result += '   </div>';
		result += '   <div class="date-message">' + time + '</div>';
		result += '</div>';
		$(".messages-in-chat").append(result);
	}

	// Тема вопроса

	$(".selector-ver input").on("input", function(){
		$(this).parents(".selector-ver").addClass("active");
	});

	$(".selects-it li").on("click", function(){
		var text = $(this).text();
		console.log(text);
		$(this).parents(".selector-ver").find("input").val(text);
		$(".selector-ver").removeClass("active");
	});

	$(document).mouseup(function (e){
		var div = $(".selector-ver");
		if (!div.is(e.target)
		    && div.has(e.target).length === 0) {
				$(".selector-ver").removeClass("active");
		}
	});

	//

	$(".product-one").on("click", function(){
		if ($(this).hasClass("active")) $(this).removeClass("active");
		else {
			$(".product-one").removeClass("active");
			$(this).addClass("active");
		}
	});

	// room

	$('.owl-carousel').owlCarousel({
		loop:true,
		nav:false,
		items: 1,
		touchDrag: false,
		mouseDrag: false
	})

	$(window).resize(function(){
		controlRoom();
	});

	function controlRoom() {
		if ($(window).width() <= 991) {
			$(".one-page-list").height($(window).height() - 155);
		}
	}

	controlRoom();
	$(".phone").inputmask({"mask": "+7 (999) 999-9999"});

	//$("a.gal").fancybox();
	$('.item-single-thing').on('click', function() {
			$(this).find('.back').toggle('slide');
	});
	$('.menu__icon').on('click', function() {
		$('.top-menu-media').toggle();
	});

	//$('.checkbox input').on('change', function() {
	$('.checkbox').on('click', function() {
		var checkbox = $(this).find('input[type=checkbox]');
		var desc = $(this).parent('.item-thing').find('.description a');
		if(checkbox.is(':checked')) checkbox.prop('checked', false);
		else checkbox.prop('checked', true);
		if(desc.hasClass('white-desc')) desc.removeClass('white-desc');
		else desc.addClass('white-desc');
		$(this).parents('.item-thing').find('.back').toggle();


		$('.select-thing').each(function() {
			var href = $(this).attr('href');
			$(this).attr('data-things', countCheckboxes());
			//$(this).attr('href', '?id=' + countCheckboxes());
		});
	});
	function countCheckboxes() {
		var str = '';
		$('.checkbox').each(function() {
			var inp = $(this).find('input[type=checkbox]');
			if(inp.is(':checked')) str = str + $(this).data('thing') + ',';
		});
		return str;
	}

	function isChecked() {
		var count = 0;
		$('.checkbox input[type=checkbox]').each(function() {
			if($(this).is(':checked')) count++;
		});
		return count;
	}
	$('.trust-to-sell').on('click', function() {
		alert('В настоящее время услуга находится в разработке');
		return false;
	});

	//if(isChecked() != 0) $('.room-nav-bottom').fadeIn();

	$('.select-thing').on('click', function() {
		if(isChecked() == 0) {
			$('.error p').fadeIn();
			setTimeout(displayError, 6000);
			return false;
		}
		else {
			var self = $(this);
			var href = self.attr('href');
			var str = self.data('things');
			self.attr('href', href + '?id=' + str);
		}
	});
	function displayError() {
		$('.error p').fadeOut();
	}


	$('#select-date').on('change', function() {
		if($(this).val() == 10) $('.select-date').fadeIn();
	});

	$('.gallery').fancybox();
	$('.hide-textarea').on('click', function() {
		$('.adress-textarea').toggle();
	});
	$('.my-thing-extend').on('click', function() {
		$('#extend').modal();
		return false;
	});
	$('.thing-extend').on('click', function() {
		$('#thing-extend').modal();
		return false;
	});

	$('.tariffs-return').on('click', function() {
		$('#tariffs-return').modal();
		return false;
	});
	$('.thing-actions').on('click', '.storage-description', function() {
		$('#storage-description').modal();
		return false;
	});
	$('.pickup-description').on('click', function() {
		$('#pickup-description').modal();
		return false;
	});
	$('.bank-partner').on('click', function(e) {
		e.preventDefault();
		$('#bank-partner').modal();
	});

	$('.call-to-operator').on('click', function() {
		$('.modal').modal('hide');
		$('#call-to-operator').modal();
		return false;
	});
	$('.add-thing').on('click', function() {
		$.post("storage/append-thing", function(data) {
			var element = $('.append-to').last();
			$(element).after(data);
		});
		countAppendItems();
		return false;
	});



	function countAppendItems()
	{
		if($('.append-to').length > 1) $('#call-operator').modal('show');
	}
	countAppendItems();

	$('.btn-plus span').on('click', function() {
		var input = $(this).parents('.select-quan').find('input.quan-input');
		var count = Number(input.val());
		input.val(count+1);
		return false;
	});
	$('.btn-minus span').on('click', function() {
		var input = $(this).parents('.select-quan').find('input.quan-input');
		var count = Number(input.val());
		if(count != 0) input.val(count-1);
		return false;
	});
	$('.thing-item-link').on('mouseover', function() {
		var id = $(this).data('thing-item');
		$('a.thing-item-img[data-thing-item=' + id + ']').css('opacity', '0.9').find('img').css('boxShadow', '2px 2px 5px #f00, -2px -2px 5px #f00');
	});
	$('.thing-item-link').on('mouseout', function() {
		var id = $(this).data('thing-item');
		$('a.thing-item-img[data-thing-item=' + id + ']').css('opacity', '1').find('img').css('boxShadow', 'none');
	});

	$('#select-date').on('change', function() {
		$('.return-tr').fadeOut();
		var tariffs = new Map([
			[1, 800],
			[2, 400],
			[3, 200],
			[999, 400]
		]);
		var select = Number($('#select-date').val());
		var thing_item_link = $('.thing-item-link')
		var count = Number(thing_item_link.length);
		if(select != 10) {
			if(count > 2) {
				if(select == 2) {
					tariffs.set(2, 350);
				}
				$('#return-price').val((tariffs.get(select) * count) + ' руб.');
			}
			else {
				$('#return-price').val(tariffs.get(select) + ' руб.');
			}
		}
		else {
			$('#return-price').val('Стоимость возврата расчитывается индивидуально');
			$('.return-tr').fadeIn();
		}
	});


});

