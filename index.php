<?php include 'header.php';?>
<?php
$error = '';
$name = '';
$email = '';
$phone = '';
$room = '';
$adult = '';
$date = '';
$month = '';
$year = '';
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
  $error .= '<p><label class="text-danger">Phone is required</label></p>';
 }
 else
 {
  $phone = $_POST["phone"];
 }
 if(empty($_POST["room"]))
 {
  $error .= '<p><label class="text-danger">Room is required</label></p>';
 }
 else
 {
  $room = clean_text($_POST["room"]);
 }
 if(empty($_POST["adult"]))
 {
  $error .= '<p><label class="text-danger">Adult is required</label></p>';
 }
 else
 {
  $adult = clean_text($_POST["adult"]);
 }
 if(empty($_POST["date"]))
 {
  $error .= '<p><label class="text-danger">Date is required</label></p>';
 }
 else
 {
  $date = clean_text($_POST["date"]);
 }
 if(empty($_POST["month"]))
 {
  $error .= '<p><label class="text-danger">month is required</label></p>';
 }
 else
 {
  $month = clean_text($_POST["month"]);
 }
 if(empty($_POST["year"]))
 {
  $error .= '<p><label class="text-danger">year is required</label></p>';
 }
 else
 {
  $year = clean_text($_POST["year"]);
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
  $file_open = fopen("Reservation.csv", "a+");
  $no_rows = count(file("Reservation.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'phone' => $phone,
   'room' => $room,
   'adult' =>$adult,
   'date' => $date,
   'month' => $month,
   'year' => $year,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<script>alert("Registration Successful");</script>';
  $name = '';
  $email = '';
  $phone = '';
  $room='';
  $adult='';
  $date='';
  $month='';
  $year='';
  $message = '';
 }
}

?>



<!-- banner -->
<div class="banner">    	   
    <img src="images/photos/BG.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown"> Sarva Resorts</h1>
                <p class="animated fadeInUp">Find the home in your fingertips...</p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->








<div class="container">

<h2>Rooms & Tariff</h2>


<!-- form -->

<div class="row">
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/eagle/Eagle1.jpg" class="img-responsive"><div class="info"><h3>Eagle Homestay</h3><p>Eagle Homestay is located in one of the best place.</p><a href="room-details-eagle.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/naveen/Naveen1.jpg" class="img-responsive"><div class="info"><h3>Naveen Homestay</h3><p> [Contents Needed]</p><a href="room-details-naveen.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/nanjun/Nanjun1.jpg" class="img-responsive"><div class="info"><h3>Nanjundeshwara Homestay</h3><p>[Contents Needed]</p><a href="room-details-nanjun.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/grk/grk1.jpg" class="img-responsive"><div class="info"><h3>GRK Resort</h3><p>[Contents Needed]</p><a href="room-details-grk.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/pinkpatch/pp1.jpeg" class="img-responsive"><div class="info"><h3>Pink Patch Resort</h3><p> [Contents Needed]</p><a href="room-details-pinkpatch.php" class="btn btn-default">Check Details</a></div></div></div> 
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/dweepa/Dweepa1.jpg" class="img-responsive"><div class="info"><h3>Dweepa Resort</h3><p>[Contents Needed]</p><a href="room-details-dweepa.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/riveredge/river1.jpg" class="img-responsive"><div class="info"><h3>Riveredge Resort</h3><p>Eagle Homestay is located in one of the best place.</p><a href="room-details-riveredge.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/greenview/greenview1.jpg" class="img-responsive"><div class="info"><h3>Greenview Homestay</h3><p>Eagle Homestay is located in one of the best place.</p><a href="room-details-greenview.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/bhagyashree/Bhagya1.jpg" class="img-responsive"><div class="info"><h3>Bhagyashree Homestay</h3><p>[Contents Needed]</p><a href="room-details-bhagyashree.php" class="btn btn-default">Check Details</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/greenview/greenview1.jpg" class="img-responsive"><div class="info"><h3>Mounavana Cottage</h3><p>[Contents Needed]</p><a href="room-details-mounavana.php" class="btn btn-default">Check Details</a></div></div></div>
  
</div>

                     


</div>

<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><iframe width="560" height="315" src="https://www.youtube.com/embed/AO-CfYKNBYE?autoplay=1&showinfo=0&controls=0&rel=0&showinfo=0&disablekb=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" ></iframe></div>
</div>
<div class="col-sm-5 col-md-4">
<h3>Reservation</h3>
    <form method="post" class="wowload fadeInRight">
	<?php echo $error; ?>
        <div class="form-group">
            <input type="text" name="name" class="form-control"  placeholder="Name" value="<?php echo $name; ?>"/>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control"  placeholder="Email" value="<?php echo $email; ?>"/>
        </div>
        <div class="form-group">
            <input type="Phone" name="phone" class="form-control"  placeholder="Phone" value="<?php echo $phone; ?>">
        </div>        
        <div class="form-group">
            <div class="row">
            <div class="col-xs-6">
            <select class="form-control" name="room" value="<?php echo $room; ?>">
              <option>No. of Rooms</option>
              <option>1</option>
			  <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>        
            <div class="col-xs-6">
            <select class="form-control" name="adult">
              <option>No. of Adult</option>
              <option>1</option>
			  <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div></div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="date" >
                <option>Date</option>
                <option>1</option>
                <option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="month">
                <option>Month</option>
                <option>January</option>
                <option >February</option>
                <option >March</option>
                <option >April</option>
                <option >May</option>
                <option >June</option>
                <option >July</option>
                <option >August</option>
                <option >September</option>
                <option >October</option>
                <option >November</option>
                <option >December</option>
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control" name="year">
				<option>Year</option>
                <option >2020</option>
                <option >2021</option>
                <option >2022</option>
                <option >2023</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message"  placeholder="Message" rows="4"></textarea>
        </div>
		<div class="form-group">
			<p>Contact us through WhatsApp <a href="https://api.whatsapp.com/send?phone=919632467873&text="><img src="images/photos/wa.png"  alt="WhatsApp Logo"></a></p>	
		</div>
        <div class="form-group" >
      <input type="submit" name="submit" class="btn btn-default" value="Submit" />
     </div>
	 
    </form>    
</div>
</div>  
</div>
</div>
<!-- reservation-information -->


<?php include 'footer.php';?>
