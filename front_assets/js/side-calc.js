$(function(){
    var hh = $('#header').outerHeight();
    var fh = $('#bottomm').outerHeight();
    console.log(fh);
    // using https://rawgit.com/bassjobsen/affix/master/assets/js/affix.js
    $('.navbar').affix({
        offset:{
            top: hh,
            bottom: hh - 500
        }
    });

    $('#sidemenu').affix({
        offset:{
            top: hh,
            bottom: fh + 50
        }
    });

    

});


