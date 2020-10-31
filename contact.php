<?php 
include 'header.php';

$error = '';
$name = '';
$email = '';
$phone = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["phone"]))
 {
  $error .= '<p><label class="text-danger">phone is required</label></p>';
 }
 else
 {
  $phone = clean_text($_POST["phone"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'phone' => $phone,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $phone = '';
  $message = '';
 }
}


?>
<div class="container">

<h1 class="title">Contact</h1>


<!-- form -->
<div class="contact">


		
       <div class="row">
       	
       	<div class="col-sm-12">
       	<div class="map">
       	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9933.460884430251!2d-0.13301252240929382!3d51.50651527467666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2snp!4v1414314152341" width="100%" height="300" frameborder="0"></iframe>	
       	</div>


		<div class="col-sm-6 col-sm-offset-3">
		<div class="spacer">   		
			
       		<h4>Contact us</h4>
			<form method="post">
			<?php echo $error; ?>
			<div class="form-group">
			<input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
			</div>
			<div class="form-group">
			<input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
			</div>
			<div class="form-group">
      
			<input type="text" name="phone" class="form-control" placeholder="Enter Phone number" value="<?php echo $phone; ?>" />
			</div>
			<div class="form-group">
      
			<textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
			</div>
	 		<div class="form-group">
				<p>Contact us through WhatsApp <a href="https://api.whatsapp.com/send?phone=919632467873&text="><img src="images/photos/wa.png"  alt="WhatsApp Logo"></a></p>	
			</div>
			<div class="form-group" align="center">
			<input type="submit" name="submit" class="btn btn-info" value="Submit" />
			</div>			
	 </form>
	</div>
	</div>





       </div>
</div>
</div>
<!-- form -->
</div>
<?php include 'footer.php';?>
