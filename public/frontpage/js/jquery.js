$('.tap1').click(function(){
  $('.hide-dropdown1').toggleClass('has-dropdown1');
});

$('.tap2').click(function(){
  $('.hide-dropdown2').toggleClass('has-dropdown2');
});

$('.btn-cart').on('click',function() {
    $(this).attr("disabled",true);
});
