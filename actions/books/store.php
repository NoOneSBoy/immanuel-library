<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
    if (
        isset(
            $_POST['title'],
            $_POST['isbn'],
            $_POST['year'],
            $_POST['stock'],
            $_POST['category_id'],
            $_POST['description']
        )
    ) {
        echo '<h2>Data buku baru diterima</h2>';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    } else {
        echo 'Data tidak lengkap.';
    }
} else {
    echo 'Akses tidak valid.';
}