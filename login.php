<?php

include 'config.php';
session_start();

if (isset($_POST['masuk'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' and password='$password'");

  $data = mysqli_fetch_assoc($query);

  $check = mysqli_num_rows($query);

  if (!$check) {
    $_SESSION['error'] = 'Username & password salah';
  } else {
    $_SESSION['userid'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role_id'] = $data['role_id'];

    header("Location:index.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
        "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
        ">
      <div class="card-body py-5 px-md-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <form method="post">

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="form3Example3" class="form-control" name="username" />
                <label class="form-label" for="form3Example3">Username</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>


              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4" name="masuk">
                Sign in
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</body>

</html>