<?php
if (isset($_POST['id'], $_POST['name'], $_POST['description'])) {
    echo '<h2>Data kategori diterima</h2>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
} else {
    echo 'Data tidak lengkap atau halaman dibuka tanpa mengirim form.';
}