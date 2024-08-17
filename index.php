<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MAFARIMS</title>
  <link rel="icon" href="assets/logo.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <section id="home">
    <video class="w-100 position-absolute" loop muted autoplay src="assets/bg-vid.mp4"></video>
    <div class="container-fluid position-fixed">
      <nav class="navbar navbar-light">
        <div class="container-md">
          <a class="navbar-brand fs-3 logo text-success" href="#">
            <img src="assets/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-center" />
            MAFARIMS
          </a>
          <div navbar-links>
            <a href="#home" class="btn btn-outline-success but">Home</a>
            <a href="#about" class="btn btn-outline-success but">About</a>
            <a href="#login" class="btn btn-success but">Login</a>
          </div>
        </div>
      </nav>
    </div>
  </section>

  <section id="about">
    <div class="container-fluid ">
      <div class="container-md">
        <br /><br /><br /><br /><br /><br>
        <div class="row">
          <div class="col-md-7" d-flex">
            <h1 class="tit text-success">MAFAR INVENTORY 🛠️<br />MANAGEMENT SYSTEM</h1>
            <div class="col feat">
              <h2>
                🛠️ Inventory Management <br>
                📦 Efficient Transfer Tracking <br>
                📈 Real-Time Confirmation <br>
                📊 Detailed Reporting</h2>
            </div>
          </div>
          <div class="col-md-5">
            <img src="assets/invenotry-grow.gif" class="wew" height="450px" alt="">
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <hr class="road">

  <section id="login">
    <div class="container">
      <div class="row justify-content-center dunn">
        <div class="col-md-4 oks">
          <img src="assets/logo.png" height="350px" alt="">
        </div>
        <div class="col-md-4 blob">
          <h2 class="text-center fw-bolder text-success mt-5">Login</h2><br>
          <form>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="@nurhaminator" />
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" />
              <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-success but w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <footer class="text-center fw-bold">
    &copy; 2024 Developed by : CSU-BSIT Capstone Project
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>