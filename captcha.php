<html>
    <body> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
      <!-- your HTML content -->
<!-- 

Public Key:	6LeRC8kSAAAAAM7UQslHDYbVPbptPGUhG_DEo1SQ
Private Key:	6LeRC8kSAAAAAA8i32OVeoxPM13JrjYpXJAPLu1f

-->
      <form method="post" action="verify.php">
        <?php
          require_once('recaptchalib.php');
          $publickey = "6LeRC8kSAAAAAM7UQslHDYbVPbptPGUhG_DEo1SQ"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
        <input type="submit" />
      </form>

      <!-- more of your HTML content -->
    </body>
  </html>
