<?php

	if(($_POST)){
		
		$error = "";
		$success="";
		
		if(!$_POST["email"]){
			
			$error.="The Email is required<br>";
			
		}
		
		if(!$_POST["content"]){
			
			$error.="The Content field is required<br>";
			
		}
		
		if(!$_POST["subject"]){
			
			$error.="The Subject field is required<br>";
			
		}
		
		if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false) {
			
			$error.="Email Address is not Valid<br>";
			
		}
		
		if($error!="")
		{
 
			$error = '<div class="alert alert-danger" role="alert"><p><strong>There were errors in your form!</strong></p>' . $error . '</div>';
			 
			 
		}
		else{
			
			$emailTo = "saurabhsinghtiari2811@gmail.com";
			
			$subject = $_POST["subject"];
			
			$content = $_POST["content"];
			
			$headers = "From: ".$_POST['email'];
			
			if(mail($emailTo, $subject, $content, $headers)){
				
				echo '<div class="alert alert-success" role="alert">Your message was sent. We will get back to you ASAP.</div>';
				
			}
			
			else{
				
				echo '<div class="alert alert-danger" role="alert">Your message could not be sent.Please try again later.</div>';
			}
		}
	}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
  
    <h1>Get in touch!</h1>
	<div id="error"><? echo $error.$success;?></div>
	<form method="post">
  <div class="form-group">
    <label for="email">Enter your Email Address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
  </div>
   
   <div class="from-group">
	<label for="subject">Subject</label>
	<input type="text" id="subject" class="form-control" name="subject">
   </div>
   <br>
  <div class="form-group">
    <label for="content">What would you like to ask us?</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
   
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
		<script type="text/javascript">
			
			$("form").submit(function(e){
				
				
				
				var error= "";
				
				if($("#email").val()== ""){
					
					error += "The Email is required<br>"
					
				}
				
				if($("#subject").val()== ""){
					
					error += "The subject Field is required<br>"
					
				}
				
				if($("#content").val()== ""){
					
					error += "The content Field is required"
					
				}
				
				if(error!=""){
					
					$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were errors in your form!</strong></p>'+error+'</div>');
					
					return false;
			
				} else {
					
					return true;
				}
			
			});
			
	</script>
	
  </body>
</html>