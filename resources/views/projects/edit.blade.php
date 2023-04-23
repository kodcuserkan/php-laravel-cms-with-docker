<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects - Edit</title>
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

      <h2 class='w3-text-red'>Editing '<?= $project->title ?>' project.</h2>

      <?php if ($errors->any()) : ?>
        <div class='w3-red w3-margin-bottom w3-margin-top w3-center w3-padding'>
          <ul class='w3-ul'>
            <?php foreach ($errors->all() as $error) : ?>
              <li><?= $error ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="/console/projects/edit/<?= $project->id ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
        <div class="w3-row">
          <div class="w3-col m6">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="w3-input" value="<?= $project->title ?>">
          </div>
          <div class="w3-col m6">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="w3-input" value="<?= $project->url ?>">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col m6">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="w3-input" value="<?= $project->slug ?>">
          </div>
          <div class="w3-col m6">
            <label for="image">Image URL</label>
            <input type="text" name="image" id="image" class="w3-input" value="<?= $project->image ?>">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col m6">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="w3-input"><?= $project->content ?></textarea>
          </div>
          <div class="w3-col m6">
            <label for="type_id">Type ID</label>
            <input type="text" name="type_id" id="type_id" class="w3-input" value="<?= $project->type_id ?>">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col m6">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" class="w3-input" value="<?= $project->user_id ?>">
          </div>
        </div>

        <input type="submit" value="Update Project" class="w3-button w3-red w3-margin-top w3-margin-bottom">
      </form>
      <a href="/console/projects/list">Back to Projects</a>
    </section>
  </div>
</body>

</html>