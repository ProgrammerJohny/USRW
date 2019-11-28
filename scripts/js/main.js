function openMP() {
  window.open("APPOINTMENT/MP/view.php","_blank");
}
function openOM() {
  window.open("APPOINTMENT/OM/view.php","_blank");
}
function doctors() {
  alert("Umawianie wizyty do specjalisty...");
  window.open("doctors/firststep.php")
}
function deepreturn() {
  window.close();
  window.open("../../../main.php");
}
function compliance(t) {
var a = document.getElementById("tel");
var b = document.getElementById("mail");
var c = document.getElementById("fname");
var d = document.getElementById("lname");
a.disabled=(t.checked==true)?true:false;
b.disabled=(t.checked==true)?true:false;
c.disabled=(t.checked==true)?true:false;
d.disabled=(t.checked==true)?true:false;
}
