(function($) {
    $('#submit').click(function(){
        /* when the submit button in the modal is clicked, submit the form */
       //alert('submitting');
       $('#submitform').submit();
   });

   $("#formsubmitmessage").show();
   setTimeout(function() { $("#formsubmitmessage").fadeOut('fast'); }, 2500);

})(jQuery); // End of use strict

