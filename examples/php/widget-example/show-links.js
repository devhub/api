$(function() {

  $('<p><a href="' + sb.uris.user + '">Login as user</a></p>')
    .appendTo('#body');

  $.each(sb.uris.sites, function(k, uri) {
    $('<p><a href="' + uri + '">Login to site ' + k + '</a></p>')
      .appendTo('#body');
  });

});
