$(function(){

	$('#sub_category_name').val('');
	$('#sub_category_name').empty();
	$("#category_id").on('change', function(){

        var sub_category_id = $(this).val();
		// console.log(sub_category_id);
        var URL = BASE_URL+'products/get_data/'+sub_category_id;
        var select = $('#sub_category_name');
    	select.val('');
    	// select.val(null);
    	select.empty();
        var options = '';
        console.log(URL);
        $.ajax({
            url: URL,
            method: "post",
            dataType: "json",
            success: function(data){
            	console.log(data);

            	// select.val(null);
            	$.each(data,function(key, value) 
				{
					options = '<option value=' + value['sub_category_id'] + '>' + value['sub_category_name'] + '</option>';
				    select.append('<option value=' + value['sub_category_id'] + '>' + value['sub_category_name'] + '</option>');
            		console.log(options);
				});
            },
            error: function( jqXHR, textStatus, errorThrown){
            	console.log(errorThrown);
            }
        });

	});
	// select.val('');
	select.empty();
	
        

});