<?php

require_once __DIR__ . '/../../repositories/book-repository.php';
require_once __DIR__ . '/../../repositories/category-repository.php';
require_once __DIR__ . '/../../repositories/author-repository.php';

// Revisi 3: getBook() dipanggil tanpa parameter.
$book = getBook();

$categories = getCategories();
$authors = getAuthors();

if ($book === null) {
    http_response_code(404);
    echo 'Buku tidak ditemukan.';
    exit;
}

// Pastikan data kategori dan penulis tersedia.
$book['category_id'] = $book['category_id'] ?? 0;
$book['author_ids'] = $book['author_ids'] ?? [];

$pageTitle = 'Edit Buku';
$pageSubtitle = 'Perbarui data buku, kategori, dan penulis';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Perpustakaan Digital</title>
    <link rel="stylesheet" href="../../styles/books/edit.css">
</head>

<body>

    <div class="app-shell">

        <?php require_once __DIR__ . '/../../components/admin/sidebar.php'; ?>

        <main class="app-main">

            <?php require_once __DIR__ . '/../../components/admin/topbar.php'; ?>

            <div class="app-content">

                <form method="post" action="../../actions/books/update.php">

                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars((string) $book['id'], ENT_QUOTES, 'UTF-8'); ?>"
                    >

                    <div class="form-card" style="margin-bottom:20px;">

                        <div class="form-section-title">Data Buku</div>

                        <div class="form-group">
                            <label for="title">Judul Buku</label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="<?= htmlspecialchars($book['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                required
                            >
                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="isbn">ISBN</label>

                                <input
                                    type="text"
                                    id="isbn"
                                    name="isbn"
                                    value="<?= htmlspecialchars($book['isbn'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="year">Tahun Terbit</label>

                                <input
                                    type="number"
                                    id="year"
                                    name="year"
                                    value="<?= htmlspecialchars((string) ($book['year'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                                    required
                                >
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="stock">Jumlah Stok</label>

                                <input
                                    type="number"
                                    id="stock"
                                    name="stock"
                                    min="0"
                                    value="<?= htmlspecialchars((string) ($book['stock'] ?? 0), ENT_QUOTES, 'UTF-8'); ?>"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="category_id">Kategori</label>

                                <select id="category_id" name="category_id" required>

                                    <?php foreach ($categories as $category): ?>

                                        <option
                                            value="<?= htmlspecialchars((string) $category['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                            <?= (int) $category['id'] === (int) $book['category_id'] ? 'selected' : ''; ?>
                                        >
                                            <?= htmlspecialchars($category['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>

                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                            ><?= htmlspecialchars($book['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>

                    </div>

                    <div class="form-card">

                        <div class="form-section-title">Penulis Buku</div>

                        <div class="form-group">

                            <label>Pilih Penulis (bisa lebih dari satu)</label>

                            <div class="checkbox-grid">

                                <?php foreach ($authors as $author): ?>

                                    <label class="checkbox-item">

                                        <input
                                            type="checkbox"
                                            name="author_ids[]"
                                            value="<?= htmlspecialchars((string) $author['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                            <?= in_array((int) $author['id'], array_map('intval', $book['author_ids']), true) ? 'checked' : ''; ?>
                                        >

                                        <?= htmlspecialchars($author['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>

                                    </label>

                                <?php endforeach; ?>

                            </div>

                        </div>

                        <div class="form-actions">

                            <a href="index.php" class="btn btn-outline">
                                Batal
                            </a>

                            <button
                                type="submit"
                                name="update"
                                class="btn btn-primary"
                            >
                                Simpan Perubahan
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </main>

    </div>

</body>

</html>