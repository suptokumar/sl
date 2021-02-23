function load_content(url,cls){
$.ajax({
	url: url,
	type: 'POST',
	data: {a1: 'value1'},
	xhr: function() {
        var xhr = new window.XMLHttpRequest();
        var i=0;
        xhr.addEventListener("progress", function(evt) {

            if (evt.lengthComputable) {
                var percentComplete = (evt.loaded / evt.total) * 100;
                var percentVal = percentComplete+'%';
           
	$(".loader").css("width",percentComplete.toFixed(2)+"%");
            }else{
            	var percentComplete = i++;
                var percentVal = percentComplete+'%';
           
	$(".loader").css("width",percentComplete.toFixed(2)+"%");
            }
       }, false);
       return xhr;
    },
    success:function(data){
	$("."+cls).html(data);
    }
});
}


function search(event) {
	event.preventDefault();
	var key = $("#search5140").val().replace(/ /g,"_");
	alert(key);
	window.location='http://localhost/search/'+key;
}
$(document).ready(function(){
  $(".owl_stage").fadeIn(1000);
  $(".owl-carousel").owlCarousel({
    margin:10,
    // loop:true,
    nav:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:2.5
        },
        600:{
            items:5
        },
        1000:{
            items:8
        }
    }
  });
});