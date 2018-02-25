/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

pinpoints.js

This file contains the JavaScript for ...
*/


var lat1=50.55;
var lat2=52.05;
var lng1=-8.00;
var lng2=-8.45;
var img_home = 'https://hosting.service.url/~xxxxxxxx/house_price_app/img/home-2.png';
var markers=[];
var infowindow=[];
function set_markers(minyear,maxyear,minprice,maxprice){
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  // this method is used to capture the response of the http request
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var pinpoints = JSON.parse(xmlhttp.responseText);
      //var marker;
      var i=0;
      var lat;
      var lng;
      var price;
      var address;
      var post_latlng;
      var content;
      for (i = 0;i<pinpoints.length;i++){ 
        a=pinpoints[i];
        lat=parseFloat(a["lat"]);
        lng=parseFloat(a["lng"]);
        price=parseFloat(a["price"]);
        address=String(a["address_string"]);
        date=String(a["date_of_sale"]);
        post_latlng = new google.maps.LatLng(lat,lng);
        content ="<b>Address:</b> " + address + "</br>" + "<b>Price:</b>€ " + price + '</br>' + "<b>Date of Sale:</b> " + date;  
        add_marker(i,content,address,post_latlng,img_home);
        //add_marker(i,content,address,post_latlng);
        /*
        var marker = new google.maps.Marker({  
          map: map, 
          title: address,
          position: post_latlng  
        });
        //map.setCenter(marker.getPosition());
        /*
        var infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
          return function(){
           infowindow.setContent(content);
           infowindow.open(map,marker);
          };
        })(marker,content,infowindow)); 
      */
      }
    }
  }
  xmlhttp.open("GET","ajax/pinpoints.php?lat1="+lat1+"&lat2="+lat2+"&lng1="+lng1+"&lng2="+lng2+"&minyear="+minyear+"&maxyear="+maxyear+"&minprice="+minprice+"&maxprice="+maxprice,true);
  xmlhttp.send();
}

//function add_marker(n,con,add,posit){
function add_marker(n,con,add,posit,img){
  markers[n] = new google.maps.Marker({  
            map: map, 
            title: add,
            image: img,
            draggable: false,
            zIndex: 500,
            position: posit
          });

  var infowindow = new google.maps.InfoWindow({
      content: con
  });
  google.maps.event.addListener(markers[n],'click', function(){ 
    return function(){
      infowindow.open(map,markers[n]);
    };
  }); 
}
/*
function add_InfoWindow(con,mark){
  var infowindow = new google.maps.InfoWindow();
  google.maps.event.addListener(marker,'click', (function(mark,con,infowindow){ 
    return function(){
     infowindow.setContent(con);
     infowindow.open(map,mark);
    };
  })(marker,content,infowindow)); 
}
*/