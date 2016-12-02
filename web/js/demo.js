$(function () {
    var uri = $('#container').attr('uri');
    $.get(uri, function(csv) {
        $('#container').highcharts({
            title: {
                text: 'Evolution du nombre de réfugiés en France'
            },
            data: {
                csv: csv
            }
        });
    });
});