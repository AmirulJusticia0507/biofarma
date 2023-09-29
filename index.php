
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Collection BPRS</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Tambahkan link AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="img/logo_white.png" type="image/png">
</head>
<body class="hold-transition sidebar-mini">
<div id="page-spinner" class="page-spinner"></div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Tambahkan konten header AdminLTE di sini -->
            <!-- Misalnya, tombol Sidebar Toggle -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Header Gambar Profil -->
            <?php include 'header.php'; ?>
        </nav>
        
        <?php include 'sidebar.php'; ?>

        <div class="content-wrapper">
            <!-- Konten Utama -->
            <main class="content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                
                    // Periksa apakah pengguna sudah berada di halaman yang sesuai,
                    // jika iya, tidak perlu melakukan pengalihan
                    if ($page === 'transaction' && basename($_SERVER['PHP_SELF']) !== 'transaction.php') {
                        header("Location: transaction.php");
                        exit;
                    }
                    elseif ($page === 'reportingtransaction' && basename($_SERVER['PHP_SELF']) !== 'reportingtransaction.php') {
                        header("Location: reportingtransaction.php");
                        exit;
                    }
                    elseif ($page === 'dashboard' && basename($_SERVER['PHP_SELF']) !== 'index.php') {
                        header("Location: index.php");
                        exit;
                    }
                    elseif ($page === 'usermanagement' && basename($_SERVER['PHP_SELF']) !== 'usermanagement.php') {
                        header("Location: usermanagement.php");
                        exit;
                    }
                }
                ?>
            </main>
        </div>

<?php include 'footer.php'; ?>
    </div>

    <!-- Tambahkan skrip Bootstrap dan AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>
