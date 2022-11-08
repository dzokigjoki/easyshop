$(document).ready(function () {
  $('[data-add-to-wish-list]').click(function () {
    var productId = $(this).attr('value');
    $.ajax({
      type: 'post',
      url: '/wishlist/add',
      data: {
        pid: productId
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (data) {
        toastr.success('Успешно додаден продукт кон листата на желби');
        $('#wishlist').html(data.html);
        $('[data-wishlist-value]').text(data.totalProducts);
      },
      error: function (data) {
        toastr.warning(JSON.parse(data.responseText).error);
      }
    });
  });

  $('#wishlist').on('click', '[data-remove-from-wish-list]', function () {
    var productId = $(this).attr('value');
    $.ajax({
      type: 'delete',
      url: '/wishlist/remove',
      data: {
        pid: productId
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (data) {
        toastr.success('Продуктот е успешно избришан од листата на желби');
        $('[wish-list-row="' + productId + '"]').remove();
        var number = parseInt($('[data-wishlist-value]').first().text());
        $('[data-wishlist-value]').text(number-1);
      },
      error: function () {
        toastr.warning('Продуктот не постои во листата на желби');
      }
    });
  });
});
