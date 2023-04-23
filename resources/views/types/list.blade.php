<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Types</title>
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

      <h2 class='w3-text-red'>Types</h2>
      <table class='w3-table w3-striped w3-bordered w3-margin-bottom'>
        <thead class="w3-red">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($types as $type) : ?>
            <tr>
              <td><?= $type->id ?></td>
              <td><?= $type->title ?></td>
              <td><?= $type->created_at ?></td>
              <td><?= $type->updated_at ?></td>
              <td><a href="/console/types/edit/<?= $type->id ?>">Edit</a></td>
              <td><a href="/console/types/delete/<?= $type->id ?>">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a href="/console/types/create" class="w3-button w3-green">Create New Type</a>
    </section>
  </div>
</body>

</html>