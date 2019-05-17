function clsPrettyTime(unixTime) {
  var datetime = new Date((unixTime)*1000);
  console.log("DATETIME - " + datetime);
  var today = new Date();
  console.log("TODAY - " + today);
  // var today = today.getTime();
  // console.log("TODAY - " + today);
  var test = parseInt(today-datetime);
  console.log("TEST - " + test);
  var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  if ( test < 60000 ) {
    var datetimeScreen = "Just Now";
    return datetimeScreen;
  }
  else if ( test < 3600000 ) {
    var datetimeScreen = parseInt(test/60000) + " minutes ago";
    return datetimeScreen;
  }
  else if ( test < 86400000 ) {
    var datetimeScreen = parseInt(test/3600000) + " hours ago";
    return datetimeScreen;
  }
  else if ( test < 604800000 ){
    var datetimeScreen = parseInt(test/86400000) + " days ago";
    return datetimeScreen;
  }
  else {
    var datetimeScreen = datetime.getDate()+ " " + monthNames[datetime.getMonth()]+ " " + datetime.getFullYear();
    return datetimeScreen;
  }
}

function updateTime() {
  var datetimeScreenOutput = document.getElementById('dtOut');
  console.log("RUNNING");
  datetimeScreenOutput.textContent = clsPrettyTime(unixTime);
}

var intervalID = window.setInterval(updateTime, 1000);
