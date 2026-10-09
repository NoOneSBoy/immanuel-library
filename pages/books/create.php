
<?php

require_once __DIR__ . '/../../repositories/book-repository.php';
require_once __DIR__ . '/../../repositories/category-repository.php';
require_once __DIR__ . '/../../repositories/author-repository.php';

$categories = getCategories();
$authors = getAuthors();

$pageTitle = 'Tambah Buku';
$pageSubtitle = 'Tambahkan buku baru ke dalam koleksi perpustakaan';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Perpustakaan Digital</title>
    <link rel="stylesheet" href="../../styles/books/create.css">
</head>

<body>

    <div class="app-shell">

        <?php require_once __DIR__ . '/../../components/admin/sidebar.php'; ?>

        <main class="app-main">

            <?php require_once __DIR__ . '/../../components/admin/topbar.php'; ?>

            <div class="app-content">

                <form action="../../actions/books/store.php" method="POST">

                    <div class="form-card">

                        <div class="form-section-title">
                            Form Tambah Buku
                        </div>

                        <div class="form-group">
                            <label for="title">Judul Buku</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
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
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="year">Tahun Terbit</label>
                                <input
                                    type="number"
                                    id="year"
                                    name="year"
                                    min="1"
                                    required
                                >
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="stock">Stok Buku</label>
                                <input
                                    type="number"
                                    id="stock"
                                    name="stock"
                                    min="0"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="category_id">Kategori</label>

                                <select
                                    id="category_id"
                                    name="category_id"
                                    required
                                >
                                    <option value="">Pilih Kategori</option>

                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= htmlspecialchars((string) $category['id'], ENT_QUOTES, 'UTF-8'); ?>">
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
                                rows="5"
                                required
                            ></textarea>
                        </div>

                        <div class="form-group">
                            <label>Penulis</label>

                            <?php foreach ($authors as $author): ?>
                                <div style="margin-bottom: 8px;">
                                    <label style="display: inline-flex; align-items: center; gap: 8px; font-family: inherit; font-size: 14px; font-weight: normal; text-transform: none; letter-spacing: normal; color: var(--ink);">
                                        <input
                                            type="checkbox"
                                            name="author_ids[]"
                                            value="<?= htmlspecialchars((string) $author['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                            style="width: auto;"
                                        >

                                        <?= htmlspecialchars($author['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        <div class="form-actions">

                            <a href="index.php" class="btn btn-outline">
                                Batal
                            </a>

                            <button
                                type="submit"
                                name="store"
                                class="btn btn-primary"
                            >
                                Simpan Buku
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </main>

    </div>

</body>

</html>