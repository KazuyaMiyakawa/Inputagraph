$(function(){

  var user_id = $('#user_id').text();
  $.get('like_state', {user_id: user_id })
  .done(function(data){
    console.log(data);
    data.forEach(function(d){
      console.log(d['photo_id']);
      var id = '#photo' + d['photo_id'];
      $(id).find('.like-button').toggleClass('liked');
      $(id).find('.like-button').attr('src', 'images/icon_heart_full.png');
    });
  })
  .fail(function(){
    console.log("failed");
  });

  $('.like-button').click(function () {
    var elem = $(this);
    var photo_id = $(this).attr("id");
    var user_id = $('#user_id').text();
    var like_count_field = $(this).parent().parent().find('.like-count');
    $.get('like',
          { photo_id: photo_id,
            user_id: user_id })
    .done(function(data){
      console.log(data);
      like_count_field.html(data);
      elem.toggleClass('liked');
      if (elem.hasClass('liked')) {
        elem.attr('src', 'images/icon_heart_full.png');
      }else {
        elem.attr('src', 'images/icon_heart_border.png');
      }
    })
    .fail(function(){
      console.log("failed");
    });
  });

  function setLikedState(element){
    //element.toggleClass('liked');
    element.toggleClass('liked');
  }

});
