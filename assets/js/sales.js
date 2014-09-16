
var productLine;

$.ajax({
  type: "GET",
  url: site_url + "sales/form_line"
})
  .done(function( html ) {

  	productLine = html;
});	

$('.code').focus();


$('.table_sale').on("click", '.btn_add_item', function(){
	var thisbutton = $(this);
	var productCode = $(this).closest('tr').find('.code').val();

	$.ajax({
			  type: "GET",
			  url: site_url + "products/" + productCode + ".json",
			  dataType: "json"
			})
			  .done(function( response ) {

			  	if(response.error == true){

			  		alert(response.message);
			  	}
			  	else{
			  			var row = thisbutton.closest('tr');

					  	row.find('.item_description').text(response.product.description);
					  	row.find('.item_id').val(response.product.id);

					  	var quantity = thisbutton.closest('tr').find('.quantity');
					  	quantity.attr('max', response.product.stock);

					  	row.find('.item_total').text('$ ' + response.product.price * quantity.val());
					  	row.find('.item_price').text('$ ' + response.product.price);

					  	thisbutton.closest('tr').find('.code').attr('disabled', true);

			  			thisbutton.addClass('hide');
			  			thisbutton.next().removeClass('hide');
			    		$('.table_sale tbody').append(productLine);
			    		$('.table_sale tbody tr:last-child').find('.code').focus();

			    		$('.disabled').removeClass('disabled');
	
			  	}
			});
	  			

	
});


$('.table_sale').on("click", '.btn_remove_item', function(){

	$(this).closest('tr').remove();
});


$('.sales_submit').click(function(){

	$(".sales_form").ajaxSubmit({
		url: site_url + 'sales/process',
		type: 'post',
		dataType: "json",
		success: function(response){

			if(response.error == false){

				$.ajax({
					  type: "GET",
					  url: site_url + "sales"
					})
				.done(function(response){

					$('.page-content').html(response);
					$('.btn').removeClass('disabled');
				})
				.error(function(response){

alert(response);
				});		
			}
		}
	});

});


$('.table_sale').on("keyup", '.code', function(){

	$.ajax({
	  type: "GET",
	  url: site_url + "products/search_by/code/" + $(this).val(),
	  dataType: "json"
	})
	  .done(function( products ) {

	  	$('#codes').empty();

	  	$.each(products, function(i, elem){

	  		$('#codes').append('<option value="' + elem.code + '" />');
	  	});
	});	
});
