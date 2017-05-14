

$(function () {
  $('.icon_image').hover(function() {
    $('#modal-overlay').fadeIn();
    $(this).next('.arrow_box').fadeIn();
  }, function(){
    $(this).next('.arrow_box').fadeOut();
    $('#modal-overlay').fadeOut();
  });

  $('.icon_image')
    .bind( 'touchstart', function(){
      $('#modal-overlay').fadeIn();
      $(this).next('.arrow_box').fadeIn();
  }).bind( 'touchend', function(){
      $(this).next('.arrow_box').fadeOut();
      $('#modal-overlay').fadeOut();
  });

});


$(function () {
  $('#user_list').hide();
  $('#selectList').click(function() {
    if ($(this).attr('class') == 'selected') {
      console.log($(this));
      $(this).removeClass('selected').next('#user_list').slideUp('fast');
    } else {
      $('#selectList').removeClass('selected');
      $('#user_list').hide();
      $(this).addClass('selected').next('#user_list').slideDown('fast');
    }
  });
  $('#selectList,ul').hover(function(){
    over_flg = true;
  }, function(){
    over_flg = false;
  });
  $('body').click(function() {
    if (over_flg == false) {
      $('#selectList').removeClass('selected');
      $('#user_list').slideUp('fast');
    }
  });
  $(".topScrpll").hover(
    function(){
      $("html,body").animate({scrollTop:0},"fast");
    }
  );
});

