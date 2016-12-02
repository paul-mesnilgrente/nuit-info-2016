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

            chart:{
                height: 700
            },

            legend: {
                layout: 'horizontal',
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.85)',
                floating: true,
                verticalAlign: 'top',
                y: 25
            },

            colorAxis: {
                min: 1,
                type: 'logarithmic',
                minColor: '#EEEEFF',
                maxColor: '#000022',
                stops: [
                    [0, '#B3A4FF'],
                    [0.67, '#4F41D1'],
                    [1, '#2B2094']
                ]
            },
            
            series: [{
                animation: {
                    duration: 1000
                },
                data: data,
                mapData: Highcharts.maps['custom/europe'],
                joinBy: ['iso-a2', 'code'],
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