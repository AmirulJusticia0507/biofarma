<?php
// sidebar.php

function isPageActive($pageName) {
    if (isset($_GET['page']) && $_GET['page'] == $pageName) {
        return 'active';
    }
    return '';
}
?>
<style>
    /* CSS untuk spinner */
.page-spinner {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.spinner {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-radius: 50%;
    border-top: 4px solid #007bff; /* Warna utama */
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Tambahkan konten sidebar AdminLTE di sini -->
    <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light">Mobile Collection <img src="img/logo_white.png" alt="" style="width:80px;"></span>
    </a>
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column nowrap" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="index.php?page=dashboard" class="nav-link <?php echo isPageActive('dashboard'); ?>">
                    <i class="fa fa-tachometer-alt nav-icon"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="transaction.php?page=transaction" class="nav-link <?php echo isPageActive('transaction'); ?>">
                    <i class="fa fa-file-invoice-dollar nav-icon"></i>
                    <p>Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="reportingtransaction.php?page=reportingtransaction" class="nav-link <?php echo isPageActive('reportingtransaction'); ?>">
                    <i class="fa fa-file-invoice-dollar nav-icon"></i>
                    <p>Reporting Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="usermanagement.php?page=usermanagement" class="nav-link <?php echo isPageActive('usermanagement'); ?>">
                    <i class="fa fa-users nav-icon"></i>
                    <p>User Management</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- Skrip JavaScript untuk mengontrol pushmenu -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const pushMenuButton = document.querySelector(".nav-link[data-widget='pushmenu']");
    const body = document.querySelector("body");
    const pageSpinner = document.getElementById("page-spinner");

    pushMenuButton.addEventListener("click", function (e) {
        e.preventDefault();
        body.classList.toggle("sidebar-collapse");
        body.classList.toggle("sidebar-open");
    });

    // Fungsi untuk menampilkan spinner
    function showSpinner() {
        pageSpinner.style.display = "flex";
    }

    // Fungsi untuk menyembunyikan spinner
    function hideSpinner() {
        pageSpinner.style.display = "none";
    }

    // Tambahkan event listener ke setiap tautan navigasi yang akan menampilkan spinner
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            showSpinner();
        });
    });

    // Sembunyikan spinner saat halaman baru dimuat
    window.addEventListener("load", function () {
        hideSpinner();
    });
});

</script>
