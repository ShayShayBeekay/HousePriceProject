 $(function() {
  function county_avg(){
    //Iterate through array
    //Check if 
      var county_1 = document.getElementById('dd1').value;
      var county_2 = document.getElementById('dd2').value;
      $each.(county_avgs,(key, value){
        if (value.county==county_1) {
          avg_2010_1=value.average_2010;
          avg_2011_1=value.average_2011;
          avg_2012_1=value.average_2012;
          avg_2013_1=value.average_2013;
          avg_2014_1=value.average_2014;
        }
        if (value.county==county_2) {
          avg_2010_2=value.average_2010;
          avg_2011_2=value.average_2011;
          avg_2012_2=value.average_2012;
          avg_2013_2=value.average_2013;
          avg_2014_2=value.average_2014;
        }
        var data = new google.visualization.arrayToDataTable([
          ['Year', county_1, county_2, 'National'],
          ['2010', avg_2010_1, avg_2010_2, 243325],
          ['2011', avg_2011_1, avg_2011_2, 215347],
          ['2012', avg_2012_1 , avg_2012_2,200949],
          ['2013', avg_2013_1 , avg_2013_2,203949],
          ['2014', avg_2014_1 , avg_2014_2,205949]
        ]);
        // Set chart options
        //var title = 'House Price Averages by County:'.concat(county_1.concat(' vs '.concat(county_2)));
        var options = {'title':title,};
        var options = {'title':title,};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      function drawChart_new() {
        // Create the data table. Eg is Wexford
        var data = new google.visualization.arrayToDataTable([
          ['Year', county_1, county_2, 'National'],
          ['2010', avg_2010_1, avg_2010_2, 243325],
          ['2011', avg_2011_1, avg_2011_2, 215347],
          ['2012', avg_2012_1 , avg_2012_2,200949],
          ['2013', avg_2013_1 , avg_2013_2,203949],
          ['2014', avg_2014_1 , avg_2014_2,205949]
        ]);
        // Set chart options
        //var title = 'House Price Averages by County:'.concat(county_1.concat(' vs '.concat(county_2)));
        var options = {'title':title,};
        var options = {'title':title,};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
});