$(function(){

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

	//add to order
	$('body').on("click", ".add_to_order", function(evt){
		$('.selected_item').text(this.id);
		$('.test_modal').modal('show');
		console.log('modal should appear');
	});

}); //@end main