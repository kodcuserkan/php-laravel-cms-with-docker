<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="/app.css">
  <script src="/app.js"></script>
</head>

<body>
  <div class='w3-container'>
    <header class="w3-padding">
      <h1 class='w3-text-red'>Login</h1>
      <?php if (auth()->check()) : ?>
        <p class='w3-text-green'>You are logged in as
          <?= auth()->user()->first_name ?> <?= auth()->user()->last_name ?></p>
          <a href="/console/logout">Log Out</a>
          <a href="/console/dashboard">Dashboard</a>
          <a href="/">Home Page</a>
      <?php else : ?>
        <p class='w3-text-red'>
          <a href="/">Return to my portfolio</a>
        </p>
      <?php endif; ?>
    </header>
    <hr />
    <section class="w3-padding" id='login'>
      <form method="post" action="/console/login" novalidate>
        <?= csrf_field() ?>
        <div class="w3-margin-bottom">
          <label for="email">Email Address: </label>
          <input type="email" name="email" id="email" value="<?= old('email') ?>">
          <?php if ($errors->has('email')) : ?>
            <p class='w3-text-red'><?= $errors->first('email') ?></p>
          <?php endif; ?>
        </div>
        <div class="w3-margin-bottom">
          <label for="password">Password: </label>
          <input type="password" name="password" id="password">
          <?php if ($errors->has('password')) : ?>
            <p class='w3-text-red'><?= $errors->first('password') ?></p>
          <?php endif; ?>
        </div>
        <div class="w3-margin-bottom">
          <button type="submit" class="w3-button w3-red">Log In</button>
        </div>
      </form>
    </section>
  </div>
</body>

</html>