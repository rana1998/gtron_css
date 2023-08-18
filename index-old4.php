<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['ref'])) {
    $referralCode = $_GET['ref'];
    // Now you can use the $referralCode variable for further processing or storing in the database.
    // For example, you can insert it into the database when a user registers using this referral code.
} else {
    // If the "ref" parameter is not present in the URL, you can set a default value or handle it accordingly.
    $referralCode = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Discover Gtron, the decentralized MLM Ecosystem powered by blockchain. Sign up now for 500 Gtron absolutely free. Join us in this revolutionary opportunity!">
    <meta name="keywords" content="Gtron, Blockchain MLM, Decentralized Ecosystem, Crypto MLM, Free Gtron, Blockchain Powered MLM, Decentralized MLM, Gtron Sign Up, MLM Rewards Program">
	<!-- Page Title -->
	<title>Join Gtron: Blockchain MLM Ecosystem - Get 500 Gtron Free!</title>
	<meta property="og:locale" content="en_US">
    <meta property="og:type" content="website" >
    <meta property="og:title" content="Join Gtron: Blockchain MLM Ecosystem - Get 500 Gtron Free!" >
    <meta property="og:url" content="https://www.gtron.io" >
    <meta property="og:image" content="https://www.gtron.io/images/gtron.jpeg" >
    <meta property="og:image:alt" content="Join Gtron: Blockchain MLM Ecosystem - Get 500 Gtron Free!" > 
    <meta property="og:description" content="Discover Gtron, the decentralized MLM Ecosystem powered by blockchain. Sign up now for 500 Gtron absolutely free. Join us in this revolutionary opportunity!" >
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Discover Gtron, the decentralized MLM Ecosystem powered by blockchain. Sign up now for 500 Gtron absolutely free. Join us in this revolutionary opportunity!">
    <meta name="twitter:title" content="Join Gtron: Blockchain MLM Ecosystem - Get 500 Gtron Free!">
    <meta name="twitter:site" content="@gtron_official">
    <meta name="twitter:image" content="https://www.gtron.io/images/gtron.jpeg">
    <meta name="twitter:image:alt" content="Join Gtron: Blockchain MLM Ecosystem - Get 500 Gtron Free!">
    <meta name="twitter:creator" content="@gtron_official">
    <link rel="canonical" href="https://www.gtron.io" >
    
    <meta name="author" content="Lavkush Tari">
	<!-- Google Fonts css-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!-- Font Awesome icon css-->
	<link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
	<!-- Main custom css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">
	
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N5QZTXC6');</script>
	<!-- End Google Tag Manager -->
    <style>
       body.swal2-height-auto {
    height: 100%!important;
}

/* Style for the link */
.referral-link {
		color:#337ab7; /* You can adjust the color code as needed */
		font-weight: bold;
	}

   </style>
   <script>
	// if (location.protocol !== 'https:' || location.hostname !== 'www.gtron.io') {
	// location.href = 'https://www.gtron.io' + location.pathname + location.search;
	// }
	</script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5QZTXC6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 <?php   
    if(isset($_POST["submit"])){


   // Form data
   $name = $_POST['name'];
   $email = $_POST['email'];
   $country = $_POST['country'];
   $countrycode = $_POST['countrycode'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];
   // $countrycode = $_POST['countrycode'];
   
   // Create a new PHPMailer instance
   $mail = new PHPMailer;
   
   // SMTP configuration (change these values with your own)
   $mail->isSMTP();
   $mail->Host = 'mail.gtron.io';
   $mail->SMTPAuth = true;
   $mail->Username = 'no-reply@gtron.io';
   $mail->Password = 'gTron@12@';
   $mail->SMTPSecure = 'ssl';
   $mail->Port = 465;
   
   //gtorn2023@gmail.com
   
   // Sender and recipient
   $mail->setFrom('no-reply@gtron.io', 'GTron');
   $mail->addAddress('gtorn2023@gmail.com', 'GTron');
   
   // Email content
   $mail->isHTML(true);
   $mail->Subject = 'Form Submission';
   $mail->Body = "Name: $name<br>Email: $email<br>Country: $country<br>Phone: $countrycode $phone<br>Message: $message";
   
   // Send email
   if ($mail->send()) {
      ?><script>Swal.fire({
         icon: 'success',
         title: 'Registered Successfully!',
         text: 'Thank you for registering with Gtron! Congratulations, you have been awarded 500 Gtron tokens absolutely free',
         confirmButtonText: 'OK'
       })</script><?php
   } else {
      ?><script>Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: 'Something went wrong! Please try again.',
         confirmButtonText: 'OK'
       })</script><?php
   }
   
   
   }
   ?>
	
	<!-- Coming Soon Wrapper start -->
	<div class="comming-soon">
		<div class="comming-soon-info">
			<div class="comming-soon-inner">
				<!-- Countdown Start -->
				<div class="countdown-timer-wrapper">
					<div class="timer" id="countdown"></div>
				</div>
				<!-- Countdown end -->
				
				<!-- Logo Start -->
				<div class="logo">
					<img src="images/logo.png" class="logomain" alt="Logo">
				</div>
				<div>
					<img style="margin-top:-100px; width: 100px" src="images/title-bg.png" alt="Logo">
				</div>
				<!-- Logo end -->

				<div class="site-info">
				<h1>
    <span style="background: #4d3a61; color: white!important; display: inline-block;">We're launching</span>
</h1><h1><span>BLOCKCHAIN POWERED
						DECENTRALIZED MLM ECOSYSTEM</span></h1>
					<p>We're coming soon! Why wait? Simply register now
						using the form on the right side <br> with the required
						details, and get 500 Gtron tokens for free. Stay tuned for
						more updates.</p>
				<!--	<p>For More details on referral policy please click here <a class="referral-link" href="refferal-policy.php">Referral Policy</a>.</p> -->
				</div>
			</div>
		</div>
		
		<!-- Contact Form start -->
		<div class="contact-form">
			<div class="contact-box">
				<h2 class="title">Register Now</h2>
				<p>Register now on Gtron and receive <span class="rainbow-text animated">500 Gtron </span>tokens
					absolutely free!</p>

					<!-- <p>Reffferal 10 people in <span class="rainbow-text animated">24 hours and Get 1000 Gtron  </span> Bonus extra.</P> -->
					<p>Invite 10 people within <span class="rainbow-text animated"> 24 hours </span>, and you will get an additional <span class="rainbow-text animated">1000 Gtron </span> as an extra bonus.</P>

						<style>
							/* Adjust the width of the select and input elements to fit them in one line */
							.phone-input {
								display: flex;
							}

							.countrycode {
								flex: 1;
								margin-right: 5px;
							}
							.phone {
								flex: 2;
							}

							option {
    color: black!important;
}

						</style>
				<form id="registrationForm" action="" method="post">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<input type="text" name="name" class="form-control" placeholder="Your Name" required>
						</div>
						
						<div class="col-md-6 col-sm-6">
							<input type="email" name="email" class="form-control" placeholder="Your Email" required>
						</div>

						<div class="col-md-6 col-sm-6">
							<select id="country" name="country" class="form-control" required>
								<option value="">Select Country</option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Åland Islands">Åland Islands</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antarctica">Antarctica</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Bouvet Island">Bouvet Island</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value="Brunei Darussalam">Brunei Darussalam</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote D'ivoire">Cote D'ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Territories">French Southern Territories</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guernsey">Guernsey</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-bissau">Guinea-bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
								<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jersey">Jersey</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
								<option value="Korea, Republic of">Korea, Republic of</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macao">Macao</option>
								<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
								<option value="Moldova, Republic of">Moldova, Republic of</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montenegro">Montenegro</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="Netherlands Antilles">Netherlands Antilles</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Pitcairn">Pitcairn</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russian Federation">Russian Federation</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Helena">Saint Helena</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia">Serbia</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syrian Arab Republic">Syrian Arab Republic</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
								<option value="Thailand">Thailand</option>
								<option value="Timor-leste">Timor-leste</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Viet Nam">Viet Nam</option>
								<option value="Virgin Islands, British">Virgin Islands, British</option>
								<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
								<option value="Wallis and Futuna">Wallis and Futuna</option>
								<option value="Western Sahara">Western Sahara</option>
								<option value="Yemen">Yemen</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
						  </select>
						</div>
						
						<div class="col-md-6 col-sm-6">
							<div class="phone-input">
							  <input class="form-control countrycode" placeholder="+91" name="countrycode" type="text" id="countrycode" disabled/>
							  <input class="form-control phone" placeholder="Phone Number" name="phone" type="text" id="phone" required />
							  <input class="form-control phone" placeholder="referrer_user_id" value="<?php echo $referralCode; ?>" name="referrer_user_id" type="hidden" id="referrer_user_id" required />

							</div>
						  </div>
						
						<div class="col-md-12 col-sm-12">
							<textarea class="form-control" rows="6" name="message" placeholder="Your Message"></textarea>
						</div>
						
						<div class="col-md-12 col-sm-12">
						<label style="color: #fff;">
						 <!-- Replace the Telegram link URL with your actual Telegram group/channel link -->
							<a href="https://t.me/gtron_official" onclick = "clickMe()" target="_blank" id="telegramLink">
								Click here to join our <span class="rainbow-text animated">telegram</span> group to continue registration.
							</a>
							
						</label>
						<br>
						<!-- <input type="submit" id="submitButton" name="submit" class="btn-submit" value="Submit" disabled> -->
						<input type="submit" id="submitButton" name="submit" class="btn-submit" value="Submit" >
						<!-- <input type="submit" name="submit" class="btn-submit" value="Submit"> -->
						</div>
					</div>
					
				</form>
				<!-- Message div for empty username -->
				<div class="alert alert-danger" style="display:none;margin-top:10px" id="emptyUsernameMsg">
					Please enter a username.
				</div>

			</p></div>
		</div>
		<!-- Contact Form end -->
	</div>
	<!-- Coming Soon Wrapper end -->
	
    <!-- Jquery Library File -->
     <script src="js/sweetalert2.min.js"></script>
	<script src="js/jquery-1.12.4.min.js"></script>
	<!-- Timer counter js file -->
	<script src="js/countdown-timer.js"></script>
	<!-- SmoothScroll -->
	<script src="js/SmoothScroll.js"></script>
    <!-- Bootstrap js file -->
	<script src="js/bootstrap.min.js"></script>
    <!-- Main Custom js file -->
	<script src="js/function.js"></script>
	<!-- Countdown Script start -->
	<script>
        $(document).ready(function (){
			//var myDate = new Date("08/04/2019");
			// var myDate = new Date("08/18/2023");
			var myDate = new Date("9/10/2023");
			myDate.setDate(myDate.getDate() + 2);
            $("#countdown").countdown(myDate, function (event) {
                $(this).html(
                    event.strftime(
                        '<div class="timer-wrapper"><div class="time">%D</div><span class="text">Days</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">Hours</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">Minutes</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">Seconds</span></div>'
                    )
                );
            });

        });
    </script>
	<!-- Countdown Script end -->
	<script>
		const countrySelect = document.getElementById("country");
		const countrycodeInput = document.getElementById("countrycode");
	  
		countrySelect.addEventListener("change", function() {
		  // Get the selected country
		  const selectedCountry = countrySelect.value;
	  
		  // Define the country codes in an object
		  const countryCodes = {
  "Afghanistan": "+93",
  "Åland Islands": "+358",
  "Albania": "+355",
  "Algeria": "+213",
  "American Samoa": "+1 684",
  "Andorra": "+376",
  "Angola": "+244",
  "Anguilla": "+1 264",
  "Antarctica": "+672",
  "Antigua and Barbuda": "+1 268",
  "Argentina": "+54",
  "Armenia": "+374",
  "Aruba": "+297",
  "Australia": "+61",
  "Austria": "+43",
  "Azerbaijan": "+994",
  "Bahamas": "+1 242",
  "Bahrain": "+973",
  "Bangladesh": "+880",
  "Barbados": "+1 246",
  "Belarus": "+375",
  "Belgium": "+32",
  "Belize": "+501",
  "Benin": "+229",
  "Bermuda": "+1 441",
  "Bhutan": "+975",
  "Bolivia": "+591",
  "Bosnia and Herzegovina": "+387",
  "Botswana": "+267",
  "Bouvet Island": "+47",
  "Brazil": "+55",
  "British Indian Ocean Territory": "+246",
  "Brunei Darussalam": "+673",
  "Bulgaria": "+359",
  "Burkina Faso": "+226",
  "Burundi": "+257",
  "Cambodia": "+855",
  "Cameroon": "+237",
  "Canada": "+1",
  "Cape Verde": "+238",
  "Cayman Islands": "+1 345",
  "Central African Republic": "+236",
  "Chad": "+235",
  "Chile": "+56",
  "China": "+86",
  "Christmas Island": "+61",
  "Cocos (Keeling) Islands": "+61",
  "Colombia": "+57",
  "Comoros": "+269",
  "Congo": "+242",
  "Congo, The Democratic Republic of The": "+243",
  "Cook Islands": "+682",
  "Costa Rica": "+506",
  "Cote D'ivoire": "+225",
  "Croatia": "+385",
  "Cuba": "+53",
  "Cyprus": "+357",
  "Czech Republic": "+420",
  "Denmark": "+45",
  "Djibouti": "+253",
  "Dominica": "+1 767",
  "Dominican Republic": "+1 809",
  "Ecuador": "+593",
  "Egypt": "+20",
  "El Salvador": "+503",
  "Equatorial Guinea": "+240",
  "Eritrea": "+291",
  "Estonia": "+372",
  "Ethiopia": "+251",
  "Falkland Islands (Malvinas)": "+500",
  "Faroe Islands": "+298",
  "Fiji": "+679",
  "Finland": "+358",
  "France": "+33",
  "French Guiana": "+594",
  "French Polynesia": "+689",
  "French Southern Territories": "+262",
  "Gabon": "+241",
  "Gambia": "+220",
  "Georgia": "+995",
  "Germany": "+49",
  "Ghana": "+233",
  "Gibraltar": "+350",
  "Greece": "+30",
  "Greenland": "+299",
  "Grenada": "+1 473",
  "Guadeloupe": "+590",
  "Guam": "+1 671",
  "Guatemala": "+502",
  "Guernsey": "+44",
  "Guinea": "+224",
  "Guinea-bissau": "+245",
  "Guyana": "+592",
  "Haiti": "+509",
  "Heard Island and Mcdonald Islands": "+672",
  "Holy See (Vatican City State)": "+379",
  "Honduras": "+504",
  "Hong Kong": "+852",
  "Hungary": "+36",
  "Iceland": "+354",
  "India": "+91",
  "Indonesia": "+62",
  "Iran, Islamic Republic of": "+98",
  "Iraq": "+964",
  "Ireland": "+353",
  "Isle of Man": "+44",
  "Israel": "+972",
  "Italy": "+39",
  "Jamaica": "+1 876",
  "Japan": "+81",
  "Jersey": "+44",
  "Jordan": "+962",
  "Kazakhstan": "+7",
  "Kenya": "+254",
  "Kiribati": "+686",
  "Korea, Democratic People's Republic of": "+850",
  "Korea, Republic of": "+82",
  "Kuwait": "+965",
  "Kyrgyzstan": "+996",
  "Lao People's Democratic Republic": "+856",
  "Latvia": "+371",
  "Lebanon": "+961",
  "Lesotho": "+266",
  "Liberia": "+231",
  "Libyan Arab Jamahiriya": "+218",
  "Liechtenstein": "+423",
  "Lithuania": "+370",
  "Luxembourg": "+352",
  "Macao": "+853",
  "Macedonia, The Former Yugoslav Republic of": "+389",
  "Madagascar": "+261",
  "Malawi": "+265",
  "Malaysia": "+60",
  "Maldives": "+960",
  "Mali": "+223",
  "Malta": "+356",
  "Marshall Islands": "+692",
  "Martinique": "+596",
  "Mauritania": "+222",
  "Mauritius": "+230",
  "Mayotte": "+262",
  "Mexico": "+52",
  "Micronesia, Federated States of": "+691",
  "Moldova, Republic of": "+373",
  "Monaco": "+377",
  "Mongolia": "+976",
  "Montenegro": "+382",
  "Montserrat": "+1 664",
  "Morocco": "+212",
  "Mozambique": "+258",
  "Myanmar": "+95",
  "Namibia": "+264",
  "Nauru": "+674",
  "Nepal": "+977",
  "Netherlands": "+31",
  "Netherlands Antilles": "+599",
  "New Caledonia": "+687",
  "New Zealand": "+64",
  "Nicaragua": "+505",
  "Niger": "+227",
  "Nigeria": "+234",
  "Niue": "+683",
  "Norfolk Island": "+672",
  "Northern Mariana Islands": "+1 670",
  "Norway": "+47",
  "Oman": "+968",
  "Pakistan": "+92",
  "Palau": "+680",
  "Palestinian Territory, Occupied": "+970",
  "Panama": "+507",
  "Papua New Guinea": "+675",
  "Paraguay": "+595",
  "Peru": "+51",
  "Philippines": "+63",
  "Pitcairn": "+870",
  "Poland": "+48",
  "Portugal": "+351",
  "Puerto Rico": "+1 787",
  "Qatar": "+974",
  "Reunion": "+262",
  "Romania": "+40",
  "Russian Federation": "+7",
  "Rwanda": "+250",
  "Saint Helena": "+290",
  "Saint Kitts and Nevis": "+1 869",
  "Saint Lucia": "+1 758",
  "Saint Pierre and Miquelon": "+508",
  "Saint Vincent and The Grenadines": "+1 784",
  "Samoa": "+685",
  "San Marino": "+378",
  "Sao Tome and Principe": "+239",
  "Saudi Arabia": "+966",
  "Senegal": "+221",
  "Serbia": "+381",
  "Seychelles": "+248",
  "Sierra Leone": "+232",
  "Singapore": "+65",
  "Slovakia": "+421",
  "Slovenia": "+386",
  "Solomon Islands": "+677",
  "Somalia": "+252",
  "South Africa": "+27",
  "South Georgia and The South Sandwich Islands": "+500",
  "Spain": "+34",
  "Sri Lanka": "+94",
  "Sudan": "+249",
  "Suriname": "+597",
  "Svalbard and Jan Mayen": "+47",
  "Swaziland": "+268",
  "Sweden": "+46",
  "Switzerland": "+41",
  "Syrian Arab Republic": "+963",
  "Taiwan": "+886",
  "Tajikistan": "+992",
  "Tanzania, United Republic of": "+255",
  "Thailand": "+66",
  "Timor-leste": "+670",
  "Togo": "+228",
  "Tokelau": "+690",
  "Tonga": "+676",
  "Trinidad and Tobago": "+1 868",
  "Tunisia": "+216",
  "Turkey": "+90",
  "Turkmenistan": "+993",
  "Turks and Caicos Islands": "+1 649",
  "Tuvalu": "+688",
  "Uganda": "+256",
  "Ukraine": "+380",
  "United Arab Emirates": "+971",
  "United Kingdom": "+44",
  "United States": "+1",
  "United States Minor Outlying Islands": "+1 808",
  "Uruguay": "+598",
  "Uzbekistan": "+998",
  "Vanuatu": "+678",
  "Venezuela": "+58",
  "Viet Nam": "+84",
  "Virgin Islands, British": "+1 284",
  "Virgin Islands, U.S.": "+1 340",
  "Wallis and Futuna": "+681",
  "Western Sahara": "+212",
  "Yemen": "+967",
  "Zambia": "+260",
  "Zimbabwe": "+263"
};

	  
		  // Set the corresponding country code in the input field
		  countrycodeInput.value = countryCodes[selectedCountry] || "";
		});


		// Enable the submit button when the Telegram link is clicked
		var telegramClicked = false; // To track if the Telegram link has been clicked
		function clickMe() {
			// const submitButton = document.querySelector('#registrationForm .btn-submit');
			telegramClicked = true;
			// submitButton.disabled = false;
		}
		// Function to handle form submission
		function submitForm(event) {
			// Prevent form submission from reloading the page if the Telegram link is not clicked
            if (telegramClicked == false) {
				// $("#emptyUsernameMsg").css("display", "block").text("Please click the Telegram link to continue with registration.'");
				$("#emptyUsernameMsg").css("display", "block").text("Please click to join our telegram group to continue registration.");
                return; // Stop further processing if the name is empty
            }
			event.preventDefault(); // Prevent form submission from reloading the page

			// Get form data
			// const form = event.target;
			// Get form data
			const form = document.querySelector('#registrationForm'); // Target the form element
        	const formData = new FormData(form);
			// const formData = new FormData(form);

			// Get the values of the specific fields from the FormData object
            const nameValue = formData.get('name');
            const emailValue = formData.get('email');
            const countryValue = formData.get('country');
            const phoneValue = formData.get('phone');

			

            // Perform validation
            if (nameValue.trim() === '') {
				$("#emptyUsernameMsg").css("display", "block").text("Please enter your name.");
                return; // Stop further processing if the name is empty
            }

			// Define a regular expression pattern to match only letters
			const namePattern = /^[a-zA-Z\s]*$/;
			// Check if the input contains only letters
			if (!namePattern.test(nameValue)) {
				$("#emptyUsernameMsg").css("display", "block").text("Name should not be alphanumeric.");
				return; // Stop further processing if the name is empty
			} 
			

			if (isValidInput(nameValue) == false || isValidInput(countryValue) == false) {
				$("#emptyUsernameMsg").css("display", "block").text("Invalid input! Please enter valid text.");
				return; // Stop further processing if the name is empty				
			}

			
            if (emailValue.trim() === '') {
				$("#emptyUsernameMsg").css("display", "block").text("Please enter your email.");
                return; // Stop further processing if the email is empty
            }

			if (isValidEmail(emailValue) == false) {
				$("#emptyUsernameMsg").css("display", "block").text("Invalid email address!");
				return;
            }

            if (countryValue.trim() === '') {
				$("#emptyUsernameMsg").css("display", "block").text("Please enter your country.");
                return; // Stop further processing if the email is empty
            }

            if (phoneValue.trim() === '') {
				$("#emptyUsernameMsg").css("display", "block").text("Please enter your phone number.");
                return; // Stop further processing if the email is empty
            }

			if (isValidPhoneNumber(phoneValue) == false) {
				$("#emptyUsernameMsg").css("display", "block").text("Invalid phone number!");
				return;
            }

			

			// $("#emptyUsernameMsg").css("display", "block").removeClass("alert-danger").addClass("alert-success").text("All required fields are filled. please submit the form");
			$("#emptyUsernameMsg").css("display", "none");

			// Make AJAX request
			fetch('ajax/ajax_insert_pre_registration.php', {
				method: 'POST',
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				// Parse the JSON response
				// var data = JSON.parse(res);

				// Check the status and handle the message
				if (data.status === "success") {
					// Display the success message
					//pop thank you
					if(data && data.referrer_user_id) {
						Swal.fire({
							icon: 'success',
							title: 'Registered Successfully!',
							text: `Thank you for Registering on Gtron through Referal ID - ${data.referrer_user_id}. You have been successfully awarded 500 Gtron Token. You can claim this Token as soon as Our Website is Live.`,
							confirmButtonText: 'OK'
						})
					} else {
							Swal.fire({
							icon: 'success',
							title: 'Registered Successfully!',
							text: 'Thank you for registering with Gtron! Congratulations, you have been awarded 500 Gtron tokens absolutely free',
							confirmButtonText: 'OK'
						})
					}
				} 
				else if (data.status === "userAlreadyExists") {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: `${data.message}`,
						confirmButtonText: 'OK'
					})
				} 
				else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong! Please try again.',
						confirmButtonText: 'OK'
					})
				// Handle other status or error cases
				}
				// Handle the response data here
				// console.log(data);
				// For example, display a success message or show any errors returned from the server
			})
			.catch(error => {
				console.error('Error:', error);
			});
		}

		function isValidEmail(email) {
            // Regular expression pattern for basic email validation
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
			return emailPattern.test(email);
        }

		function isValidPhoneNumber(phone) {
            // Regular expression pattern for basic phone number validation
            const phonePattern = /^[0-9]{10}$/;
            return phonePattern.test(phone);
        }

		function isValidInput(input) {
			// Regular expression to check for potential script tags
			const scriptPattern = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i;
					
			return !scriptPattern.test(input);
		}

		// Add event listener to the form submit button
		const submitButton = document.querySelector('#registrationForm .btn-submit');
		submitButton.addEventListener('click', submitForm);
	  </script>
	 
</body>
</html>