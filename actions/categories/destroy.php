<?php

if (
    $_SERVER['REQUEST_METHOD'] === 'GET' &&
    isset($_GET['id'])
) {
    $id = $_GET['id'];

    echo '<h2>Data kategori berhasil dihapus (simulasi)</h2>';

    echo '<pre>';
    echo 'ID Kategori: ';
    print_r($id);
    echo '</pre>';
} else {
    echo 'ID data tidak ditemukan.';
}