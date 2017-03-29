<?php
      //Set the Content Type
      header('Content-type: image/png');
	  
	  // Set Text to Be Printed On Image
      $name = $_GET['name']; //$_"EKAMBI";
      $username = $_GET['username']; //"Hortense";
      $phone = $_GET['phone']; //"6 99 12 45 46";
      $quartier = $_GET['quartier']; //"Makepe";
	  $id = $_GET['id']; // id
      // Create Image From Existing File
      $jpg_image = imagecreatefrompng('carte.png');
      $new_image = "carte_new".$id.".png";
	  
      // Allocate A Color For The Text
      $white = imagecolorallocate($jpg_image, 0, 0, 0);

      // Set Path to Font File	
      $font_path = '../fonts/Futura Heavy Italic font.ttf';

   
	  
	  // Add Qr Code
	  $qr_code = imagecreatefrompng("../../tmp/qr_codes/qr_code_client".$id.".png");

      // Print Text On Image
      imagettftext($jpg_image, 25, 0, 455, 318, $white, $font_path, $name);
      imagettftext($jpg_image, 25, 0, 455, 369, $white, $font_path, $username);
      imagettftext($jpg_image, 25, 0, 455, 421, $white, $font_path, $phone);
      imagettftext($jpg_image, 25, 0, 455, 472, $white, $font_path, $quartier);
	  
	  // Send Image to Browser
      //imagepng($jpg_image);
	  
	  imagecopy($jpg_image, $qr_code, 771, 50, 0, 0, 225, 225);
	  
      // Send Image to Browser
      imagepng($jpg_image);
     imagepng($jpg_image, $new_image);
	//var_dump($jpg_image); die;
      // Clear Memory
      imagedestroy($jpg_image);
    ?>