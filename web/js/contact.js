$(document).ready(function() {
    $('.title-inner').each(function(){
        var legendWidth = $(this).outerWidth();
        var margin = 'calc((100% - '+legendWidth+'px) / 2)';
        $(this).css('margin-left', margin);
        $(this).css('margin-right', margin);
    });
});