<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Data penulis dengan id {$id} berhasil dihapus (simulasi, belum ada database).";
} else {
    echo 'ID data tidak ditemukan.';
}