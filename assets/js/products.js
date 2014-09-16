$.ajax({
  type: "GET",
  url: site_url + "products/listing/"
})
  .done(function( html ) {

    $('.product_list').html(html);    
});


$('.toggle_modal_products').click(function(){
	
	var elem_id = $(this).data("id");

	$.ajax({
	  type: "GET",
	  url: site_url + "products/form/" + elem_id
	})
	  .done(function( html ) {
	    $('#products_modal .modal-body').html(html);
		$('#products_modal').modal('show');	    
	  });	
});


$('.product_list').on("click", '.pagination a', function(e){
	e.preventDefault();

	$.ajax({
	  type: "GET",
	  url: $(this).attr('href')
	})
	  .done(function( html ) {

	    $('.product_list').html(html);    
	});	

});

