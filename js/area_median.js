/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

area_median.js

This file contains the JavaScript for calculating the median values for the selected area for the Detailed section of the application.
*/

//Method for getting the median values for each year for the selected area.
//Parameters: lat,lng,radius
function area_meds(c_lat,c_lng,c_rad){
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp_2 = new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp_2 = new ActiveXObject("Microsoft.XMLHTTP");
  }
  // this method is used to capture the response of the http request
  xmlhttp_2.onreadystatechange = function(){
    if (xmlhttp_2.readyState == 4 && xmlhttp_2.status == 200) {
      var meds = JSON.parse(xmlhttp_2.responseText);
      //Update the area_med class by addign the updated median values to it.
      document.getElementsByClassName('area_med').innerHTML = '2014:'+meds[4]["med"]+
                            '</br>2013: €'+meds[3]["med"]+
                            '</br>2012: €'+meds[2]["med"]+
                            '</br>2011: €'+meds[1]["med"]+
                            '</br>2010: €X'+meds[0]["med"];
    }
  }
  //Calls the PHP function area_median using the parameters of the selector_circle's centre and radius.
  xmlhttp_2.open("GET","ajax/area_median.php?c_lat="+c_lat+"&c_lng="+c_lng+"&c_rad="+c_rad,true);
  xmlhttp_2.send();
}