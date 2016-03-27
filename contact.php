<?php
if(isset($_POST['email'])) {

    $email_to = "contact@racingsloth.xyz";
    $email_subject = "RACINGSLOTH Contact Form";

    function died($error) {
        echo "We found some errors with the form.";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Sorry, but there are some errors with this form.');
        header('Refresh: 1.5; URL=https://racingsloth.xyz/index.html#contact');
    }

    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $message = $_POST['message'];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The email address is invalid. Please enter a valid address.<br />';
    header('Refresh: 1.5; URL=https://racingsloth.xyz/index.html#contact');
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Please enter a valid first name.<br />';
    header('Refresh: 1.5; URL=https://racingsloth.xyz/index.html#contact');
  }
  if(strlen($message) < 2) {
    $error_message .= 'The message doesn\'t seem to be valid. Enter a valid message, then try sending it again.<br />';
    header('Refresh: 1.5; URL=https://racingsloth.xyz/index.html#contact');
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message:<br />".clean_string($message)."\n";

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>RACINGSLOTH Productions</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href='https://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png" />
    <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicons/favicon-194x194.png" sizes="194x194" />
    <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192" />
    <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16" />
    <link rel="manifest" href="favicons/manifest.json" />
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#f62459" />
    <link rel="shortcut icon" href="favicons/favicon.ico" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png" />
    <meta name="msapplication-config" content="favicons/browserconfig.xml" />
    <meta name="theme-color" content="#f62459" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  </head>
<body>
  <header id="header">
    <a href="https://racingsloth.xyz" style="text-decoration: none; color: inherit;"><h1 id="logo" style="margin-left: 1em">RACING<span class="sloth">SLOTH</span> <span class="rlight">PRODUCTIONS</span></h1></a>
  </header>

  <section id="intro" class="main style1 dark fullscreen">
		<video autoplay muted loop src="images/yes.mp4" class="background-video">
			<source src="images/yes.mp4" type="video/mp4" />
		</video>
		<div class="content container 95%">
			<header>
				<h2 style="font-size: 2.75em; letter-spacing: 0px"><span class="sloth">No money.</span> Mo' problems.</h2>
        <p>
          Thanks for getting in touch! We'll be sure to respond within <span class="sloth">24 hours</span>!
        </p>
        <br />
        <div id="backer">
          <button onclick="window.location='https://racingsloth.xyz'" id="go-back" style="border: 1.25px solid white; padding-top: 0; padding-bottom: 0; background-color: transparent; border-radius: 2%; font-weight: bold; font-family: 'Rokkitt', serif; font-size: 0.625em;">GO BACK</button>
        </div>
			</header>
		</div>
	</section>

</body>
</html>

<?php
}
header('Refresh: 10; URL=https://racingsloth.xyz');
die();
?>
