$(document).ready(function() {
    $('code').each(function(index) {
      var classe = $(this).attr('class');
      $(this).removeClass();
      $(this).addClass('language-' + classe);
    });
});
