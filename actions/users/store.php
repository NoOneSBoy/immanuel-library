<?php
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'])) {
    echo '<h2>Data pengguna baru diterima</h2>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
} else {
    echo 'Data tidak lengkap atau halaman dibuka tanpa mengirim form.';
}