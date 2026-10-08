<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    echo "<h2>Data buku berhasil dihapus (simulasi)</h2>";

    echo '<pre>';
    echo "ID Buku: ";
    print_r($id);
    echo '</pre>';
} else {
    echo 'ID data tidak ditemukan.';
}