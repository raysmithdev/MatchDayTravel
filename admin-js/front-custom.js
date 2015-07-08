$(document).ready(function() {

   $(".fancybox").fancybox({
  closeClick  : false, // prevents closing when clicking INSIDE fancybox 
  openEffect  : 'none',
  closeEffect : 'none',
  helpers   : { 
   overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox 
  }
 })
  // for login
  
  // when a form is submited, get its data and validate the fields
  $('form#frotnlogin').submit(function() {
    // gets field values
    var name = $(this).find('input[name="login"]');  		// Name  
	//var number = $(this).find('input[name="number"]');  		// Name 
	//var url = $(this).find('input[name="url"]');       		// url
    var pass = $(this).find('input[name="password"]');        // E-mail
   // var gen = $(this).find(':radio:checked');               // Gender
   // var age = $(this).find('select[name="age"]');           // Age
                             // Message

    // remove class "error" from al elements
    // sets a variable "error" used to submit or no the form
    $('*').removeClass('error');
    var error = 0;
    var regx = /^([a-z0-9_\-\.])+\@([a-z0-9_\-\.])+\.([a-z]{2,4})$/i;   // regexp for e-mail
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	 var numberregx = /^[0-9-+]+$/;

          /* Validate the fields (adds class "error" to invalid fields and set error=1) */
    // check "name"
    if(name.val().length<2){
      name.addClass('error');
      error = 1;
    }
	
    // check "email"
   if(pass.val().length<2){
      pass.addClass('error');
      error = 1;
    }
  
    // if error is 0, serialize form data and send the data string to server
    // else alert a message
    if(error==0) {
      var srl = $(this).serialize();

      $.ajax({
        type: 'post',
        url: siteurl+'home/login',
        data: srl,
        beforeSend: function() {
          // before send the request, displays a "Loading..." messaj in the element where the response will be placed
          $('#resps').html('<img src='+siteurl+'images/loader.gif>');
        },        // sets timeout for the request (10 seconds)
        error: function(xhr, status, error) {  },     // alert a message in case of error
        success: function(response) {
		if(response == 1)
			{
          $('#resps').html('<img src='+siteurl+'images/loader.gif>');
		 window.location = siteurl+'home/profile';
			}
			else
			{
			$('#resps').html('<p id="error">Wrong Login Details </p>');
			}
			//$('#resps').html('Loading');
			
		  
        }
      });
    }
    else {  }

    return false;      // necesary to not open the page when form is submited
  });
  // login end
  
 
 
   $( "#gallery" ).click(function() {
		  $("#user-uploads").show();
		  });
  
});



function getCategories(id)
{
	// Hide User Upload Form
	$("#user-uploads").hide();

 $(".categires-box ul li a").css( "color", "white" );	
var image = siteurl+"images/loader.gif';"
$('#allproducts').html("<img src='"+image+"'  /> Loading...");

$.post(siteurl+"home/imagesByCategory/"+id, function(data) {
// $("#link"+id).css( "color", "#373435" );
$( "#allproducts" ).html(data);
});	
}



