$(function(){
    var company = $('.company_name');
    var vat = $('.vat');
    var pec = $('.pec');
    var sdi = $('.sdi');
    var fiscal = $('.fiscal_code');

    $(document).on('change', 'input[type="radio"]:checked', function(e){
        var radio = $(this).val();
        console.log(radio);
        if( radio == 'private' ){

            $('.company_name').addClass('nodisplay');
            $('.vat').addClass('nodisplay');
            $('.pec').addClass('nodisplay');
            $('.sdi').addClass('nodisplay');
        }
        else{

            $('.company_name').removeClass('nodisplay');
            $('.vat').removeClass('nodisplay');
            $('.pec').removeClass('nodisplay');
            $('.sdi').removeClass('nodisplay');

        }

    });

    $(document).on('submit', '#regForm', function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        var url = BASE_URL+'auth/user_auth/registration/';
        // Company Table
        // id      userid      sdi       pec     fiscal      vat     company_name
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(data){
                console.log(data);

                if( $.isEmptyObject( data.success ) ){
                    var section = $('#regForm').find('.card');
                    section.addClass('validation-error');
                    toastFailed( data );
                }else
                {
                    toastSuccess( data );
                    form.trigger('reset');
                    $('#regmodal').modal('toggle');
                    window.location.replace(BASE_URL+'frontend/login');
                }
            }
        });
    });

    // Submit Login form
    $(document).on('submit', '#logForm', function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        var url = BASE_URL+'auth/user_auth/login/';
        // Company Table
        // id      userid      sdi       pec     fiscal      vat     company_name
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(data){
                console.log(data);

                if( $.isEmptyObject( data.success ) ){

                    // var section = $('#logForm').find('.form-group');
                    // section.addClass('validation-error');
                    // $("#logForm").validetta({
                    //     showErrorMessages : true,
                    //     errorClass : 'validetta-error',
                    //     realTime : true,
                    // });
                    toastFailed( data );
                }else
                {
                    // similar behavior as an HTTP redirect
                    toastSuccess( data );
                    form.trigger('reset');
                    $('#loginmodal').modal('toggle');
                    // window.location.replace(BASE_URL+'frontend/profile');
                  window.location.href = window.location;
                }
            }
        });
    });

    // Submit Try form
    $(document).on('submit', '#tryForm', function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        var url = BASE_URL+'auth/user_auth/try_it_free_login/';
        // Company Table
        // id      userid      sdi       pec     fiscal      vat     company_name
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(data){
                console.log(data);

                if( $.isEmptyObject( data.success ) ){
                    var section = $('#tryForm').find('.form-group');
                    // section.addClass('validation-error');
                    toastFailed( data );
                }else
                {
                    // similar behavior as an HTTP redirect
                    toastSuccess( data );
                    window.location.replace(BASE_URL+'frontend/try_it_free');
                }
            }
        });
    });

    // Submit Custom form
    $(document).on('submit', '#customForm', function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        var url = BASE_URL+'auth/user_auth/try_it_free_login/';
        // Company Table
        // id      userid      sdi       pec     fiscal      vat     company_name
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(data){
                console.log(data);

                if( $.isEmptyObject( data.success ) ){
                    var section = $('#customForm').find('.form-group');
                    // section.addClass('validation-error');
                    toastFailed( data );
                }else
                {
                    // similar behavior as an HTTP redirect
                    toastSuccess( data );
                    window.location.replace(BASE_URL+'frontend/custom_quote');
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
            // icon: 'glyphicon-ban-circle',
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
            // icon: null,
            timeout: 7,
            animationDuration: 300,
            dismissible: true
        });
    }
});
