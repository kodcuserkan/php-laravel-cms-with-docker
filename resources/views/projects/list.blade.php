<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
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
      <h2>Projects</h2>

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

      <?php if (count($projects) > 0) : ?>
        <table class="w3-table w3-striped w3-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>URL</th>
              <th>Slug</th>
              <th>Image</th>
              <th>Content</th>
              <th>Type ID</th>
              <th>User ID</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($projects as $project) : ?>
              <tr>
                <td><?= $project->id ?></td>
                <td><?= $project->title ?></td>
                <td><?= $project->url ?></td>
                <td><?= $project->slug ?></td>
                <td><?= $project->image ?></td>
                <td><?= $project->content ?></td>
                <td><?= $project->type_id ?></td>
                <td><?= $project->user_id ?></td>
                <td><?= $project->created_at ?></td>
                <td><?= $project->updated_at ?></td>
                <td>
                  <a href="/console/projects/edit/<?= $project->id ?>">Edit</a>
                  <a href="/console/projects/delete/<?= $project->id ?>">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>


          </tbody>


        </table>
      <?php else : ?>
        <p class='w3-text-red'>No projects found.</p>
      <?php endif; ?>


      <a href="/console/projects/create" class="w3-button w3-green w3-margin ">Create New Project</a>
    </section>
  </div>
</body>

</html>