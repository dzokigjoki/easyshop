//instafeed
$.fn.func_instafeed = function(new_obj) {
  var $this = $(this);

  if (!$this.length) return;

  var new_obj = new_obj || {},
    set_obj = {
      get: 'user',
      userId: 'xxx',
      clientId: 'xxx',
      limit: 6,
      sortBy: 'most-liked',
      resolution: "standard_resolution",
      accessToken: 'xxx.xxx.xxx',
      template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>'
    };

  $.extend(set_obj, new_obj);

  var feed = new Instafeed(set_obj);
  feed.run();
};

$(document).ready(function() {
  $('.instafeed').func_instafeed({
    limit: 6
  });
  $('.instafeed-fluid').func_instafeed({
    limit: 10
  });
});