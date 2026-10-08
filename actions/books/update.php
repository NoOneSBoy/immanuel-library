<?php

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset(
        $_POST['update'],
        $_POST['id'],
        $_POST['title'],
        $_POST['isbn'],
        $_POST['year'],
        $_POST['stock'],
        $_POST['category_id'],
        $_POST['description']
    )
) {
    echo '<h2>Data buku berhasil diubah (simulasi)</h2>';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
} else {
    echo 'Data tidak lengkap atau halaman dibuka tanpa mengirim form.';
}