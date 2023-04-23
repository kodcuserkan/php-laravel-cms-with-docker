<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects - Create</title>
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

      <h2 class='w3-text-red'>Create a project.</h2>

      <?php if ($errors->any()) : ?>
        <div class='w3-red w3-margin-bottom w3-margin-top w3-center w3-padding'>
          <ul class='w3-ul'>
            <?php foreach ($errors->all() as $error) : ?>
              <li><?= $error ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form class='w3-container' method='POST' action='/console/projects/create' enctype='multipart/form-data'>
        <?= csrf_field() ?>
        <label class='w3-text-red'>Title</label>
        <input class='w3-input w3-border w3-margin-bottom' type='text' name='title' value='<?= old('title') ?>' required />
        <label class='w3-text-red'>URL</label>
        <input class='w3-input w3-border w3-margin-bottom' type='text' name='url' value='<?= old('url') ?>' required />
        <label class='w3-text-red'>Slug</label>
        <input class='w3-input w3-border w3-margin-bottom' type='text' name='slug' value='<?= old('slug') ?>' required />
        <label class='w3-text-red'>Image</label>
        <input class='w3-input w3-border w3-margin-bottom' type='text' name='image' />
        <label class='w3-text-red'>Content</label>
        <textarea class='w3-input w3-border w3-margin-bottom' name='content' required><?= old('content') ?></textarea>
        <label class='w3-text-red'>Type ID</label>
        <input class='w3-input w3-border w3-margin-bottom' type='text' name='type_id' value='<?= old('type_id') ?>' required />
        <label class='w3-text-red'>User ID</label>
        <input class='w3-input w3-border w3-margin-bottom' type='text' name='user_id' value='<?= old('user_id') ?>' required />
        <input type='hidden' name='csrf_token' value='<?= csrf_token() ?>' />
        <button class='w3-btn w3-red w3-margin-bottom' type="submit">Create Project</button>
      </form>

      <a href="/console/projects/list">Back to Projects</a>
    </section>
  </div>
</body>

</html>