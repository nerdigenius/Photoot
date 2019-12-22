$(function(){
    // Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-item a[href="#' + url.split('#')[1] + '"]').tab('show');
    } 

    // Change hash for page-reload
    $('.nav-item a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })


  // var hash = window.location.hash;
  // hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  // $('.nav-tabs a').click(function (e) {
  //   $(this).tab('show');
  //   var scrollmem = $('body').scrollTop() || $('html').scrollTop();
  //   window.location.hash = this.hash;
  //   $('html,body').scrollTop(scrollmem);
  // });


});
