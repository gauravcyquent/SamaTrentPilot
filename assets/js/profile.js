$(document).ready(function () {

    $('#data_decade_view1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });





});
function showUser(id) {
    window.location = base_url + 'rrm/profile/' + id;
}

function showUserRroleader(id) {
    window.location = base_url + 'rroleader/profile/' + id;
	showval(id);
}


function showval(id) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("responce_container").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","Rroleader/contest_casa?q="+str,true);
  xmlhttp.send();
}
