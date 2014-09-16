$('.toggle_modal_movements').click(function(){
	
	var elem_id = $(this).data("id");

	$.ajax({
	  type: "GET",
	  url: site_url + "movements/form/" + elem_id
	})
	  .done(function( html ) {
	    $('#movements_modal .modal-body').html(html);
		$('#movements_modal').modal('show');
    
	  });	
});

$('#movements_date').change(function(){

	window.location = site_url + "movimientos/" + $(this).val();
});

