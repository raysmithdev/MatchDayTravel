$(document).ready(function() {

  // when a form is submited, get its data and validate the fields
  $('form#login').submit(function() {
	  
    // gets field values
    var name = $(this).find('input[name="login"]');  		// Name  
    var pass = $(this).find('input[name="password"]');        // E-mail

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
        url: siteurl+'admin/login',
        data: srl,
        beforeSend: function() 
        {
          // before send the request, displays a "Loading..." messaj in the element where the response will be placed
          $('#resp').html('<img src='+siteurl+'admin-images/loader.gif>');
        },
        // sets timeout for the request (10 seconds)
        error: function(xhr, status, error) {  },     // alert a message in case of error
        success: function(response) {
		
			if(response == 1)
			{
				//$('#resp').html('<img src='+siteurl+'images/loader.gif>');
				window.location = siteurl+'admin/dashboard';
			}
			else
			{
				$('#resp').html('<p id="error">Wrong Login Details </p>');
			}
        }
      });
    }
    
    return false;      // necesary to not open the page when form is submited
    
  });
  
  $(".fancybox").fancybox();

});