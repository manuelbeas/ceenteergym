setTimeout(function(){
  $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
  $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
  $('.paginate_button.next').addClass('btn btn-outline-success btn-sm');
  $('.paginate_button.next').addClass('btn btn-outline-success btn-sm');
  $('.paginate_button.current').addClass('btn btn-outline-secondary btn-sm');
  $('.paginate_button.current').attr('style','margin-left: 5px; margin-right: 5px;');
  $('#customers_filter').attr('style','float: right;');
  $('select[name=customers_length]').addClass('form-control-sm');


  $("select[name='customers_length']").on('change', function() {
    $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.next').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.next').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.current').addClass('btn btn-outline-secondary btn-sm');
    $('.paginate_button.current').attr('style','margin-left: 5px; margin-right: 5px;');
  })

  $('customers_next').click(function() {
    $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.next').addClass('btn btn-outline-success btn-sm');
    setTimeout(function(){
      $('#customers_next').addClass('btn btn-outline-success btn-sm');
      $('#customers_previous').addClass('btn btn-outline-success btn-sm');
    }, 500);
    $('.paginate_button.current').addClass('btn btn-outline-secondary btn-sm');
    $('.paginate_button.current').attr('style','margin-left: 5px; margin-right: 5px;');
  });

  $('#customers_previous').click(function() {
    $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.previous.disabled').addClass('btn btn-outline-success btn-sm');
    $('.paginate_button.next').addClass('btn btn-outline-success btn-sm');
    setTimeout(function(){
      $('#customers_next').addClass('btn btn-outline-success btn-sm');
      $('#customers_previous').addClass('btn btn-outline-success btn-sm');
    }, 500);
    $('.paginate_button.current').addClass('btn btn-outline-secondary btn-sm');
    $('.paginate_button.current').attr('style','margin-left: 5px; margin-right: 5px;');
  });
}, 500);
