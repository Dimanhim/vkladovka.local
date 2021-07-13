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

	$('body').on('submit', '#form-chat', function(e) {
		e.preventDefault();
		console.log('submit');
		var form = $(this);
		var data = form.serialize();
		$.ajax({
			url: form.attr('action'),
			type: 'POST',
			data: data,
			success: function (json) {
				var res = JSON.parse(json);
				$('#chat-modal .chat-message').text(res.message);
				$('#chat-modal').modal('show');
				return false;
			},
			error: function () {
				console.log('Error!');
			}
		});
	});
	function setPackageTotalPrice() {
		$('#packageorder-total_price').val(0);
		var delivery_price = Number($('#package-price-delivery').text());
		var sale_price = Number($('#package-price-sale').text());
		var rent_price = Number($('#package-price-rent').text());
		var type = $('#packageorder-type').val();
		var qty = $('#packageorder-qty').val();
		var total_price;
		if(type == 1) {
			total_price = rent_price * qty + delivery_price;
		} else {
			total_price = sale_price * qty;
		}
		$('#packageorder-total_price').val(total_price);
	}
	$('body').on('click', '.modal-package-order', function(e) {
	    e.preventDefault();
	    var self = $(this);
	    var message_1 = self.data('message');
	    var message_2 = $('#package-name').text();
	    var full_message = message_1 + ' "' + message_2 + '"';
	    var type = self.data('type');
	    var qty_rent = $('#package-count-rent').val();
	    var qty_sale = $('#package-count-sale').val();

	    $('#packageorder-type').val(type);
	    $('#full-message').text(full_message);
	    if(type == 1) {
			$('#packageorder-qty').val(qty_rent);
		} else {
			$('#packageorder-qty').val(qty_sale);
		}
		setPackageTotalPrice();
	    $('#package-order').modal('show');
	});

	function controlBars() {
		if ($(window).width() > 991) $(".m-nav, nav").show();
		else $(".m-nav, nav").hide();
		$(".bars-m").removeClass("active");
	} controlBars();

	$(window).resize(function(){
		controlBars();
	});

	if($('.alert-success').length) {
		setTimeout(function() {
			$('.alert-success').slideDown();
			$('.alert-success').remove();
		}, 2000);
	}

	//

	/*var pl = $('.owl-pl');

	pl.owlCarousel({
		loop:true,
		items: 1
	});

	$(".bt-pl.prev").on("click", function(){
		pl.trigger('prev.owl.carousel');
	});*/

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

	$("body").on("click", ".avatar-adm-icon", function(event){
		var item = $(this).parents('.global-chat-wp');
		if (item.hasClass("active") || $(event.target).hasClass("close-chat") || $(event.target).hasClass("fa-times-circle")) return false;
		item.addClass("active");
		$("#message-area").focus();
	});

	// закрываем чат

	$(".close-chat").on("click", function(){
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
	$('body').on('click', '.checkbox', function() {
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
	$('body').on('click', '#to-rent-thing', function(e) {
		e.preventDefault();
		var object = $(this);
		var get = object.attr('data-things');
		if(isChecked() == 0) {
			displayError('Пожалуйста, выберете хотя бы одну вещь!');
			return false;
		}
		else {
			$.get('/lk/thing/ajax-things-rent', {ids: get}, function(res) {
				if(res) {
					displayError(res);
					return false;
				}
				else {
					var location = window.location;
					var path = location.origin + '/lk/thing/rent?id=' + get;
					window.location = path;
				}
			});
		}
	});
	function displayError(message) {
		$('.error p').text(message).fadeIn();
		setTimeout(function() {
			$('.error p').text(message).fadeOut()
		}, 6000)
	}
	$('body').on('click', '.select-thing', function() {
		if(isChecked() == 0) {
			displayError('Пожалуйста, выберете хотя бы одну вещь!');
			return false;
		}
		else {
			var self = $(this);
			var href = self.attr('href');
			var str = self.data('things');
			self.attr('href', href + '?id=' + str);
		}
	});
	function checkDisplayed(things) {
		$.get('lk/thing/ajax-things-rent', {ids: things}, function(res) {
			console.log(res);
			if(res) {
				displayError(res);
			}
		});
	}
	function displayError(message) {
		$('.error p').text(message).fadeIn();
		setTimeout(function() {
			$('.error p').text(message).fadeOut()
		}, 6000)
	}
	$('.show-content').on('click', function() {
		$('.hide-content').slideDown();
	});


	/*$('#select-date').on('change', function() {
		if($(this).val() == 10) $('.select-date').fadeIn();
	});*/

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
	$('body').on('click', '.add-thing', function(e) {
		var count = $('.append-to').length;
		e.preventDefault(e);
		$.get("/lk/storage/append?count=" + count, function(data) {
			var element = $('.append-to').last();
			$(element).after(data);
		});
		countAppendItems();
	});
	/*
	$('body').on('submit', '#storage-form', function(e) {
		e.preventDefault(e);
		var self = $(this);
		var form = self.serialize();
		console.log(form);
		$.ajax({
			url: '/lk/storage/add-storage',
			type: 'POST',
			data: form,
			success: function (res) {
				console.log(res);
			},
			error: function () {
				console.log('Error!');
			}
		});
	});
*/



	function countAppendItems()
	{
		if($('.append-to').length > 1) $('#call-operator').modal('show');
	}
	countAppendItems();

	$('.btn-plus span').on('click', function() {
		var input = $(this).parents('.select-quan').find('input.quan-input');
		var count = Number(input.val());
		input.val(count+1);
		console.log('plus');
		setPackageTotalPrice();
		return false;
	});
	$('.btn-minus span').on('click', function() {
		var input = $(this).parents('.select-quan').find('input.quan-input');
		var count = Number(input.val());
		if(count != 0) input.val(count-1);
		setPackageTotalPrice();
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
		var select = Number($(this).val());
		var thing_item_link = $('.thing-item-link');
		var count = Number(thing_item_link.length);
		if(select != 10) {
			if(select) {
				$('.select-date').fadeOut();
				if(count > 1) {
					if(select == 2) {
						tariffs.set(2, 350);
					}
					$('#return-price').val((tariffs.get(select) * count) + ' руб.');
				}
				else {
					$('#return-price').val(tariffs.get(select) + ' руб.');
				}
			} else {
				$('.select-date').fadeOut();
				$('#return-price').val('');
			}
		}
		else {
			$('#return-price').val('Стоимость возврата расчитывается индивидуально');
			$('.return-tr').fadeIn();
			$('.select-date').fadeIn();
		}
	});

	/*
	$('body').on('submit', '#storage-form', function(ev) {
		ev.preventDefault();
		var form = $(this);
		var data = form.serialize();
		$.ajax({
			url: '/lk/storage/send-storage',
			type: 'POST',
			data: data,
			success: function (res) {
				console.log(res);
				return false;
			},
			error: function () {
				alert('Error!');
			}
		});
	});
	*/

	$('.date-picker').datepicker({
		closeText: 'Закрыть',
		prevText: 'Предыдущий',
		nextText: 'Следующий',
		currentText: 'Сегодня',
		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
		monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: '',
		onSelect: function (dateText, inst) {

		}
	});
	$('body').on('change', '.item-cats', function(e) {
	    e.preventDefault();
	    var val = $(this).val();
	    if(val > 0) {
	    	var item = $('.td-desc').eq($(this).data('count'));
			item.find('.thing-desc').css('display', 'none');
			item.find('.desc-'+val).fadeIn();
			item.fadeIn();
		} else {
			var item = $('.td-desc').eq($(this).data('count'));
			item.find('.thing-desc').css('display', 'none');
			item.fadeOut();
		}
	    var el = $(this).parents('table').find('.dimensions-tr').eq($(this).data('count'));
	    if((val == 3) || (val == 4)) el.fadeIn();
	    else el.fadeOut();


	});
	$('body').on('change', '#thing-cat', function(e) {
	    e.preventDefault();
	    $.get('/admin/thing/add-parent-cats', {cat: $(this).val()}, function(data) {
	    	$('#thing-parent_cat').html(data);
		});
	});

	$('body').on('click', '#free-service-btn', function(e) {
	    e.preventDefault();
	    $('#free-service').modal('show');
	});

	// расчет стоимости хранения
	$('body').on('change', '#form-storage input, #form-storage select', function(e) {
		calculateStorage();
		//var inputs = $('#form-storage input, #form-storage select');
		//var price = 0;
		//var cat_storage_price_coef = []; var length = []; var height = []; var width = []; var size = [];
		/*
		inputs.each(function(index, element) {

			if($(this).data('type') == 'cat_storage_id') {
				var id = $(this).val();
				cat_storage_price_coef = $(this).find('option[value="'+id+'"]').data('price');
			}
			if($(this).data('type') == 'length') {
				length += Number($(this).val());
			}
			if($(this).data('type') == 'height') {
				height += Number($(this).val());
			}
			if($(this).data('type') == 'width') {
				width += Number($(this).val());
			}
			if(length > 0 && height > 0 && width > 0) {
				size = length * height * width;
				$('.error_message').fadeOut();
			} else {
				$('.error_message').fadeIn();
			}

		});
		*/
	});
	function calculateStorage() {
		var form = $('#form-storage');
		var data = form.serialize();
		var url = '/lk/storage/calculate-storage';
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success: function (json) {
				var data = JSON.parse(json);
				console.log(data);
				for(var i = 0; i < data.count; i++) {
					var span = $('tr[data-count="'+data[i].field+'"] span.error_message');
					if(data[i].message) span.html(data[i].message).css('display', 'block');
					else span.html('').css('display', 'none');
					$('#storage-price_storage').val(data.price_storage);
					$('#storage-price_pickup').val(data.price_pickup);
					$('#storage-price_total').val(data.price_total);
					//console.log(data.test);
				}
				return false;
			},
			error: function () {
				alert('Error!');
			}
		});
	}
	// поиск
	$('body').on('click', '#btn-search-thing', function(e) {
	    e.preventDefault();
	    var string = $(this).parents('form').find('#search-thing').val();
	    $.post('/site/search-thing', {data: string}, function(res) {
	    	$('#search-results').html(res);
	    	console.log(res);
		});
	});
	$('body').on('click', '.remove-storage-item', function(e) {
	    e.preventDefault();
	    var count = $(this).data('marker');
	    $('tr[data-marker="'+count+'"]').remove();
		calculateStorage();
	});
	$('body').on('change', '#loyalty-table input', function(e) {
	    e.preventDefault();
		var val = $(this).val();
		var id = $(this).data('id');
		var template = $(this).data('template');
		$.post('/admin/loyalty/save-value', {id: id, val: val, template: template}, function(res) {
			console.log(res);
		});
	});
	$('body').on('click', '.show-item', function(e) {
	    e.preventDefault();
	    var type = $(this).data('type');
	    var item = $('.user-dropdown[data-type="'+type+'"]');
	    if(item.is(':hidden')) {
	    	item.slideToggle();
			$(this).find('span').html('Скрыть');
		} else {
			item.slideToggle();
			$(this).find('span').html('Показать');
		}
	});
	function addTrendImages() {
		var trend = $('#trend-select').val();
		$.get('site/add-trend-images', {id: trend}, function(res) {
			$('#carousel-trend').html(res);
			/*$('.owl-carousel').owlCarousel({
				loop:true,
				nav:false,
				items: 1,
				touchDrag: false,
				mouseDrag: false
			})*/
		});
	}
	addTrendImages();
	$('body').on('change', '#trend-select', function(e) {
	    e.preventDefault();
		addTrendImages();
	});
	$('body').on('click', '.rent-cancel', function(e) {
	    if(!confirm('Вы действительно хотите отменить аренду вещи?')) return false;
	});
	$('body').on('click', '.rent-success', function(e) {
		if(!confirm('Вы действительно хотите сдать в аренду вещь?')) return false;
	});
	$(".select-time").inputmask({"mask": "99:99"});

	$('body').on('change', '#rentthing-term', function(e) {
	    e.preventDefault();
	    var price = $('#rentthing-price').data('price');
	    var days = $(this).val();
	    var total_price = price * days;
		$('#rentthing-price').val(total_price);

	});



});

