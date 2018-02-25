$(function() {
  var friends = [{
    "firstName": "Paul",
    "lastName": "Taylor",
    "Step": 2
  }, {
    "firstName": "Sharon",
    "lastName": "Thomas",
    "Step": 3
  }, {
    "firstName": "Thomas",
    "lastName": "Harris",
    "Step": 3
  }, {
    "firstName": "Deborah",
    "lastName": "Lee",
    "Step": 4
  }, {
    "firstName": "Mark",
    "lastName": "Young",
    "Step": 4
  }, {
    "firstName": "Shirley",
    "lastName": "Perez",
    "Step": 4
  }, {
    "firstName": "Joseph",
    "lastName": "Lee",
    "Step": 5
  }, {
    "firstName": "Mary",
    "lastName": "White",
    "Step": 5
  }, {
    "firstName": "Matthew",
    "lastName": "Garcia",
    "Step": 5
  }, {
    "firstName": "Patricia",
    "lastName": "Allen",
    "Step": 5
  }, {
    "firstName": "Larry",
    "lastName": "Robinson",
    "Step": 6
  }, {
    "firstName": "Kimberly",
    "lastName": "Lopez",
    "Step": 6
  }, {
    "firstName": "Jose",
    "lastName": "Martinez",
    "Step": 6
  }, {
    "firstName": "Deborah",
    "lastName": "Walker",
    "Step": 6
  }, {
    "firstName": "Joseph",
    "lastName": "Lopez",
    "Step": 6
  }, {
    "firstName": "Dorothy",
    "lastName": "Moore",
    "Step": 7
  }, {
    "firstName": "Jose",
    "lastName": "Jackson",
    "Step": 7
  }, {
    "firstName": "Karen",
    "lastName": "Lee",
    "Step": 7
  }, {
    "firstName": "Paul",
    "lastName": "Taylor",
    "Step": 7
  }, {
    "firstName": "Amy",
    "lastName": "Gonzalez",
    "Step": 7
  }, {
    "firstName": "Richard",
    "lastName": "Martinez",
    "Step": 7
  }];

  function findFriends(step) {
    var urlString = 'assets/javascripts/steps.json';
    // commenting out the ajax lines for the purposes of this demo.  for now we'll use the global friends variable declared above
    // $.getJSON(urlString, function(data) {
    //  var friends = data.friends;

    var results = '';
    var numFound = 0;
    $.each(friends, function(key, value) {
      if (value.Step == step) {
        numFound++;
        console.log (numFound);
        if (numFound <= 2) {
          results += value.firstName + ' ' + value.lastName + '<br>';
        }
      };
    });
    if (numFound > 2) {
      results += 'and ' + (numFound - 2) + 
      ' other friend' + (numFound == 3 ? '' : 's');
    }
    

    $('#results').html(results);


    //});
  }

  $('#find-friends').click(function() {
    // note the plus to convert the string into a number
    findFriends(+$('#step').val());
  });
});