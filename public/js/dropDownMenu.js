$(function(){
    // $('#menu li').hover(function(){
    //     $("ul:not(:animated)", this).slideDown();
    // }, function(){
    //     $("ul.menu-child",this).slideUp();
    // });
    $('#menu li').click(function(){
        if ($(this).hasClass('closed')) {
          $("ul:not(:animated)", this).slideDown();
        }else {
          $("ul.menu-child",this).slideUp();
        }
        $(this).toggleClass('closed');
    });
});
