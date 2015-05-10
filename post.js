$( document ).ready(function() {
//
// post div launch
$("#postlink").click(function() { /* FINALLY it works */
	$( "#postdiv" ).toggle(function() {
$( "#itembox" ).focus();
});
});
//
// post div close
$("#postclose").click(function() { 
	$( "#postdiv" ).toggle(function() {
$( "#itembox" ).focus();
});
});
//
// admin div launch
$("#ali_launch").click(function() { 
	$( "#adminlogindiv" ).toggle(function() {
$( "#ali_user" ).focus();
});
});
//
// admin div close
$("#ali_close").click(function() { 
	$( "#adminlogindiv" ).toggle(function() {
$( "#ali_user" ).focus();
});
});
//
// DOCUMENT f() close
});