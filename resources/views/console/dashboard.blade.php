<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
      <ul>
        <li><a href="/console/projects/list">Manage Projects</a></li>
        <li><a href="/console/types/list">Manage Types</a></li>
        <li><a href="/console/users/list">Manage Users</a></li>
      </ul>
    </section>
  </div>
</body>

</html>