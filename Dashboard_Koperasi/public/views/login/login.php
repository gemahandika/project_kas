<?php
session_name("kas_session");
session_start();

// Jika sudah login, redirect ke halaman index
if (isset($_SESSION['admin_username'])) {
  header("location:../index.php");
  exit();
}

include '../../../app/config/koneksi.php';

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validasi input kosong
  if (empty($username) || empty($password)) {
    $err = "Silahkan Masukan Username dan Password";
  } else {
    // Query untuk mendapatkan user berdasarkan username
    $sql1 = "SELECT * FROM user WHERE username = ?";
    $stmt1 = mysqli_prepare($koneksi, $sql1);

    if ($stmt1) {
      mysqli_stmt_bind_param($stmt1, "s", $username);
      mysqli_stmt_execute($stmt1);

      $result1 = mysqli_stmt_get_result($stmt1);

      // Validasi akun ditemukan dan password sesuai
      if ($result1->num_rows === 0) {
        $err = "Akun Tidak ditemukan";
      } else {
        $row = $result1->fetch_assoc();

        // Periksa password menggunakan md5
        if ($row['password'] !== md5($password)) {
          $err = "Password Salah";
        } else {
          // Query untuk mendapatkan akses user
          $login_id = $row['login_id'];
          $sql2 = "SELECT akses_id FROM admin_akses WHERE login_id = ?";
          $stmt2 = mysqli_prepare($koneksi, $sql2);

          if ($stmt2) {
            mysqli_stmt_bind_param($stmt2, "s", $login_id);
            mysqli_stmt_execute($stmt2);

            $result2 = mysqli_stmt_get_result($stmt2);

            $akses = [];
            while ($row2 = $result2->fetch_assoc()) {
              $akses[] = $row2['akses_id'];
            }

            // Validasi akses tidak kosong
            if (empty($akses)) {
              $err = "Kamu Tidak Punya Akses";
            } else {
              // Set session dan redirect
              $_SESSION['admin_username'] = $username;
              $_SESSION['admin_akses'] = $akses;
              header("location:../index.php");
              exit();
            }
          } else {
            $err = "Kesalahan pada prepared statement 2";
          }
        }
      }
    } else {
      $err = "Kesalahan pada prepared statement 1";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app/assets/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../../../app/assets/img/LOGO1.png">
  <title>Login - Dashboard KAS</title>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo text-center" style="font-family: 'Arial-black';">
      <h2>Kreasi Anugerah Sejahtera</h2>
    </div>
    <div class="login-box">
      <form class="login-form" action="" method="post">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN</h3>
        <?php
        if ($err) {
          echo "<h6 style='color: red;'>$err</h6>";
        }
        ?>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" type="text" name="username" placeholder="Username" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="utility">
            <div class="animated-checkbox">
              <label>
                <input type="checkbox"><span class="label-text">Stay Signed in</span>
              </label>
            </div>
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
        </div>
      </form>
      <form class="forget-form" action="index.html">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
          <label class="control-label">EMAIL</label>
          <input class="form-control" type="text" placeholder="Email">
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
        </div>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../../assets/js/popper.min.js"></script>
  <script src="../../../assets/js/bootstrap.min.js"></script>
  <script src="../../../assets/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>
</body>

</html>