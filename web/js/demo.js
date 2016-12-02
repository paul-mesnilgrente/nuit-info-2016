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

    var europe = $('#map').attr('uri');
    $.getJSON(europe, function (data) {
        // Make codes uppercase to match the map data
        $.each(data, function () {
            this.code = this.code.toUpperCase();
        });
        // Instanciate the map
        Highcharts.mapChart('map', {
            title: {
                text: 'Immigration en Europe'
            },

            legend: {
                layout: 'horizontal',
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.85)',
                floating: true,
                verticalAlign: 'top',
                y: 25
            },

            mapNavigation: {
                enabled: true
            },
            
            series: [{
                animation: {
                    duration: 1000
                },
                data: data,
                mapData: Highcharts.maps['custom/europe'],
                joinBy: ['postal-code', 'code'],
                dataLabels: {
                    enabled: true,
                    color: '#FFFFFF',
                    format: '{point.code}'
                },
                name: 'Densité de population'
            }]
        });
    });
});