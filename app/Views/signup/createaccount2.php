<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<section class="get-in-touch">
   <h1 class="title">Sign up Today</h1>
   <form class="contact-form row" action="/account/usersignup" method="post">
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" name ='username' required>
         <label class="label" for="name">Username</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" type="email" name ='emailaddress' required>
         <label class="label" for="email">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" class="input-text js-input" type="text" name ='password' required>
         <label class="label" for="company">Password</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" type="text" name ='contactnumber' required>
         <label class="label" for="phone">Contact Number</label>
      </div>
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>

