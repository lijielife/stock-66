$('.toggle_modal_categories').click(function(){
	
	var elem_id = $(this).data("id");

	$.ajax({
	  type: "GET",
	  url: site_url + "categories/form/" + elem_id
	})
	  .done(function( html ) {
	    $('#categories_modal .modal-body').html(html);
		$('#categories_modal').modal('show');	    
	  });	
});