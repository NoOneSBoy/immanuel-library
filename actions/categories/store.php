<?php

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset(
        $_POST['store'],
        $_POST['name'],
        $_POST['description']
    )
) {
    echo '<h2>Data kategori berhasil disimpan (simulasi)</h2>';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
} else {
    echo 'Data tidak lengkap atau halaman dibuka tanpa mengirim form.';
}