$(function(){

  // モーダルウィンドウが開くときの処理
  $(".modalOpen").click(function(){

      var id = $(this).parent().children('.photo-id').text();
      var modalName = "#modal" + id;

      $(modalName).fadeIn();
      $(this).addClass("open");
      return false;
  });

  // モーダルウィンドウが閉じるときの処理
  $(".modalClose").click(function(){
      $(this).parents(".modal").fadeOut();
      $(".modalOpen").removeClass("open");
      return false;
  });

});
