// $(function() {
//   var $win = $(window),
//       $main = $('main'),
//       $nav = $('nav'),
//       navHeight = $nav.outerHeight(),
//       navPos = $nav.offset().top,
//       fixedClass = 'is-fixed';
//
//   $win.on('load scroll', function() {
//     var value = $(this).scrollTop();
//     if ( value > navPos ) {
//       $nav.addClass(fixedClass);
//       $main.css('margin-top', navHeight);
//     } else {
//       $nav.removeClass(fixedClass);
//       $main.css('margin-top', '0');
//     }
//   });
// });

$(function() {
  var $win = $(window),
      $main = $('main'),
      $header = $('header'),
      headerHeight = $header.outerHeight(),
      headerPos = $header.offset().top,
      fixedClass = 'is-fixed';

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > headerPos ) {
      $header.addClass(fixedClass);
      $main.css('margin-top', headerHeight);
    } else {
      $header.removeClass(fixedClass);
      $main.css('margin-top', '0');
    }
  });
});
