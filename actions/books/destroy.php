<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Data buku dengan id {$id} berhasil dihapus (simulasi, belum ada database).";
} else {
    echo 'ID data tidak ditemukan.';
}