<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Mail App</title>
  <link href="../icons/fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="../styles/partials/header.css">
  <link rel="stylesheet" href="../styles/partials/forms.css">
  <link rel="stylesheet" href="../styles/partials/alert.css">

  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

  <script src="../scripts/lightmode.js" defer></script>
  <script src="../scripts/overlay.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <header class="page-header">
      <div class="logo">
        <a href="./index.php" class="logo-icon inverted"><i class="far fa-envelope fa-5x"></i></a>
        <h1><a href="./index.php" class="logo-icon inverted">Send Mail</a></h1>
        <p>Your app to send private e-mails!</p>
      </div>
    </header>

    <main>
      <div class="form-container">
        <form action="../server/send_email.php" method="post" id="form-email">
          <div class="input-block">
            <label for="addressee">To:</label>
            <input type="email" name="addressee" id="addressee" placeholder="name@email.com">
          </div>

          <div class="input-block">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" placeholder="Subject">
          </div>

          <div class="textarea-block">
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
          </div>
        </form>
        <button type="submit" form="form-email" class="btn btn-primary form-button inverted">
          <i class="fas fa-reply fa-rotate-180"></i>
          <p>Send</p>
        </button>
      </div>
    </main>

    <footer>
      <div class="switch-area">
        <i class="far fa-moon fa-lg"></i>
        <button class='btn-switch-off'>
          <i class="fas fa-circle circle"></i>
        </button>
        <i class="far fa-sun fa-lg"></i>
      </div>

      <p> &copy; Design: Gabirel</p>
    </footer>
  </div>

  <?if (isset($_GET['email']) && $_GET['email'] == 'error1') {?>
  <div class="overlay inverted">
    <div class="alert inverted">
      <h1 class='text-danger inverted'><i class="far fa-times-circle"></i> ERROR</h1>
      <p>Fill in all fields.</p>
      <button class='btn btn-danger btn-back inverted'>GO BACK</button>
    </div>
  </div>

  <?} else if ((isset($_GET['email']) && $_GET['email'] == 'error2')) {?>
  <div class="overlay inverted">
    <div class="alert inverted">
      <h1 class='text-danger inverted'><i class="far fa-times-circle"></i> ERROR</h1>
      <p>It was not possible to send your e-mail.</p>
      <button class='btn btn-danger btn-back inverted' onclick="closeOverlay(this)">GO BACK</button>
    </div>
  </div>

  <? } else if ((isset($_GET['email']) && $_GET['email'] == 'success')){ ?>
  <div class="overlay inverted">
    <div class="alert inverted">
      <h1 class='text-success inverted'><i class="far fa-times-circle"></i> SUCCESS</h1>
      <p>Your e-mail has been sent.</p>
      <button class='btn btn-success btn-back inverted'>GO BACK</button>
    </div>
  </div>
  <? } ?>
</body>

</html>