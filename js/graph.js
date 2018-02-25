/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

graph.js

This file contains the JavaScript for adding the graph to the information panel for the Overview section of the map.
*/


//Set up array for later use.
var county_med_month = [];

//load the Google Charts Visualisation package
google.load("visualization","1.0",{packages:["corechart"]});

//Call county_med_chart method on page load
$(document).ready(county_med_chart);

function county_med_chart(){
    //Get counties selected in drop down menus and store in below variables
    county_1=document.getElementById("dd1_c").value;
    county_2=document.getElementById("dd2_c").value;
    //Set up variable for later use.
    var c;
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    // this method is used to capture the response of the http request
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var county_med_month = JSON.parse(xmlhttp.responseText);
            // and now you can use the array
            if(county_med_month.length > 0){
                for(var c=0;c<county_med_month.length;c+=1){
                  var a=county_med_month[c];
                  if(String(a["county"])==String(county_1)){
                    //Parse the value for each of the medians for the 1st county into a variable
                    med_jan_10_1=parseFloat(a["med_jan_10"]);
                    med_feb_10_1=parseFloat(a["med_feb_10"]);
                    med_mar_10_1=parseFloat(a["med_mar_10"]);
                    med_apr_10_1=parseFloat(a["med_apr_10"]);
                    med_may_10_1=parseFloat(a["med_may_10"]);
                    med_jun_10_1=parseFloat(a["med_jun_10"]);
                    med_jul_10_1=parseFloat(a["med_jul_10"]);
                    med_aug_10_1=parseFloat(a["med_aug_10"]);
                    med_sep_10_1=parseFloat(a["med_sep_10"]);
                    med_oct_10_1=parseFloat(a["med_oct_10"]);
                    med_nov_10_1=parseFloat(a["med_nov_10"]);
                    med_dec_10_1=parseFloat(a["med_dec_10"]);
                    med_jan_11_1=parseFloat(a["med_jan_11"]);
                    med_feb_11_1=parseFloat(a["med_feb_11"]);
                    med_mar_11_1=parseFloat(a["med_mar_11"]);
                    med_apr_11_1=parseFloat(a["med_apr_11"]);
                    med_may_11_1=parseFloat(a["med_may_11"]);
                    med_jun_11_1=parseFloat(a["med_jun_11"]);
                    med_jul_11_1=parseFloat(a["med_jul_11"]);
                    med_aug_11_1=parseFloat(a["med_aug_11"]);
                    med_sep_11_1=parseFloat(a["med_sep_11"]);
                    med_oct_11_1=parseFloat(a["med_oct_11"]);
                    med_nov_11_1=parseFloat(a["med_nov_11"]);
                    med_dec_11_1=parseFloat(a["med_dec_11"]);
                    med_jan_12_1=parseFloat(a["med_jan_12"]);
                    med_feb_12_1=parseFloat(a["med_feb_12"]);
                    med_mar_12_1=parseFloat(a["med_mar_12"]);
                    med_apr_12_1=parseFloat(a["med_apr_12"]);
                    med_may_12_1=parseFloat(a["med_may_12"]);
                    med_jun_12_1=parseFloat(a["med_jun_12"]);
                    med_jul_12_1=parseFloat(a["med_jul_12"]);
                    med_aug_12_1=parseFloat(a["med_aug_12"]);
                    med_sep_12_1=parseFloat(a["med_sep_12"]);
                    med_oct_12_1=parseFloat(a["med_oct_12"]);
                    med_nov_12_1=parseFloat(a["med_nov_12"]);
                    med_dec_12_1=parseFloat(a["med_dec_12"]);
                    med_jan_13_1=parseFloat(a["med_jan_13"]);
                    med_feb_13_1=parseFloat(a["med_feb_13"]);
                    med_mar_13_1=parseFloat(a['med_mar_13']);
                    med_apr_13_1=parseFloat(a["med_apr_13"]);
                    med_may_13_1=parseFloat(a["med_may_13"]);
                    med_jun_13_1=parseFloat(a["med_jun_13"]);
                    med_jul_13_1=parseFloat(a["med_jul_13"]);
                    med_aug_13_1=parseFloat(a["med_aug_13"]);
                    med_sep_13_1=parseFloat(a["med_sep_13"]);
                    med_oct_13_1=parseFloat(a["med_oct_13"]);
                    med_nov_13_1=parseFloat(a["med_nov_13"]);
                    med_dec_13_1=parseFloat(a["med_dec_13"]);
                    med_jan_14_1=parseFloat(a["med_jan_14"]);
                    med_feb_14_1=parseFloat(a["med_feb_14"]);
                    med_mar_14_1=parseFloat(a["med_mar_14"]);
                    med_apr_14_1=parseFloat(a["med_apr_14"]);
                    med_may_14_1=parseFloat(a["med_may_14"]);
                    med_jun_14_1=parseFloat(a["med_jun_14"]);
                    med_jul_14_1=parseFloat(a["med_jul_14"]);
                    med_aug_14_1=parseFloat(a["med_aug_14"]);
                    med_sep_14_1=parseFloat(a["med_sep_14"]);
                  }
                  else if(String(a["county"])==String(county_2)){
                    //Parse the value for each of the medians for the 2nd county into a variable
                    med_jan_10_2=parseFloat(a["med_jan_10"]);
                    med_feb_10_2=parseFloat(a["med_feb_10"]);
                    med_mar_10_2=parseFloat(a["med_mar_10"]);
                    med_apr_10_2=parseFloat(a["med_apr_10"]);
                    med_may_10_2=parseFloat(a["med_may_10"]);
                    med_jun_10_2=parseFloat(a["med_jun_10"]);
                    med_jul_10_2=parseFloat(a["med_jul_10"]);
                    med_aug_10_2=parseFloat(a["med_aug_10"]);
                    med_sep_10_2=parseFloat(a["med_sep_10"]);
                    med_oct_10_2=parseFloat(a["med_oct_10"]);
                    med_nov_10_2=parseFloat(a["med_nov_10"]);
                    med_dec_10_2=parseFloat(a["med_dec_10"]);
                    med_jan_11_2=parseFloat(a["med_jan_11"]);
                    med_feb_11_2=parseFloat(a["med_feb_11"]);
                    med_mar_11_2=parseFloat(a["med_mar_11"]);
                    med_apr_11_2=parseFloat(a["med_apr_11"]);
                    med_may_11_2=parseFloat(a["med_may_11"]);
                    med_jun_11_2=parseFloat(a["med_jun_11"]);
                    med_jul_11_2=parseFloat(a["med_jul_11"]);
                    med_aug_11_2=parseFloat(a["med_aug_11"]);
                    med_sep_11_2=parseFloat(a["med_sep_11"]);
                    med_oct_11_2=parseFloat(a["med_oct_11"]);
                    med_nov_11_2=parseFloat(a["med_nov_11"]);
                    med_dec_11_2=parseFloat(a["med_dec_11"]);
                    med_jan_12_2=parseFloat(a["med_jan_12"]);
                    med_feb_12_2=parseFloat(a["med_feb_12"]);
                    med_mar_12_2=parseFloat(a["med_mar_12"]);
                    med_apr_12_2=parseFloat(a["med_apr_12"]);
                    med_may_12_2=parseFloat(a["med_may_12"]);
                    med_jun_12_2=parseFloat(a["med_jun_12"]);
                    med_jul_12_2=parseFloat(a["med_jul_12"]);
                    med_aug_12_2=parseFloat(a["med_aug_12"]);
                    med_sep_12_2=parseFloat(a["med_sep_12"]);
                    med_oct_12_2=parseFloat(a["med_oct_12"]);
                    med_nov_12_2=parseFloat(a["med_nov_12"]);
                    med_dec_12_2=parseFloat(a["med_dec_12"]);
                    med_jan_13_2=parseFloat(a["med_jan_13"]);
                    med_feb_13_2=parseFloat(a["med_feb_13"]);
                    med_mar_13_2=parseFloat(a['med_mar_13']);
                    med_apr_13_2=parseFloat(a["med_apr_13"]);
                    med_may_13_2=parseFloat(a["med_may_13"]);
                    med_jun_13_2=parseFloat(a["med_jun_13"]);
                    med_jul_13_2=parseFloat(a["med_jul_13"]);
                    med_aug_13_2=parseFloat(a["med_aug_13"]);
                    med_sep_13_2=parseFloat(a["med_sep_13"]);
                    med_oct_13_2=parseFloat(a["med_oct_13"]);
                    med_nov_13_2=parseFloat(a["med_nov_13"]);
                    med_dec_13_2=parseFloat(a["med_dec_13"]);
                    med_jan_14_2=parseFloat(a["med_jan_14"]);
                    med_feb_14_2=parseFloat(a["med_feb_14"]);
                    med_mar_14_2=parseFloat(a["med_mar_14"]);
                    med_apr_14_2=parseFloat(a["med_apr_14"]);
                    med_may_14_2=parseFloat(a["med_may_14"]);
                    med_jun_14_2=parseFloat(a["med_jun_14"]);
                    med_jul_14_2=parseFloat(a["med_jul_14"]);
                    med_aug_14_2=parseFloat(a["med_aug_14"]);
                    med_sep_14_2=parseFloat(a["med_sep_14"]);
                  }
                  else if(String(a["county"])=="National"){
                    //Parse the value for each of the medians for the national into a variable
                    med_jan_10_3=parseFloat(a["med_jan_10"]);
                    med_feb_10_3=parseFloat(a["med_feb_10"]);
                    med_mar_10_3=parseFloat(a["med_mar_10"]);
                    med_apr_10_3=parseFloat(a["med_apr_10"]);
                    med_may_10_3=parseFloat(a["med_may_10"]);
                    med_jun_10_3=parseFloat(a["med_jun_10"]);
                    med_jul_10_3=parseFloat(a["med_jul_10"]);
                    med_aug_10_3=parseFloat(a["med_aug_10"]);
                    med_sep_10_3=parseFloat(a["med_sep_10"]);
                    med_oct_10_3=parseFloat(a["med_oct_10"]);
                    med_nov_10_3=parseFloat(a["med_nov_10"]);
                    med_dec_10_3=parseFloat(a["med_dec_10"]);
                    med_jan_11_3=parseFloat(a["med_jan_11"]);
                    med_feb_11_3=parseFloat(a["med_feb_11"]);
                    med_mar_11_3=parseFloat(a["med_mar_11"]);
                    med_apr_11_3=parseFloat(a["med_apr_11"]);
                    med_may_11_3=parseFloat(a["med_may_11"]);
                    med_jun_11_3=parseFloat(a["med_jun_11"]);
                    med_jul_11_3=parseFloat(a["med_jul_11"]);
                    med_aug_11_3=parseFloat(a["med_aug_11"]);
                    med_sep_11_3=parseFloat(a["med_sep_11"]);
                    med_oct_11_3=parseFloat(a["med_oct_11"]);
                    med_nov_11_3=parseFloat(a["med_nov_11"]);
                    med_dec_11_3=parseFloat(a["med_dec_11"]);
                    med_jan_12_3=parseFloat(a["med_jan_12"]);
                    med_feb_12_3=parseFloat(a["med_feb_12"]);
                    med_mar_12_3=parseFloat(a["med_mar_12"]);
                    med_apr_12_3=parseFloat(a["med_apr_12"]);
                    med_may_12_3=parseFloat(a["med_may_12"]);
                    med_jun_12_3=parseFloat(a["med_jun_12"]);
                    med_jul_12_3=parseFloat(a["med_jul_12"]);
                    med_aug_12_3=parseFloat(a["med_aug_12"]);
                    med_sep_12_3=parseFloat(a["med_sep_12"]);
                    med_oct_12_3=parseFloat(a["med_oct_12"]);
                    med_nov_12_3=parseFloat(a["med_nov_12"]);
                    med_dec_12_3=parseFloat(a["med_dec_12"]);
                    med_jan_13_3=parseFloat(a["med_jan_13"]);
                    med_feb_13_3=parseFloat(a["med_feb_13"]);
                    med_mar_13_3=parseFloat(a['med_mar_13']);
                    med_apr_13_3=parseFloat(a["med_apr_13"]);
                    med_may_13_3=parseFloat(a["med_may_13"]);
                    med_jun_13_3=parseFloat(a["med_jun_13"]);
                    med_jul_13_3=parseFloat(a["med_jul_13"]);
                    med_aug_13_3=parseFloat(a["med_aug_13"]);
                    med_sep_13_3=parseFloat(a["med_sep_13"]);
                    med_oct_13_3=parseFloat(a["med_oct_13"]);
                    med_nov_13_3=parseFloat(a["med_nov_13"]);
                    med_dec_13_3=parseFloat(a["med_dec_13"]);
                    med_jan_14_3=parseFloat(a["med_jan_14"]);
                    med_feb_14_3=parseFloat(a["med_feb_14"]);
                    med_mar_14_3=parseFloat(a["med_mar_14"]);
                    med_apr_14_3=parseFloat(a["med_apr_14"]);
                    med_may_14_3=parseFloat(a["med_may_14"]);
                    med_jun_14_3=parseFloat(a["med_jun_14"]);
                    med_jul_14_3=parseFloat(a["med_jul_14"]);
                    med_aug_14_3=parseFloat(a["med_aug_14"]);
                    med_sep_14_3=parseFloat(a["med_sep_14"]);
                  }
                }
                //Set up chart_data, to create visualisation table with data above for later use
              var chart_data=new google.visualization.arrayToDataTable([
                ["Year",county_1,county_2,"National"],
                ["Jan-10",med_jan_10_1,med_jan_10_2,med_jan_10_3],
                ["Feb-10",med_feb_10_1,med_feb_10_2,med_feb_10_3],
                ["Mar-10",med_mar_10_1,med_mar_10_2,med_mar_10_3],
                ["Apr-10",med_apr_10_1,med_apr_10_2,med_apr_10_3],
                ["May-10",med_may_10_1,med_may_10_2,med_may_10_3],
                ["Jun-10",med_jun_10_1,med_jun_10_2,med_jun_10_3],
                ["Jul-10",med_jul_10_1,med_jul_10_2,med_jul_10_3],
                ["Aug-10",med_aug_10_1,med_aug_10_2,med_aug_10_3],
                ["Sept-10",med_sep_10_1,med_sep_10_2,med_sep_10_3],
                ["Oct-10",med_oct_10_1,med_oct_10_2,med_oct_10_3],
                ["Nov-10",med_nov_10_1,med_nov_10_2,med_nov_10_3],
                ["Dec-10",med_dec_10_1,med_dec_10_2,med_dec_10_3],

                ["Jan-11",med_jan_11_1,med_jan_11_2,med_jan_11_3],
                ["Feb-11",med_feb_11_1,med_feb_11_2,med_feb_11_3],
                ["Mar-11",med_mar_11_1,med_mar_11_2,med_mar_11_3],
                ["Apr-11",med_apr_11_1,med_apr_11_2,med_apr_11_3],
                ["May-11",med_may_11_1,med_may_11_2,med_may_11_3],
                ["Jun-11",med_jun_11_1,med_jun_11_2,med_jun_11_3],
                ["Jul-11",med_jul_11_1,med_jul_11_2,med_jul_11_3],
                ["Aug-11",med_aug_11_1,med_aug_11_2,med_aug_11_3],
                ["Sept-11",med_sep_11_1,med_sep_11_2,med_sep_11_3],
                ["Oct-11",med_oct_11_1,med_oct_11_2,med_oct_11_3],
                ["Nov-11",med_nov_11_1,med_nov_11_2,med_nov_11_3],
                ["Dec-11",med_dec_11_1,med_dec_11_2,med_dec_11_3],

                ["Jan-12",med_jan_12_1,med_jan_12_2,med_jan_12_3],
                ["Feb-12",med_feb_12_1,med_feb_12_2,med_feb_12_3],
                ["Mar-12",med_mar_12_1,med_mar_12_2,med_mar_12_3],
                ["Apr-12",med_apr_12_1,med_apr_12_2,med_apr_12_3],
                ["May-12",med_may_12_1,med_may_12_2,med_may_12_3],
                ["Jun-12",med_jun_12_1,med_jun_12_2,med_jun_12_3],
                ["Jul-12",med_jul_12_1,med_jul_12_2,med_jul_12_3],
                ["Aug-12",med_aug_12_1,med_aug_12_2,med_aug_12_3],
                ["Sept-12",med_sep_12_1,med_sep_12_2,med_sep_12_3],
                ["Oct-12",med_oct_12_1,med_oct_12_2,med_oct_12_3],
                ["Nov-12",med_nov_12_1,med_nov_12_2,med_nov_12_3],
                ["Dec-12",med_dec_12_1,med_dec_12_2,med_dec_12_3],

                ["Jan-13",med_jan_13_1,med_jan_13_2,med_jan_13_3],
                ["Feb-13",med_feb_13_1,med_feb_13_2,med_feb_13_3],
                ["Mar-13",med_mar_13_1,med_mar_13_2,med_mar_13_3],
                ["Apr-13",med_apr_13_1,med_apr_13_2,med_apr_13_3],
                ["May-13",med_may_13_1,med_may_13_2,med_may_13_3],
                ["Jun-13",med_jun_13_1,med_jun_13_2,med_jun_13_3],
                ["Jul-13",med_jul_13_1,med_jul_13_2,med_jul_13_3],
                ["Aug-13",med_aug_13_1,med_aug_13_2,med_aug_13_3],
                ["Sept-13",med_sep_13_1,med_sep_13_2,med_sep_13_3],
                ["Oct-13",med_oct_13_1,med_oct_13_2,med_oct_13_3],
                ["Nov-13",med_nov_13_1,med_nov_13_2,med_nov_13_3],
                ["Dec-13",med_dec_13_1,med_dec_13_2,med_dec_13_3],

                ["Jan-14",med_jan_14_1,med_jan_14_2,med_jan_14_3],
                ["Feb-14",med_feb_14_1,med_feb_14_2,med_feb_14_3],
                ["Mar-14",med_mar_14_1,med_mar_14_2,med_mar_14_3],
                ["Apr-14",med_apr_14_1,med_apr_14_2,med_apr_14_3],
                ["May-14",med_may_14_1,med_may_14_2,med_may_14_3],
                ["Jun-14",med_jun_14_1,med_jun_14_2,med_jun_14_3],
                ["Jul-14",med_jul_14_1,med_jul_14_2,med_jul_14_3],
                ["Aug-14",med_aug_14_1,med_aug_14_2,med_aug_14_3],
                ["Sept-14",med_sep_14_1,med_sep_14_2,med_sep_14_3],
              ]);
                //Set up variable chart_opts to store the options for the chart
                var chart_opts={
                  title:"House Price Index by County:",
                  curveType:"function",
                  is3D:true,
                  legend:"top",
                  width:600,
                  height:250//,
                  //hAxis: {textPosition: 'none' }
              };
                //Set up variable chart_draw to create a new LineChart in element chart_div
                var chart_draw=new google.visualization.LineChart(document.getElementById("chart_div"));
                //Draw the chart
                chart_draw.draw(chart_data,chart_opts);
            }
        }
    }
    //Send AJAX request to call PHP file county_med_month to fetch the median values for the 2 counties for the graph
    xmlhttp.open("GET","county_med_month.php?c_1="+county_1+"&c_2="+county_2,false);
    xmlhttp.send()
}