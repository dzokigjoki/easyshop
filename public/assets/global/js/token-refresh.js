$(document).ready(function () {

  setInterval(keepTokenAlive, 1000 * 60 * 5); // every 5 mins

  function keepTokenAlive() {
      $.ajax({
          url: '/keep-token-alive', //https://stackoverflow.com/q/31449434/470749
          method: 'post',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  }
});