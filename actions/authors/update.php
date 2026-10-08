<?php

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset(
        $_POST['update'],
        $_POST['id'],
        $_POST['name'],
        $_POST['bio']
    )
) {
    echo '<h2>Data penulis berhasil diubah (simulasi)</h2>';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
} else {
    echo 'Data tidak lengkap atau halaman dibuka tanpa mengirim form.';
}