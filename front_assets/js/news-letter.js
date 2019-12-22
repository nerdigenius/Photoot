$(function(){
    $(document).on('submit', '#newsletter', function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        var url = BASE_URL+'frontend/newsletter/';
       
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
