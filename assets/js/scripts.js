$(function(){

	function update_tp () {
		var tp = 0;
		$('.order_subtotal').each(function(){
			tp += parseInt($(this).html());
		});
		$('#total_payable').html(tp);
	}

	//LOGIN SUBMIT
	$('.submit_login').click(function(event){
		event.preventDefault();	
		// $('.errormsg_login').removeClass('hidden');
		var data = $('.form_login').serializeArray();

		$.ajax({
			url : $('.form_login').attr('action'),
			data : data, 
			type : 'post',
			dataType : 'json',
			success : function(response){
				if(!response.stat){ //false - invalid login
					console.log(response.msg)
					$('#login_username , #login_password').val('');
					$('.errormsg_login').removeClass('hidden');
					// $('#login_username').autoFocus();
				}else{
					console.log(response.url);
					window.location.href = response.url;
				}
			}, error : function(err){
				console.log(err.responseText);
			}
		})
	});

	// logout
	$('.link_logout').click(function(event){
		event.preventDefault();
		if(confirm("Are You sure?"))
			window.location.href = $('.link_logout a').attr('href');
	});

	// container click - toggle menu if collapsed
	$('.container').click(function(){
		if($('.collapse').hasClass('in')){ //toggle if collapsed
			$('.collapse').collapse('toggle');
		}
	});

	// logged in **************************
	$('.orders , .category').hide();

	//home page
	$('.link_home').click(function(event){
		event.preventDefault();
		$('.nav_link').removeClass('active');
		$('li.link_categories').addClass('active');
		if($('.collapse').hasClass('in')){ //toggle if collapsed
			$('.collapse').collapse('toggle');
		}
		$('.page_header_title').text('Categories');
		$('.category').slideUp('slow');
		$('.orders').slideUp('slow');
		$('.categories').slideDown('slow');
	});

	// orders page
	$('.link_orders').click(function(event){
		event.preventDefault();
		$('.nav_link').removeClass('active');
		$(this).addClass('active');
		$('.collapse').collapse('toggle');
		// toggle page
		$('.page_header_title').text('My Orders');
		$('.category').slideUp('fast');
		$('.categories').slideUp('slow'); //hide
		$('.orders').slideDown('slow'); //show
	});

	// categories page
	$('.link_categories').click(function(event){
		event.preventDefault();
		$('.nav_link').removeClass('active');
		$('li.link_categories').addClass('active');
		$('.collapse').collapse('toggle');
		// toggle page
		$('.page_header_title').text('Categories');
		$('.category').slideUp('fast');
		$('.orders').slideUp('slow');
		$('.categories').slideDown('slow');
	});

	//select category
	$('.category_container').click(function(){

		$.ajax({
			url : $(this).attr('data-url') + "/" + this.id, //main/get_prods
			type : 'post',
			success : function(data){
				$('.category').html(data);
			}, error : function(err){
				console.log(err.responseText);
			}
		})
		$('.page_header_title').text($(this).find('h4').text());
		$('.categories').slideUp('slow'); //hide categories page
		$('.category').slideDown('slow'); //show products 
	});

	//view product image
	$('body').on("click", ".show_image", function(evt){
		$('.put_image').attr('src' , $(this).attr('src') );
		$('.modal_show_image').modal('show');
	});

	//add to order
	$('body').on("click", ".add_to_order", function(evt){
		$('.selected_item').text(this.id);
		$('.test_modal').modal('show');
		// console.log('modal should appear');
		$('.num').attr('data-price-id', this.id);
	});

	//add order
	$('.num').click(function(){	
		$.ajax({
			url : $(this).attr('data-url'),
			data : { 
				'price_id' : $(this).attr('data-price-id'),
				'qty' : parseInt($(this).html())
			},
			type : 'post',
			success: function(data){
				$('.order_list').append(data).delay(1000);
				update_tp();
			}, error : function(err){
				console.log(err.responseText);
			}
		});

		$(".success_add_alert").fadeIn(500).delay(1500).fadeOut(400);
		$('.test_modal').modal('hide');
		// update pill
		var count = parseInt($('.orders_count').html()) + parseInt($(this).html());
		$('.orders_count').html(count);
		//update total payable
		
	});

	//set table number
	$('a.table_num').click(function(){
		// console.log('table number set.');
		$('.modal_table_num').modal('show');
	});
	//press a num
	$('.select_table').click(function(){
		if($(this).html() == "OK"){
			$('.table_num').html("tbl #" +$('.table_input_box').html());
			$('.modal_table_num').modal('hide');
		}else if($(this).html() == "C"){
			var tnum = $('.table_input_box').html();
			$('.table_input_box').html(tnum.slice(0, -1));
		}
		else
			$('.table_input_box').append($(this).html());
	});
	//queue order 
	$('a.queue_order').click(function(){
		console.log('queue order');
	});

}) //@end main
.ajaxStart(function() {
	$('.ajax_loader img').show();
}).ajaxStop(function() {
	$('.ajax_loader img').hide();
});
