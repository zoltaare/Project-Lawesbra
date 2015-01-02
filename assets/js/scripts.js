$(function(){
	//update total payable
	function update_tp () {
		var tp = 0;
		$('.order_subtotal').each(function(){
			tp += parseInt($(this).html());
		});
		$('#total_payable').html(tp);
	}
	//update total order
	function update_totalorder () {
		var to = 0;
		$('.order_qty').each(function(){
			to += parseInt($(this).html());
		});
		$('.orders_count').html(to);
	}
	//test log : data to be sent to server
	function data_to_send(data , the_url) { //order id && controller url
		var count = $('.the_orders .per_order').length;
		$('.the_orders .per_order').each(function(){
			$.ajax({
				url : the_url + 'submit_perorder',
				type : 'POST',
				data : {
					'order_id_LINK' : data,
					'price_id_LINK' : this.id,
					'quantity' : $(this).find('.order_qty').html()
				},
				success : function(data){

				},error : function(err){
					console.log(err.responseText);
				}
			});
			count--;
			if(count == 0){
				// done queue
				$('a.queue_order').slideUp('slow');
				$('a.table_num').slideUp('slow');
				$('a.cash').slideUp('slow');
				$('.edit_order').slideUp('slow');
				//turn off links
				$('a.link_home').off();
				$('li.link_categories').off();
				//show waiting controls
				$('a.hold_order').removeClass('hidden');
				//get priority num
				$.post(the_url + 'get_prio/' + data, function(data_prio){
					$('.well-sm').prepend("<h5>Priority Number: <span class='text-warning prio_num' style='font-size: 20px;' id='"+data+"'>"+data_prio+"</span></h5>")
				});
			}
		});
		
	}
	//is order exists
	function is_order_exists (price_id, qty) {
		var response = false;
		$('.the_orders .per_order').each(function(){
			if(this.id == price_id){
				var new_qty = parseInt($(this).find('.order_qty').html()) + qty;
				$(this).find('.order_qty').html(new_qty);
				$(this).find('.order_subtotal').html(new_qty * parseInt($(this).find('.order_prod_price').html()) );
				response = true;
				return false;
			}
		});
		return response;
	}
	//GET DATE
        function get_date(){
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var output = d.getFullYear() + '/' +
            ((''+month).length<2 ? '0' : '') + month + '/' +
            ((''+day).length<2 ? '0' : '') + day;
            var currentTime = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
            var now = ""+output+" "+currentTime;
            return now;
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
		// if($('a.hold_order').hasClass('hidden')){ //before queue
		// 	console.log('before queue');
		// }else{ //after queue
		// 	// trigger hold
		// 	$('a.hold_order').trigger('click');
		// 	console.log('after queue : hold triggered');
		// }
		
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

		// if($('a.hold_order').hasClass('hidden')){ //before queue
		// 	console.log('before queue');
		// }else{ //after queue
		// 	// trigger hold
		// 	$('a.hold_order').trigger('click');
		// 	console.log('after queue : hold triggered');
		// }
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
		});
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
		if(is_order_exists($(this).attr('data-price-id'), parseInt($(this).html()) )){ //order exists
			// $('.per_order')
			update_tp(); update_totalorder();
		}else{
			$.ajax({
				url : $(this).attr('data-url'),
				data : { 
					'price_id' : $(this).attr('data-price-id'),
					'qty' : parseInt($(this).html())
				},
				type : 'post',
				success: function(data){
					$('.order_list').append(data).delay(1000);
					update_tp(); update_totalorder();
				}, error : function(err){
					console.log(err.responseText);
				}
			});
		}	
		$(".success_add_alert").removeClass('alert-danger').addClass('alert-success');
		$(".success_add_alert").html('<p>Order successfully added.</p>').fadeIn(500).delay(1500).fadeOut(400);
		$('.test_modal').modal('hide');

		// // update pill
		// var count = parseInt($('.orders_count').html()) + parseInt($(this).html());
		// $('.orders_count').html(count);
		//update total payable
	});

	//set table number
	$('a.table_num').click(function(){
		$('.modal_table_num').modal('show');
	});
	//set cash
	$('a.cash').click(function(){
		$('.modal_cash').modal('show');
	});

	//press a num - TABLE
	$('.select_table').click(function(){
		if($(this).html() == "OK"){
			$('span.the_tnum').html(parseInt($('.table_input_box').html().trim()));
			$('.modal_table_num').modal('hide');
		}else if($(this).html() == "C"){
			var tnum = $('.table_input_box').html();
			$('.table_input_box').html(tnum.slice(0, -1));
		}
		else
			$('.table_input_box').append($(this).html());
	});
	//press a num - CASH
	$('.input_cash').click(function(){
		if($(this).html() == "OK"){
			$('span.the_cash').html(parseInt($('.cash_input_box').html().trim()));
			$('.modal_cash').modal('hide');
		}else if($(this).html() == "C"){
			var tnum = $('.cash_input_box').html();
			$('.cash_input_box').html(tnum.slice(0, -1));
		}
		else
			$('.cash_input_box').append($(this).html());
	});

	//queue order 
	$('a.queue_order').click(function(){
		if(parseInt($('span.the_tnum').html()) > 0){ //has table num?
			if(parseInt($('#total_payable').html()) > 0){ //has order/s?
				var the_url = $(this).attr('data-url');
				$.ajax({
					url : the_url + 'get_orderID',
					type : 'POST',
					data : {
						'cust_id_LINK' : parseInt($('.main_content').attr('id')),
						'table_no' : parseInt($('span.the_tnum').html()),
						'cash' : parseInt($('.the_cash').html()),
						'order_dateTime' : get_date()
					},
					success : function(data){
						data_to_send(data, the_url);
					}, error : function(err){
						console.log(err.responseText);
					}
				});
				
			}else{
				$(".success_add_alert").removeClass('alert-success').addClass('alert-danger');
				$(".success_add_alert").html('<p>You don\'t have order/s yet.</p>').fadeIn(500).delay(1500).fadeOut(400);
			}
		}else{
			$(".success_add_alert").removeClass('alert-success').addClass('alert-danger');
			$(".success_add_alert").html('<p>Please input a table number').fadeIn(500).delay(1500).fadeOut(400);
		}
	});
	//edit order
	$('body').on('click', '.edit_order',function(){
		// console.log($(this).closest('.per_order').attr('id'));
		// if(confirm('Are you sure to remove this order?'))
			// $(this).closest('.per_order').slideUp(300).delay(300).remove();
		pname = $(this).closest('.row-content').find('.p_name').html();
		pcount = $(this).closest('.row-content').find('.order_qty').html();
		pid = $(this).closest('.per_order').attr('id');
		$('.modal_edit_order').find('.edit_pname').html(pname);
		$('.modal_edit_order').find('.pqty').html(pcount);
		$('.modal_edit_order').find('.modal-body').attr('id', pid);
		$('.modal_edit_order').modal('show');

	});
	//add order
	$('body').on('click', '.edit_add',function(){
		if(parseInt($('.pqty').html()) < 20)
			$('.pqty').html(parseInt($('.pqty').html()) + 1);
	});
	//reduce order
	$('body').on('click', '.edit_reduce',function(){
		if(parseInt($('.pqty').html()) > 1)
			$('.pqty').html(parseInt($('.pqty').html()) - 1);
	});
	//edit ok
	$('body').on('click', '.edit_ok',function(){
		var pid = $(this).closest('.modal-body').attr('id');
		var newqty = parseInt($('.pqty').html()),
			pprice = $('.the_orders').find('#'+pid).find('.order_prod_price').html(),
			newsubtotal = parseInt(pprice) * newqty;
		//update per order
		$('.the_orders').find('#'+pid).find('.order_qty').html(newqty);
		$('.the_orders').find('#'+pid).find('.order_subtotal').html(newsubtotal);
		update_tp(); update_totalorder();
		$('.modal_edit_order').modal('hide');
	});
	// remove order
	$('body').on('click', '.edit_remove',function(){
		var pid = $(this).closest('.modal-body').attr('id');
		$('.the_orders').find('#'+pid).slideUp(300).delay(300).remove();
		update_tp(); update_totalorder();
		$('.modal_edit_order').modal('hide');
	});

// AFTER QUEUE **************************
	//hold order
	$('a.hold_order').click(function(){
		var orderid_update = $('.prio_num').attr('id');
		var the_url = $(this).attr('data-url');
		if($(this).html() == 'HOLD ORDERS'){ //hold orders /for edit
			$(this).html('OK');
			//update order status == hold
			$.post( $(this).attr('data-url') + 'hold_order/' + orderid_update , function(){
				$('.edit_order').slideDown('slow');
				$('a.cancel_order').removeClass('hidden').delay(200).slideDown('slow');
				$('a.quickadd_order').removeClass('hidden').delay(200).slideDown('slow');
				$(".success_add_alert").removeClass('alert-success').addClass('alert-danger');
				$(".success_add_alert").html('<p>Your order has been held.').fadeIn(500).delay(1500).fadeOut(400);
			});

		}else if($(this).html() == 'OK'){ //OK
			$(this).html('HOLD ORDERS');
			//remove per orders from database
			$.post(the_url + 'remove_perorder/' + orderid_update, function(){
				//add new orders
				var count = $('.the_orders .per_order').length;
				$('.the_orders .per_order').each(function(){
						$.ajax({
							url : the_url + 'submit_perorder',
							type : 'POST',
							data : {
								'order_id_LINK' : orderid_update,
								'price_id_LINK' : this.id,
								'quantity' : $(this).find('.order_qty').html()
							},
							success : function(data){

							},error : function(err){
								console.log(err.responseText);
							}
						});
						count--;
						if(count == 0){
							// done queue
							$('.edit_order').slideUp('slow');
							$('a.cancel_order').removeClass('hidden').delay(200).slideUp('fast');
							$('a.quickadd_order').removeClass('hidden').delay(200).slideUp('fast');
							$(".success_add_alert").removeClass('alert-danger').addClass('alert-success');
							$(".success_add_alert").html('<p>Order successfully queued.').fadeIn(500).delay(1500).fadeOut(400);
						}
					});
			});
			//=======================================
		}
	});	
	//$('a.quickadd_order').
	$('a.quickadd_order').click(function(){
		$('.page_header_title').text('Categories');
		$('.category').slideUp('fast');
		$('.orders').slideUp('slow');
		$('.categories').slideDown('slow');
	});
	//cancel order
	$('a.cancel_order').click(function(){
		var orderid = $('.prio_num').attr('id');
		if(confirm('Are you sure to cancel your orders?')){
			$.post( $(this).attr('data-url') + 'cancel_order/' + orderid , function(){
				location.reload();
			});
		}
	});
}) //@end main
.ajaxStart(function() {
	$('.ajax_loader img').show();
}).ajaxStop(function() {
	$('.ajax_loader img').hide();
});
