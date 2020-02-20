

$(document).ready(function(){

	$('#selectAllBoxes').click(function(event){

		if (this.checked) {
			$('.checkBoxes').each(function(){
				this.checked = true;
			});
		} else {

			$('.checkBoxes').each(function(){
				this.checked = false;
			});
		}
	});


var div_box = "<div id='load-screen'><div id='loading'></div></div>";

$("body").prepend(div_box);

$('#load-screen').delay(400).fadeOut(300, function(){
	$(this).remove();
});



});



function loadUserOnline() {

	$.get("function.php?userOnline=result", function(data){
			$(".useronline").text(data);
		});
	}

	setInterval(function(){
		loadUserOnline();
	},500);




	
	ClassicEditor
		.create( document.querySelector( '#body' ))
		.catch( error => {
			console.error( error );
		});	