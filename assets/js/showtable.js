$(document).ready(function(){
        $('#grid').DataTable();

var json = $('#json').text();
var objson = JSON.parse(json);
var root = $('#root');
var header = $('#encabezado');
$('#jugar').click(function(){

	header.hide()

	var add='';
	for (var i = 0; i < 10; i++) {
 	add += '<div id="'+i+'">'+objson['respuestas'][i]["preguntas"]["titulo"] +'';
 	add += ''+objson['respuestas'][i]["preguntas"]["titulo"] +'';


	}
	root.html(add);

});
});