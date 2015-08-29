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
    if (input.files.length) {
        var html;
        $.each( input.files, function( key, value ) { 
		    var reader = new FileReader();
	        reader.onload = function (e) {              
                if(key == 0){
                    html = '<div class="new_images_prew"><img id="second_prew_'+key+'" src="'+e.target.result+'" class="img-thumbnail" width="200px">'; 
                } else {
                    html = html+'<img id="second_prew_'+key+'" src="'+e.target.result+'" class="img-thumbnail" width="200px">'; 
                }
                if(input.files.length-1 == key) {
                    html = html+'<div class="btn remove btn-danger new_images">Remove</div></div>'; 
                    $("#second_prew").append(html);  
                }
        	}
        	reader.readAsDataURL(value);
		});   
    }
}

function showFiles(input) {
    if (input.files.length) {
        var html;
        $.each( input.files, function( key, value ) {
                                
            if(key == 0){
                html = '<div class="new_files_prew"><div id="file_prew_'+key+'">'+value.name+'</div>'; 
            } else {
                html = html+'<div id="file_prew_'+key+'">'+value.name+'</div>'; 
            }
            if(input.files.length-1 == key) {
                html = html+'<div class="btn remove new_files">Remove</div></div>'; 
                $("#files_prew").append(html);  
            }   
        });   
    }
}

function moreNews(element) { 
    $.get('/hem/more-news?page='+element.attr('data-page')+'', function(response) { 
        var json = JSON.parse(response);  
        if(json.status == '1') {
           $('#prew').append(json.html);
           var page = $("#more_news").attr('data-page');
           page ++;
           $("#more_news").attr('data-page', page);
        } else {
            if(json.status == '2') {
               $("#more_news").remove();
            }
        }
    });
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
    $('.new_images_prew').remove();
    readURLs(this);
});
$("#news-attachment").change(function(){
    $('.new_files_prew').remove();
    showFiles(this);
});

$("#projects-images").change(function(){
    $('.new_images_prew').remove();
    readURLs(this);
});

$("#projects-attachment").change(function(){
    $('.new_files_prew').remove();
    showFiles(this);
});

$("#more_news").click(function(){
    moreNews($(this));
});

$(document).on('click', ".remove", function(){ 
    if($(this).hasClass('new_images')){
        $('[name="News[images][]"]').val(null);
        $('[name="Projects[images][]"]').val(null);
    }
    if($(this).hasClass('new_files')){
        $('[name="News[attachment][]"]').val(null);
        $('[name="Projects[attachment][]"]').val(null);
    }
    $(this).parent().remove();
});

$(function(){
    $('#carousel-106546').carousel({
         interval: 3000});
})