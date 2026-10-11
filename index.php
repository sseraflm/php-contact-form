<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  $errors = [];
  $name = "";
  $email = "";
  $message = "";
  $success = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $message = trim($_POST['message'] ?? "");

    if ($name === "") {
      $errors['name'] = 'Please enter your name.';
    };
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $errors['email'] = 'Please enter a valid email address.';
    };
    if ($message === "") {
      $errors['message'] = 'Please enter your message.';
    };

    if (empty($errors)) {
      $success = true;
      $name =  "";
      $email = "";
      $message = "";
    };
  };
  ?>

  <?php if ($success): ?>
    <p class="success">Thanks your message was sent.</p>
  <?php endif; ?>
  <form action="" method="post">
    <label for="nameInput">name</label>
    <input type="text" name="name" id="nameInput" required value="<?= htmlspecialchars($name) ?> " />
    <?php if (isset($errors['name'])): ?>
      <span class="error"><?= $errors['name'] ?></span>
    <?php endif; ?> <br>


    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required />
    <?php if (isset($errors['email'])): ?>
      <span class="error"><?= $errors['email'] ?></span>
    <?php endif; ?> <br>


    <label for="message">Message:</label>
    <textarea name="message" id="message" required><?= htmlspecialchars($message) ?></textarea>
    <?php if (isset($errors['message'])): ?>
      <span class="error"><?= $errors['message'] ?></span>
    <?php endif; ?> <br>


    <button type="submit">submit</button>
  </form>
</body>

</html>