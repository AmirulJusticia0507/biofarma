<style>
    /* CSS Kustom untuk Header */
    .navbar-custom-menu {
        margin-right: 10px; /* Atur margin kanan sesuai kebutuhan */
    }

    .navbar-custom-menu .dropdown-menu {
        right: 0; /* Menggeser menu dropdown ke kanan */
        left: auto; /* Menonaktifkan penyesuaian ke kiri */
    }

    .user-details {
        padding: 10px;
    }
</style>

<div class="navbar-custom-menu ml-auto">
    <ul class="nav navbar-nav">
        <!-- Gambar Profil -->
        <li class="dropdown user user-menu">
            <?php
            // Sisipkan koneksi.php
            require 'koneksi.php';

            // Gantilah '1' dengan ID pengguna yang sesuai dengan pengguna yang saat ini masuk
            $userID = 1; // Anda perlu menggantinya dengan cara yang sesuai untuk mendapatkan ID pengguna saat ini

            $query = "SELECT username, role, foto FROM users WHERE id = $userID";
            $result = $connection->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row["username"];
                $role = $row["role"];
                $profileImageUrl = $row["foto"];
            } else {
                $username = "Nama Username";
                $role = "Peran sebagai";
                $profileImageUrl = "path_to_user_image.jpg";
            }

            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
            echo '<img src="' . $profileImageUrl . '" class="user-image" alt="User Image">';
            echo '<span class="hidden-xs">' . $username . '</span>';
            echo '</a>';
            ?>
            <ul class="dropdown-menu">
                <!-- User Details -->
                <li class="user-details">
                    <p>Nama Pengguna: <strong><?php echo $username; ?></strong></p>
                    <p>Peran: <strong><?php echo $role; ?></strong></p>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- Pastikan Anda sudah menyisipkan jQuery sebelum menggunakan script ini -->
<!-- Skrip JavaScript untuk mengontrol dropdown menu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Saat tombol dropdown di-klik
        $(".dropdown-toggle").click(function (e) {
            e.preventDefault(); // Mencegah tindakan default dari link
            $(this).next(".dropdown-menu").slideToggle(); // Menampilkan atau menyembunyikan dropdown menu
        });
    });
</script>
