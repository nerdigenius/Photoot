$(function(){
    $(document).on('submit', '#failedOrder', function(e){
        e.preventDefault();
        // var data = $('#search_data').val();

        var data = $('#failedOrder').serialize();
        console.log(data);

        $('#suggestions').html('');
        $.ajax({
            type: 'POST',
            url: BASE_URL+"frontend/failedOrder/",
            data: data,
            success: function(data){
                if(data.length > 0){
                    console.log(data);
                    $('#suggestions').append(data);
                }
            }
        });
    });
});



$(function(){
    $(document).on('submit', '#submit_fail_order', function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        var url = BASE_URL+'frontend/saveFailedOrder/';
       
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(data){
                console.log(data);
 
                if( $.isEmptyObject( data.success ) ){
                    toastFailed( data );
                }else
                {
                    toastSuccess( data );
                    // window.location.replace(BASE_URL+'frontend/login');
                }
            }
        });
    });
 
    /**
    * Method to Toast Error message
    */
    function toastFailed( data ) {
        console.log( 'inside toast failed' );
        bootoast.toast({
            message: data.error,
            type: 'danger',
            position: 'right-bottom',
            icon: null,
            timeout: 7,
            animationDuration: 300,
            dismissible: true
        });
    }
    /**
    * Method to Toast Success message
    */
    function toastSuccess( data ) {
        console.log( 'inside toast success' );
        bootoast.toast({
            message: data.success,
            type: 'success',
            position: 'right-bottom',
            icon: null,
            timeout: 7,
            animationDuration: 300,
            dismissible: true
        });
    }
});
