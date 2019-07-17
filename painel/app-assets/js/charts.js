function gera_cor(){
    var hexadecimais = '0123456789ABCDEF';
    var cor = '#';

    // Pega um número aleatório no array acima
    for (var i = 0; i < 6; i++ ) {
        //E concatena à variável cor
        cor += hexadecimais[Math.floor(Math.random() * 16)];
    }
    return cor;
}

$(document).ready(function () {
    showDivisaoPorMarcas();
    showDivisaoPorAnoModelo();
    showDivisaoStatusOS();
    google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyDSLvm0l8EsH5jXl-_b6_IsWl9k9i1n450'
    });
    google.charts.setOnLoadCallback(drawRegionsMap);
});

$("#btn_atualizar_graficos").click(function(){

    showDivisaoStatusOS();
});

function showDivisaoPorMarcas()
{
    {
        $.post("app-assets/functions/get_divisao_marca.php",
            function (data)
            {
                var marca = [];
                var qnt = [];
                var cor = gera_cor();
                for (var i in data) {
                    marca.push(data[i].marca);
                    qnt.push(data[i].qnt);
                }

                var chartdata = {
                    labels: marca,
                    datasets: [
                        {
                            label: 'Veículos ativos',
                            backgroundColor: cor,
                            borderColor: cor,
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: qnt
                        }
                    ]
                };
                var graphTarget = $("#divisao_marca");
/*               var options = {
                    scales: {
                        yAxes: [{
                            display: true,
                            stacked: true,
                            ticks: {
                               // min: 4000, // minimum value
                               // max: 6000 // maximum value
                            }
                        }]
                    }
                }; */
                var barGraphMarca = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata,
                 //   options: options
                });
            });
    }
};



function showDivisaoPorAnoModelo()
{

    {
        $.post("app-assets/functions/get_divisao_ano_modelo.php",
            function (data)
            {
                var ano_modelo = [];
                var qnt = [];
                var cor = gera_cor();
                for (var i in data) {
                    ano_modelo.push(data[i].ano_modelo);
                    qnt.push(data[i].qnt);
                }

                var chartdata = {
                    labels: ano_modelo,
                    datasets: [
                        {
                            label: 'Veículos ativos',
                            backgroundColor: cor,
                            borderColor: cor,
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: qnt
                        }
                    ]
                };
                var graphTarget = $("#divisao_ano_modelo");
                /*               var options = {
                                    scales: {
                                        yAxes: [{
                                            display: true,
                                            stacked: true,
                                            ticks: {
                                               // min: 4000, // minimum value
                                               // max: 6000 // maximum value
                                            }
                                        }]
                                    }
                                }; */
                var barGraphAno = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata,
                    //   options: options
                });
            });
    }
};

var douGraphStatus = null;

function showDivisaoStatusOS()
{
    if(douGraphStatus != null){
        douGraphStatus.destroy();
    }
    var dataInicial =  $("#dtInicialManutencao").val();
    var dataFinal =  $("#dtFinalManutencao").val();
    console.log(dataInicial);
    console.log(dataFinal);
    {
        $.post("app-assets/functions/get_os_por_status.php?dtInicialManutencao="+ dataInicial +"&dtFinalManutencao="+ dataFinal,
            function (data)
            {
                var motivo = [];
                var qnt = [];
                var cor = [];
                for (var i in data) {
                    motivo.push(data[i].motivo);
                    qnt.push(data[i].qnt);
                    cor.push(gera_cor());
                }
                var chartdata = {
                    labels: motivo,
                    datasets: [
                        {
                            backgroundColor: cor,
                            borderColor: cor,
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: qnt
                        }
                    ]
                };
                var graphTarget = $("#divisao_status");
                /*               var options = {
                                    scales: {
                                        yAxes: [{
                                            display: true,
                                            stacked: true,
                                            ticks: {
                                               // min: 4000, // minimum value
                                               // max: 6000 // maximum value
                                            }
                                        }]
                                    }
                                }; */
                douGraphStatus = new Chart(graphTarget, {
                    type: 'doughnut',
                    data: chartdata,
                    //   options: options
                });
            });
    }
};

//google charts -> grafico de mapa
/*
function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable([
        ['Country', 'Popularity'],
        ['Germany', 200],
        ['United States', 300],
        ['Brazil', 400],
        ['Canada', 500],
        ['France', 600],
        ['RU', 700]
    ]);

    var options = {};

    var chart = new google.visualization.GeoChart(document.getElementById('distribuicao_municipio'));

    chart.draw(data, options);
}

*/
function drawRegionsMap()
{
    var dataInicial =  $("#dtInicialManutencao").val();
    var dataFinal =  $("#dtFinalManutencao").val();
    {
        $.post("app-assets/functions/get_os_por_estado.php?dtInicialManutencao="+ dataInicial +"&dtFinalManutencao="+ dataFinal,
            function (data) {
                var cidade = [];
                var qnt = [];
                for (var i in data) {
                    cidade.push(data[i].cidade);
                    qnt.push(data[i].qnt);
                }

                var dados = new google.visualization.DataTable();
                dados.addColumn('string', 'City');
                dados.addColumn('number','OS');
                for (var k in data) {
                    dados.addRow([cidade[k],parseFloat(qnt[k])]);
                }
                var chart = new google.visualization.GeoChart(document.getElementById("divisao_status"));
                var options = {};
                chart.draw(dados, options);
            }
    )}
};