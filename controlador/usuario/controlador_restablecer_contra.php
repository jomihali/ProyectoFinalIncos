<?php
           use PHPMailer\PHPMailer\PHPMailer;
           use PHPMailer\PHPMailer\Exception;
           
           require 'PHPMailer/src/Exception.php';
           require 'PHPMailer/src/PHPMailer.php';
           require 'PHPMailer/src/SMTP.php';
   
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $contraactual = htmlspecialchars($_POST['contrasena'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['contrasena'],PASSWORD_DEFAULT,['cost'=>10]);
    $consulta = $MU->Restablecer_Contra($email,$contra);

    if($consulta==1){

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
      try {
    //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'johanavargasvillarroel@gmail.com';                     // SMTP username
        $mail->Password   = '20diciembre2018';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
        $mail->setFrom('johanavargasvillarroel@gmail.com', 'johana');
        $mail->addAddress('$email');     // Add a recipient

    // Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Restablecer password';
        $mail->Body    = 'Su contrasena fue restablecida<b>Nueva contrasena:</b><b>'.$contraactual.'</b>';

        $mail->send();
         echo '1';
      } catch (Exception $e) {
         echo "0";
      }
    }else{
      echo "2";
    }

?>
