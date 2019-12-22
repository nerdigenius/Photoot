$("td").click(function(){
    var theClass = '#'+this.className;
    // console.log( theClass );
    $(theClass).toggle('slow');
});