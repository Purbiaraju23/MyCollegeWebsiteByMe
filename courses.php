<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Website</title>
  <style>
    h1 {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-style: oblique;
    }
    /* CSS styles for the layout */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Set minimum height to make the layout fill the viewport */
    }
    header {
      background-color: #f0f0f0;
      padding: 20px;
    }
    nav {
      background-color: yellowgreen;
      margin-top: 10px;
    }
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    nav ul li {
      display: inline;
      margin-right: 10px;
      font-size: 25px; /* Increase the font size */
    }
    main {
      flex-grow: 1;
      padding: 25px;
    }
    body {
      background: rgb(245,222,207);
      background: linear-gradient(90deg, rgba(245,222,207,1) 0%, rgba(255,243,243,1) 33%, rgba(0,212,255,1) 100%);
    }
    footer {
      background-color: #f0f0f0;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <header style="background: rgb(245,222,207);
    background: linear-gradient(90deg, rgba(245,222,207,1) 0%, rgba(255,243,243,1) 33%, rgba(0,212,255,1) 100%);">
    <h1>GIDC Degree Engineering College</h1>
    <div class="logo">
        <img src="gdec.png" alt="Logo">
    </div>

    <nav>
      <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="notes.php">Notes</a></li>
        <li><a href="faculty.php">Faculty Details</a></li>
        <li><a href="facilities.php">Facilities</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="achievements.php">Achievements</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- Main content of your page -->
  </main>

  <footer>
    <?php
    session_start();
    include('footer.php');
    ?>
  </footer>
  
</body>
</html>
