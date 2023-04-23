<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Types - Edit</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="/app.css">
  <script src="/app.js"></script>
</head>

<body>
  <div class='w3-container'>
    <header class="w3-padding">
      <h1 class='w3-text-red'>Dashboard</h1>

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
    <section class="w3-padding" id='dashboard'>

      <?php if (session()->has('success')) : ?>
        <div class='w3-green w3-margin-bottom w3-center w3-padding'>
          <p><?= session('success') ?></p>
        </div>
      <?php endif; ?>


      <?php if (session()->has('error')) : ?>
        <div class='w3-red w3-margin-bottom w3-center w3-padding'>
          <p><?= session('error') ?></p>
        </div>
      <?php endif; ?>

      <h2 class='w3-text-red'>Editing '<?= $type->title ?>' type.</h2>

      <?php if ($errors->any()) : ?>
        <div class='w3-red w3-margin-bottom w3-margin-top w3-center w3-padding'>
          <ul class='w3-ul'>
            <?php foreach ($errors->all() as $error) : ?>
              <li><?= $error ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="/console/types/edit/<?= $type->id ?>" method="POST" class='w3-margin-bottom' novalidate>
        <?= csrf_field() ?>
        <div class='w3-margin-bottom'>
          <label for="title">Title</label>
          <input type="text" name="title" id="title" value="<?= old('title', $type->title) ?>" class='w3-input w3-border w3-margin-bottom' required>
        </div>
        <div class='w3-margin-bottom'>
          <button type="submit" class='w3-button w3-red'>Update Type</button>
        </div>
      </form>

      <a href="/console/types/list">Back to Types</a>

    </section>
  </div>
</body>

</html>