 <script> //Test run at Google Charts
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table. Eg is Wexford
        var data = new google.visualization.arrayToDataTable([
          ['Year', 'Wexford', 'Wicklow', 'National'],
          ['2010', 179563, 294120.1097, 243325.0286],
          ['2011', 143296, 247373.4193,215347.3284],
          ['2012', 139024 , 207622.9119,200949.104],
          ['2012', 142024 , 215622.9119,203949.104]
          //Made up for both
         // ['2013', 149024 ,      152296],
          //['2014', 155024 ,      167296]
        ]);
        // Set chart options
        var options = {'title':'House Price Averages by County: Wexford vs Wicklow',
                       };

        Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      } 
</script>
<div id="chart_div"></div>