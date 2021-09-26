<?php

$editionTopic = new EditionTopic();

$year = 2020;
if (isset($_GET["year"])) {
    $year = $_GET["year"];
}

$topic = new Topic();
$topics = $topic->consultarTodos();


$accepted = $editionTopic->consultarAccepted($year);
$rejected = $editionTopic->consultarRejected($year);


?>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Estadisticas</h5>
                <select class="form-select" aria-label="Default select example" id="anios">

                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                </select>
                <div class="card-body ">
                    <div id="donutchart" style="width: 900px; height: 500px;"></div>
                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    let anio = document.getElementById('anios');

    anio.addEventListener('change',
        function () {
            var selectedOption = this.options[anio.selectedIndex];
            let url = "index.php?pid=<?php echo base64_encode("presentacion/estadisticas.php")?>&year=" + selectedOption.value;
            window.location.href = url;
        });

    // Accepted Papers

    google.charts.load("current", {packages: ["corechart", 'bar']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChartTwo);

    function drawChart() {
        var dataDonu = google.visualization.arrayToDataTable([
            ['Estado', 'Cantidad'],
            ['Accepted',     <?php echo $accepted ?>],
            ['Rejected',      <?php echo $rejected ?>],

        ]);

        var viewDonu = new google.visualization.DataView(dataDonu);

        var optionsDonu = {
            title: 'Accepted Papers ' + '<?php echo $accepted + $rejected ?>',
            pieHole: 0.4,
        };

        var chartDonu = new google.visualization.PieChart(document.getElementById("donutchart"));
        chartDonu.draw(viewDonu, optionsDonu);
    }

    //Papers by Topic
    // google.charts.load('current', {'packages': ['bar']});
    // google.charts.setOnLoadCallback(drawChart);

    function drawChartTwo() {
        var dataTopic = google.visualization.arrayToDataTable([
            ['Topic', 'Accepted', 'Rejected'],
            <?php

            foreach ($topics as $top) {
                $rejectedTopic = $editionTopic->consultarRejectedTopic($year, $top->getName());
                $acceptedTopic = $editionTopic->consultarAcceptedTopic($year, $top->getName());
                if (!isset($rejectedTopic)) {
                    $rejectedTopic = 0;
                }

                if (!isset($acceptedTopic)) {
                    $acceptedTopic = 0;
                }
                echo "['" . $top->getName() . "', " . $acceptedTopic . ", " . $rejectedTopic . "],\n";
            }

            ?>

        ]);

        var viewTopic = new google.visualization.DataView(dataTopic);

        var optionsTopic = {
            chart: {
                title: 'Papers by Topic',
                subtitle: '',
            }
        };

        var chartTopic = new google.charts.Bar(document.getElementById('columnchart_material'));

        chartTopic.draw(dataTopic, google.charts.Bar.convertOptions(optionsTopic));
    }


</script>

