function shbtn1()
 {
    var div1 = document.getElementById("btn1click");
    var div2 = document.getElementById("btn2click");
   	//var div3 = document.getElementById("btn3click");
	div2.style.display = "block";
	div1.style.display = "none";
	//div3.style.display = "none";
}

function shbtn2()
 {
    var div1 = document.getElementById("btn1click");
    var div2 = document.getElementById("btn2click");
   	//var div3 = document.getElementById("btn3click");
	div1.style.display = "none";
	div2.style.display = "block";
	//div3.style.display = "none";
}

function shbtn3()
 {
    var div1 = document.getElementById("btn1click");
    var div2 = document.getElementById("btn2click");
   	var div3 = document.getElementById("btn3click");
	div1.style.display = "none";
	div3.style.display = "none";
	div2.style.display = "block";
}
/*
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

      google.load('visualization', '1.0', {'packages':['corechart']});
      //$(document).ready(drawChart);

      function county_avg_data(){
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET","count_avg.php",false);
        xmlhttp.send();
      }
      

  function toggle_heatmap_2010(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","heat_map_year.php?year="+query_2010,false);
    xmlhttp.send();
  }

  function toggle_heatmap_2011(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","heat_map_year.php?year="+query_2011,false);
    xmlhttp.send();
  }

  function toggle_heatmap_2012(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","heat_map_year.php?year="+query_2012,false);
    xmlhttp.send();
  }

  function toggle_heatmap_2013(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","heat_map_year.php?year="+query_2013,false);
    xmlhttp.send();
  }

  function toggle_heatmap_2014(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","heat_map_year.php?year="+query_2014,false);
    xmlhttp.send();
  }

*/
