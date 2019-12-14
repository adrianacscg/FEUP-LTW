
<?php

  session_set_cookie_params(0, '/', 'localhost', true, true);
  session_start();

  function generate_random_token() {
    return bin2hex(openssl_random_pseudo_bytes(32));
  }

  if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
  }


?>

