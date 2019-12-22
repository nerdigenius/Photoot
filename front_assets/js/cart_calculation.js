$(function(){
    'use strict';
    $(document).on('click', '#f_button', function(e){
        e.preventDefault();
        $('#single_product_form').submit();
        console.log('button clicked');
    });

    var basePrice, numCopy, adSrvRate, delTime;
    
    // Get Number of coppies
    $('#amnt').on('keyup', function(){
        var values = getValues();
        var data = calculatePrice(values);
        var qntt = $(this).val();
        $('#number').val(qntt);
        $(this).removeClass('showError');
    });

    // Get Name
    $('#j_name').on('keyup',function(){
        var name = $(this).val();
        $('#name').val(name);
        $(this).removeClass('showError');
    });

    // Get Additional Services
    $('ul.add_service li').on('click', function(){
        var values = getValues();
        var data = calculatePrice(values);
    });

    $('input[type="radio"]').on('change', function(){
        var val     = $(this).val();
        var values  = getValues();
        var data    = calculatePrice(values);
        // console.log(values);
        $('#deliveryTime').html(values[0]);
        $('.delivery_price').val(values[0]);
    });
    
    function calculatePrice(arr, val){
        var vat = 22;
            vat = parseFloat(vat);

        var TotalOrderAmount;
        var delivery_value  = arr[0];
        var additionSrv     = arr[1];
        var productPrice    = arr[2];

        // Set net price
        var net_price = parseFloat(productPrice) + parseFloat(additionSrv) + parseFloat(delivery_value);
            net_price = net_price.toFixed(2); 
            net_price = parseFloat(net_price);

        var price           = arrSum(arr);
            price           = parseFloat(price);

        // Set Total    
        var vat             = (vat/100)*net_price;
            vat             = vat.toFixed(2);
            vat             = parseFloat(vat);

        // Set Total Price
        var total           = net_price+vat;
            total           = total.toFixed(2);
            total           = parseFloat(total);

           
        
        // Set Ammount on Sidebar
        $('#TotalPhotoAmount').html(productPrice);
        $('.totalphotoamount').val(productPrice);
        
        // Set Additional Service Charge on Sidebar
        $('#TotalAddiServices').html(additionSrv);
        $('.additional_service_value').val(additionSrv);

        $('#deliveryTime').html(delivery_value);
        $('.delivery_price').val(delivery_value);
        
        // Set VAT on Sidebar
        $('#vat').html(vat);
        $('.vat').val(vat);

        
        $('#netprice').html(net_price);
        $('#TotalOrderAmount').html(total);
        $('#TotalOrderAmountdata').val(total);
    }
 
    function getValues(){
        var data        = []; //['delivery_charge', 'additional_service', 'basePrice']
        var cont        = [];
        var DelCharge  = '';
        // Get number of coppies
        if( $('#amnt').val() != '' ){
            numCopy = $('#amnt').val();
            numCopy = parseFloat(numCopy);
        }

        // Get Price of the product
        if( $('#price').val() != '' ){
            basePrice = $('#price').val();
            basePrice = parseFloat(basePrice);
        }

        // Get Additional Charge
        $('input[type=checkbox]').each(function () {
            var sThisVal = ( this.checked ? $(this).val() : "" );
            if(sThisVal != ''){
                var dtad    = parseFloat( sThisVal );
                dtad        = numCopy*dtad;
                dtad        = dtad.toFixed(2);
                cont.push(dtad);
            }
        });


        DelCharge       = $('input[name=d_charge]:checked').val();
        $('input[type=radio][name=d_charge]').on('change', function(){
            DelCharge   = $(this).val();
        });
        // Update array of data
        if( DelCharge != '' ){
            // Get Delivery Charge
            DelCharge       = parseFloat(DelCharge);
            DelCharge       = numCopy*DelCharge;
            DelCharge       = DelCharge.toFixed(2);
            data.push(DelCharge);
        }
        
        // Add aditional service to dataList
        var sum         = arrSum(cont);
        data.push(sum);
        
        // Add Base Value to the array
        var baseValue   = numCopy*basePrice;
        data.push(baseValue);

        // Return Array
        return data;
    }
 
    function arrSum(adt){
        var sum = 0;
        for (var i = adt.length - 1; i >= 0; i--) {
            sum += adt[i] << 0;
        }
        return sum;
    }
});