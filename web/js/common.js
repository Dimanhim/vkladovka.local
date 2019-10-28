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
	})

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

	$('.checkbox input').on('change', function() {
		$(this).parents('.item-thing').find('.back').toggle();
		/*if(isChecked() == 0) {
			$(this).parents('.item-thing').find('.back').toggle();
			$('.room-nav-bottom').fadeOut();
		}
		else {
			$('.room-nav-bottom').fadeOut();
			$(this).parents('.item-thing').find('.back').toggle();
			$('.room-nav-bottom').slideToggle();
		}*/
	});

	function isChecked() {
		var count = 0;
		$('.checkbox input[type=checkbox]').each(function() {
			if($(this).is(':checked')) count++;
		});
		return count;
	}

	//if(isChecked() != 0) $('.room-nav-bottom').fadeIn();
	$('.top-menu-btn').on('click', function() {
		if(isChecked() == 0) {
			alert('Выберите вещь');
			return false;
		}
	});
	$('#select-date').on('change', function() {
		if($(this).val() == 10) $('.select-date').fadeIn();
	});



});

