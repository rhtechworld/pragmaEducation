<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>

<?php

$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

$encryption = $_GET['key'];

// Non-NULL Initialization Vector for decryption
$decryption_iv = "3045160714733045";
  
// Store the decryption key
$decryption_key = $student_email_session;
  
// Use openssl_decrypt() function to decrypt the data
$decryptionString =openssl_decrypt($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);

echo "https://drive.google.com/uc?id=".$decryptionString."&export=download";

?>

