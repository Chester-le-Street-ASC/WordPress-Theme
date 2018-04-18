/*
 * Chester.JS
 * Supports features for our wordpress site
 * Copyright Chester-le-Street ASC 2017
 * GNU License
 */

/* Show the pretty time */

if ( document.getElementById('time') != null ) {
  var datetime = new Date(document.getElementById('time').dateTime);
  console.log(datetime);
  var today = new Date();
  console.log(today);
  var datePublished = new Date(datetime.getFullYear(), datetime.getMonth(), datetime.getDate());
  var dateToday = new Date(today.getFullYear(), today.getMonth(), today.getDate());
  var test = parseInt(today-datetime);
  var testDays = parseInt(dateToday-datePublished);
  var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  if ( test < 60000 ) {
    var datetimeScreen = "Just Now";
  }
  else if ( test < 120000 ) {
    var datetimeScreen = "1 minute ago";
  }
  else if ( test < 3600000 ) {
    var datetimeScreen = parseInt(test/60000) + " minutes ago";
  }
  else if ( test < 7200000 ) {
    var datetimeScreen = "1 hour ago";
  }
  else if ( test < 86400000 ) {
    var datetimeScreen = parseInt(test/3600000) + " hours ago";
  }
  else if ( test < 172800000 && (today.getDate()-datetime.getDate() == 1) ) {
    var datetimeScreen = "1 day ago";
  }
  else if ( testDays <= 604800000 ) {
    var datetimeScreen = Math.ceil((dateToday-datePublished)/86400000) + " days ago";
  }
  else {
    var datetimeScreen = datetime.getDate()+ " " + monthNames[datetime.getMonth()]+ " " + datetime.getFullYear();
  }
  var datetimeScreenOutput = document.getElementById('dtOut');
  datetimeScreenOutput.textContent = datetimeScreen;
}

/* If author != Christopher Heppell, show their name */
if (document.getElementById('postAuthor') != null) {
  var author = document.getElementById('postAuthor').textContent;
  if (author.indexOf("Christopher Heppell") == -1) {
    document.getElementById('postAuthorDisplay').classList.remove("d-none");
  }
}

/**if (document.getElementsByClassName('rsswidget') != null) {
  for (i = 0; i<document.getElementsByClassName('rsswidget').length; i++) {
    document.getElementsByClassName('rsswidget')[i].innerHTML = "<span class=\"fa fa-rss\"></span>";
  }
}*/
