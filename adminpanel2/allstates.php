<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All States Sessions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>All States Sessions</h4>
            </div>
            <div class="card-body">
                <div id="allStatesChart"></div>
            </div>
        </div>
    </div>

    <?php
    // PHP array containing states data
    $statesData = [
        ["name" => "Andhra Pradesh", "sessions" => 4000],
        ["name" => "Arunachal Pradesh", "sessions" => 1100],
        ["name" => "Assam", "sessions" => 1300],
        ["name" => "Bihar", "sessions" => 900],
        ["name" => "Goa", "sessions" => 3500],
        ["name" => "Gujarat", "sessions" => 2000],
        ["name" => "Haryana", "sessions" => 2500],
        ["name" => "Himachal Pradesh", "sessions" => 1200],
        ["name" => "Jharkhand", "sessions" => 1800],
        ["name" => "Karnataka", "sessions" => 3200],
        ["name" => "Kerala", "sessions" => 2200],
        ["name" => "Madhya Pradesh", "sessions" => 3000],
        ["name" => "Maharashtra", "sessions" => 3700],
        ["name" => "Manipur", "sessions" => 1400],
        ["name" => "Meghalaya", "sessions" => 1000],
        ["name" => "Mizoram", "sessions" => 800],
        ["name" => "Nagaland", "sessions" => 500],
        ["name" => "Odisha", "sessions" => 2100],
        ["name" => "Punjab", "sessions" => 2900],
        ["name" => "Rajasthan", "sessions" => 3500],
        ["name" => "Sikkim", "sessions" => 400],
        ["name" => "Tamil Nadu", "sessions" => 4400],
        ["name" => "Telangana", "sessions" => 3700],
        ["name" => "Tripura", "sessions" => 600],
        ["name" => "Uttarakhand", "sessions" => 1000],
        ["name" => "Uttar Pradesh", "sessions" => 5000],
        ["name" => "West Bengal", "sessions" => 3000]
    ];
    ?>

    <script>
        // Fetch data from PHP array
        var statesData = <?php echo json_encode($statesData); ?>;

        // Render the horizontal bar chart
        var options = {
            chart: {
                type: 'bar',
                height: 600,
                width: '100%'
            },
            series: [{
                name: 'Sessions',
                data: statesData.map(state => state.sessions)
            }],
            xaxis: {
                categories: statesData.map(state => state.name),
                title: {
                    text: 'States',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Sessions',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                    }
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            colors: ['#AA4465']
        };

        var chart = new ApexCharts(document.querySelector("#allStatesChart"), options);
        chart.render();
    </script>
</body>
</html>
