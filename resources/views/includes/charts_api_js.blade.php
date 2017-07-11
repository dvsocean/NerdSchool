<!-- JS API-->
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Posts', <?php echo $user->posts->count(); ?>],
            ['Comments', <?php echo $user->singles->count(); ?>],
            ['File uploads', <?php echo $user->files->count(); ?>],
            ['Email notify', <?php echo $user->additionals->count(); ?>],
            ['Server', <?php echo $user->server->count(); ?>]
        ]);
        var options = {
            title: 'Activity',
            backgroundColor: 'transparent',
            is3D: true,
            pieSliceText: "none"
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
<!-- JS API-->