
//JavaScript for Updating/Drawing Google-Chart
    //Google Charts 
      var avg_2010_1=0;
      var avg_2011_1=0;
      var avg_2012_1=0;
      var avg_2013_1=0;
      var avg_2014_1=0;
      var avg_2010_2=0;
      var avg_2011_2=0;
      var avg_2012_2=0;
      var avg_2013_2=0;
      var avg_2014_2=0;
      var avg_2010_3=0;
      var avg_2011_3=0;
      var avg_2012_3=0;
      var avg_2013_3=0;
      var avg_2014_3=0;
      var county_1="";
      var county_2="";
      var county_n="National";
      var county_avgs= [
          {county:"Carlow",average_2010:174698,average_2011:139335,average_2012:108718,average_2013:112979,average_2014:112373,average_2015:null},
          {county:"Cavan",average_2010:142459,average_2011:132563,average_2012:105459,average_2013:81375,average_2014:71411,average_2015:null},
          {county:"Cork",average_2010:230537,average_2011:199052,average_2012:174481,average_2013:176172,average_2014:171896,average_2015:null},
          {county:"Clare",average_2010:175790,average_2011:158837,average_2012:131523,average_2013:118017,average_2014:118180,average_2015:null},
          {county:"Dublin",average_2010:333402,average_2011:309603,average_2012:281582,average_2013:328049,average_2014:377486,average_2015:null},
          {county:"Kerry",average_2010:188606,average_2011:162381,average_2012:144889,average_2013:131442,average_2014:126360,average_2015:null},
          {county:"Galway",average_2010:224245,average_2011:195568,average_2012:166522,average_2013:157232,average_2014:157059,average_2015:null},
          {county:"Kildare",average_2010:239927,average_2011:225364,average_2012:194554,average_2013:198667,average_2014:220349,average_2015:null},
          {county:"Kilkenny",average_2010:210286,average_2011:165839,average_2012:136620,average_2013:132614,average_2014:134436,average_2015:null},
          {county:"Laois",average_2010:164101,average_2011:125742,average_2012:95428,average_2013:99715,average_2014:99789,average_2015:null},
          {county:"Leitrim",average_2010:128843,average_2011:109770,average_2012:97779,average_2013:72989,average_2014:80440,average_2015:null},
          {county:"Limerick",average_2010:190187,average_2011:167474,average_2012:148058,average_2013:139680,average_2014:125649,average_2015:null},
          {county:"Longford",average_2010:136419,average_2011:101150,average_2012:83196,average_2013:67204,average_2014:69537,average_2015:null},
          {county:"Louth",average_2010:189801,average_2011:158026,average_2012:139963,average_2013:129200,average_2014:127544,average_2015:null},
          {county:"Mayo",average_2010:158985,average_2011:140381,average_2012:107990,average_2013:110395,average_2014:101227,average_2015:null},
          {county:"Meath",average_2010:226347,average_2011:197429,average_2012:177308,average_2013:171714,average_2014:186999,average_2015:null},
          {county:"Monaghan",average_2010:152939,average_2011:130321,average_2012:109991,average_2013:91839,average_2014:89042,average_2015:null},
          {county:"Offaly",average_2010:160506,average_2011:133356,average_2012:120639,average_2013:102516,average_2014:121600,average_2015:null},
          {county:"Roscommon",average_2010:138353,average_2011:106903,average_2012:87468,average_2013:77633,average_2014:75179,average_2015:null},
          {county:"Sligo",average_2010:162955,average_2011:168278,average_2012:113015,average_2013:109508,average_2014:120815,average_2015:null},
          {county:"Tipperary",average_2010:161921,average_2011:154043,average_2012:123664,average_2013:112205,average_2014:112119,average_2015:null},
          {county:"Waterford",average_2010:181184,average_2011:150037,average_2012:125443,average_2013:119566,average_2014:122369,average_2015:null},
          {county:"Wexford",average_2010:179267,average_2011:143296,average_2012:124829,average_2013:116129,average_2014:121006,average_2015:null},
          {county:"Westmeath",average_2010:159505,average_2011:135483,average_2012:112259,average_2013:107613,average_2014:102021,average_2015:null},
          {county:"Wicklow",average_2010:294745,average_2011:247373,average_2012:236248,average_2013:247183,average_2014:262788,average_2015:null},
          {county:"Donegal",average_2010:151966,average_2011:128823,average_2012:105337,average_2013:93234,average_2014:90602,average_2015:null},
          {county:"National",average_2010:243325,average_2011:215347,average_2012:193985,average_2013:206036,average_2014:218652,average_2015:null}];

      google.load('visualization', '1.0', {'packages':['corechart']});
      //$(document).ready(drawChart);
      $(document).ready(call_chart);

      function call_chart(){

         
        county_1 = document.getElementById("dd1").value;
        county_2 = document.getElementById("dd2").value;
        
        var i;
        for(i = 0; i < county_avgs.length; i += 1){
          var x = county_avgs[i];
          if(x.county==county_1) {
                avg_2010_1=parseInt(x.average_2010);
                avg_2011_1=parseInt(x.average_2011);
                avg_2012_1=parseInt(x.average_2012);
                avg_2013_1=parseInt(x.average_2013);
                avg_2014_1=parseInt(x.average_2014);
          }
          if(x.county==county_2) {
                avg_2010_2=parseInt(x.average_2010);
                avg_2011_2=parseInt(x.average_2011);
                avg_2012_2=parseInt(x.average_2012);
                avg_2013_2=parseInt(x.average_2013);
                avg_2014_2=parseInt(x.average_2014);
          }
          if(x.county=="National") {
                avg_2010_3=parseInt(x.average_2010);
                avg_2011_3=parseInt(x.average_2011);
                avg_2012_3=parseInt(x.average_2012);
                avg_2013_3=parseInt(x.average_2013);
                avg_2014_3=parseInt(x.average_2014);
          }
        }
        var data = new google.visualization.arrayToDataTable([
              //['Year', county_1, county_2, 'county_n'],
              ['Year', county_1, county_2, 'National'],
              ['2010', avg_2010_1, avg_2010_2, avg_2010_3],
              ['2011', avg_2011_1, avg_2011_2, avg_2011_3],
              ['2012', avg_2012_1 , avg_2012_2,avg_2012_3],
              ['2013', avg_2013_1 , avg_2013_2,avg_2013_3],
              ['2014', avg_2014_1 , avg_2014_2,avg_2014_3],
        ]);
        //var title = 'House Price Averages by County:'.concat(county_1.concat(' vs '.concat(county_2)));
        var options = {'title':'House Price Averages by County:','is3D':true,
                      };
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }