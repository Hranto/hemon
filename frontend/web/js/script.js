function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#general_prew').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURLs(input) {
	console.log(input.files.length); 
    if (input.files.length) {
        $.each( input.files, function( key, value ) { console.log(value);
		    var reader = new FileReader();
	        reader.onload = function (e) { console.log(e.target.result);
	        	$("#second_prew").append('<img id="second_prew_'+key+'" src="'+e.target.result+'">')
            	// $('#general_prew').attr('src', e.target.result);
        	}
        	reader.readAsDataURL(value);
		});      
    }
}

$("#news-image").change(function(){
    readURL(this);
});

$("#partners-image").change(function(){
    readURL(this);
});

$("#team-image").change(function(){
    readURL(this);
});

$("#slider-image").change(function(){
    readURL(this);
});

$("#projects-image").change(function(){
    readURL(this);
});
$("#news-images").change(function(){
    readURLs(this);
});
$("#projects-images").change(function(){
    readURLs(this);
});