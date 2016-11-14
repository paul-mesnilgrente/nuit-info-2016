$('a[href="#preview"]').click(function() {
markdown = $('#appbundle_post_contenu').val();
$.ajax({
  method: "POST",
  url: "/post/transformer",
  data: {
    'markdown': markdown
  },
  dataType: "html",
  success: function(retourHTML) {
    $('#preview').html(retourHTML);
    return false;
  }
});
$(this).tab('show');
return false;
});
