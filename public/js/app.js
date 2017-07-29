$(document).ready(function(){

	//Brands table
    var brands_table = $('#brands_table').DataTable({
							processing: true,
							serverSide: true,
							ajax: '/brands',
							columnDefs: [ {
								"targets": 2,
								"orderable": false,
								"searchable": false
							} ]
			    		});

    $('button.btn-modal').click(function(){
    	var container = $(this).data("container");

    	$.ajax({
			url: $(this).data("href"),
			dataType: "html",
			success: function(result){
				$(container).html(result).modal('show');
			}
		});
    });

    //Submittion of add brand form
	$(document).on('submit', 'form#brand_add_form', function(e){
		e.preventDefault();
		var data = $(this).serialize();

		$.ajax({
			method: "POST",
			url: $(this).attr("action"),
			dataType: "json",
			data: data,
			success: function(result){
				if(result.success == true){
					$('div.brands_modal').modal('hide');
					toastr.success(result.msg);
					brands_table.ajax.reload();
				} else {
					toastr.error(result.msg);
				}
			}
		});
	});

	//Show the brand edit form
    $(document).on('click', 'button.edit_brand_button', function(){

    	$( "div.brands_modal" ).load( $(this).data('href'), function(){

    		$(this).modal('show');

    		//Submit the brand edit form
    		$('form#brand_edit_form').submit(function(e){
	    		e.preventDefault();
				var data = $(this).serialize();

	    		$.ajax({
					method: "POST",
					url: $(this).attr("action"),
					dataType: "json",
					data: data,
					success: function(result){
						if(result.success == true){
							$('div.brands_modal').modal('hide');
							toastr.success(result.msg);
							brands_table.ajax.reload();
						} else {
							toastr.error(result.msg);
						}
					}
				});
    		});
    	});
    });

    $(document).on('click', 'button.delete_brand_button', function(){

    	var is_confirmed = confirm("Are you sure to delete the brand?");
    	if(!is_confirmed){
    		return;
    	}

    	var href = $(this).data('href');

    	$.ajax({
			method: "DELETE",
			url: href,
			dataType: "json",
			success: function(result){
				if(result.success == true){
					toastr.success(result.msg);
					brands_table.ajax.reload();
				} else {
					toastr.error(result.msg);
				}
			}
		});
    });
})