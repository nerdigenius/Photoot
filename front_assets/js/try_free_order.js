$(document).ready(function(){
    $('.try_free_text').on('keyup',function(){
        $('.custom_quote_value').val($(this).val());
    });
});

$(function(){
    $('.try-bottom-data').hide();
});

$(function(){    
    // Add to cart button click event
    // Submit the main form
    $(document).on('click', '#try-claim-button', function(e){
        e.preventDefault();
        var FormProduct = $('#try_it_free_form');
        $(FormProduct).submit();
    });

    /**
     * [Main form submission]
     * //Error Handling
     * \\Transfer Data
     */
    $(document).on('submit', '#try_it_free_form', function(e){
        e.preventDefault();
        console.log('form submitted');
        var url         = BASE_URL+'frontend/free_order';
        var form        = $(this);
        var formData    = $(this).serialize();
        var radio       = $(form).find('input[name="d_charge"]');
        var DelCharge   = $('input[name=d_charge]:checked').val();
        // var CropImage   = $('input[id="crop-image"]:checked').val();
        var errCount    = 0;
        var jsonData    = [];

        // var sub_category_id; //done | #sub_category_id
        var order_name; //done | #j_name
        // var sub_total; //done | #TotalOrderAmount
        var number; //done | #amnt
        var additional_service = []; //done 
        

        // Handle Ammount Error
        if( $('.amnt').val() == '' ){
            var input   = $(this).find('.amnt');
            input.addClass('showError');
            errCount++;
        }else{
            var amnt = $('.amnt').val();
        }

        // Handle Name Error
        if( $('.j_name').val() == '' ){
            var input   = $(this).find('.j_name');
            input.addClass('showError');
            errCount++;
        }else{
            var j_name = $('.j_name').val();
        }

        // var cropImageArr;
        // var shadowrftArr;
        // var multipathArr;
        // var backgrondArr;
        // var neckjointArr;
        // var oppformatArr;
        // // Handle Additional Services
        // if( $('input[id="crop-image"]').prop("checked") == true ){
        //     var parent  = $(this).parent();
        //     parent      = parent.find('.CIContainer');
        //     var sizes   = parent.find('#whinpx');
        //     var res     = parent.find('#resinpx');

        //     var sizeinpx;
        //     var resulation;

        //     var price = $('input[id="crop-image"]').val();

        //     if( sizes.val() == '' ){
        //         sizes.addClass('showError');
        //         errCount++;
        //     }else{
        //         sizeinpx = sizes.val();
        //     }

        //     if( res.val() == '' ){
        //         res.addClass('showError');
        //         errCount++;
        //     }else{
        //         resulation = res.val();
        //     }

        //     cropImageArr = {
        //             "Price": price,
        //             "Size": sizeinpx,
        //             "Res": resulation
        //     }
        // }

        // // Shadow/ Reflect
        // if( $('input[id="shadrefl"]').prop("checked") == true ){
        //     var price   = $('input[id="crop-image"]').val();
        //     var optVal = $('#shadrefl-optn').val();
        //     shadowrftArr = {
        //             'Price': price,
        //             'Option': optVal,
        //     }
        //     // additional_service.push(arr);
        // }
        // // Multipath
        // if( $('input[id="mltpth"]').prop("checked") == true ){
        //     var price   = $('input[id="mltpth"]').val();
        //     multipathArr = {
        //         'Price': price
        //     }
        // }
        // // Background Change
        // if( $('input[id="bkgndchange"]').prop("checked") == true ){
        //     var price   = $('input[id="bkgndchange"]').val();
        //     var optVal = $('#bkgndchange-optn').val();
        //     backgrondArr = {
        //         'Price': price,
        //         'Option': optVal
        //     }
        // }
        // // Neck Joint
        // if( $('input[id="neckjoint"]').prop("checked") == true ){
        //     var price   = $('input[id="neckjoint"]').val();
        //     neckjointArr = {
        //         'Price': price,
        //     }
        // }
        // // Output file format
        // if( $('input[id="opff"]').prop("checked") == true ){
        //     var price   = $('input[id="opff"]').val();
        //     var optVal = $('#opff-optn').val();
        //     oppformatArr = {
        //         'Price': price,
        //         'Option': optVal
        //     }
        // }

        // var service_array = {
        //     'Crop Image': cropImageArr,
        //     'Multipath': multipathArr,
        //     'Shadow/ Reflect': shadowrftArr,
        //     'Background Change': backgrondArr,
        //     'Neckjoint': neckjointArr,
        //     'Output File Format': oppformatArr,
        // }
        // service_array = JSON.stringify(service_array);
        // console.log(service_array);
        
        // Delivery Price
        d_charge = $('input[name="d_charge"]:checked').val();
        // Vat
        // vat = $('#vat').html();
        // Total Base Value
        // totalphotoamount = $('#TotalPhotoAmount').html();
        // Sub Total
        // sub_total = $('#TotalOrderAmount').html();

        var dataJson = {
            // 'sub_category_id': sub_category_id,
            'j_name': j_name,
            'amnt': amnt,
            // 'additional_service': service_array,
            // 'additional_service_value': additional_service_value,
            // 'vat': vat,
            'd_charge': d_charge,
            // 'TotalPhotoAmount': totalphotoamount,
            // 'sub_total': sub_total
        };

        console.log(dataJson);

        if( errCount < 1 ){
            // Ajax Call Here
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: dataJson,
                success: function(data){
                   $('#try-claim-button').hide();
                   $('.try-bottom-data').show();

                   var ID = parseInt(data);

                   if(ID > 0){
                        $('.free_order_id').val(data);
                        $('#free_q_id').val(data);
                        var span = ('.try-bottom-data').find('#free_q_id');
                        console.log(span);
                        console.log(data);
                        var input = $('.try-bottom-data').find('.free_order_id');
                        console.log(input);
                        // $('#custom_quote_id').append(data);
                   }
                },
                error: function(request, status, error){
                    console.log(request.responseText);
                }
            });
            
            toastSuccess({success: 'Service added to cart'});
        
        }else{
            var data = { error: 'Please fix all errors' };
            toastFailed( data );
        }
    });

    /**
    * Method to Toast Error message
    */
    function toastFailed( data ) {
        // console.log( 'inside toast failed' );
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
        // console.log( 'inside toast success' );
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



