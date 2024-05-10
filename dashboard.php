<?php
session_start();
if (!isset($_SESSION['Auth'])) {
  header('location: login.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project Management Dashboard</title>
  <link rel="stylesheet" href="dashboard.css" />
</head>

<body>
  <div class="container">
    <aside class="sidebar">
      <h2>Navigation</h2>
      <ul>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#tasks">Tasks</a></li>
        <li><a href="#team">Team</a></li>
      </ul>
    </aside>
    <main>
      <section id="projects">
        <h2>Projects</h2>
        <ul>
          <li><a href="#">Project 1</a></li>
          <li><a href="#">Project 2</a></li>
          <li><a href="#">Project 3</a></li>
          <li><a href="#">Create New Project</a></li>
        </ul>
      </section>
      <section id="tasks">
        <h2>Tasks</h2>
        <ul>
          <li><a href="#">Task 1</a></li>
          <li><a href="#">Task 2</a></li>
          <li><a href="#">Task 3</a></li>
          <li><a href="#">View All Tasks</a></li>
        </ul>
      </section>
      <section id="team">
        <h2>Team</h2>
        <ul>
          <li><a href="#">Team Member 1</a></li>
          <li><a href="#">Team Member 2</a></li>
          <li><a href="#">Team Member 3</a></li>
          <li><a href="#">Manage Team</a></li>
        </ul>
      </section>
    </main>
    <footer>
      <p>&copy; 2024 Your Project Management Company. All rights reserved.</p>
    </footer>
  </div>
</body>

</html>