<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Buku - Perpustakaan Digital</title>
  <link rel="stylesheet" href="../../styles/books/edit.css">
</head>

<body>

<?php
require_once __DIR__ . '/../../repositories/book-repository.php';
require_once __DIR__ . '/../../repositories/category-repository.php';
require_once __DIR__ . '/../../repositories/author-repository.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$books = getBooks();

$book = null;

foreach ($books as $item) {
    if ((string) $item['id'] === (string) $id) {
        $book = $item;
        break;
    }
}

if (!$book) {
    header('Location: index.php');
    exit;
}

$categories = getCategories();
$authors = getAuthors();

$pageTitle = 'Edit Buku';
$pageSubtitle = 'Perbarui data buku, kategori, dan penulis';
?>

<div class="app-shell">

  <?php require_once __DIR__ . '/../../components/admin/sidebar.php'; ?>

  <main class="app-main">

    <?php require_once __DIR__ . '/../../components/admin/topbar.php'; ?>

    <div class="app-content">

      <form method="post" action="../../actions/books/update.php">

        <input
          type="hidden"
          name="id"
          value="<?= htmlspecialchars($book['id']) ?>"
        >

        <div class="form-card" style="margin-bottom:20px;">

          <div class="form-section-title">
            Data Buku
          </div>

          <div class="form-group">
            <label for="title">Judul Buku</label>

            <input
              type="text"
              id="title"
              name="title"
              value="<?= htmlspecialchars($book['title']) ?>"
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
                value="<?= htmlspecialchars($book['isbn'] ?? '') ?>"
              >
            </div>

            <div class="form-group">
              <label for="year">Tahun Terbit</label>

              <input
                type="number"
                id="year"
                name="year"
                value="<?= htmlspecialchars($book['year']) ?>"
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
                value="<?= htmlspecialchars($book['stock']) ?>"
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

                <?php foreach ($categories as $category): ?>

                  <option
                    value="<?= htmlspecialchars($category['id']) ?>"
                    <?= ((string) $category['id'] === (string) ($book['category_id'] ?? '')) ? 'selected' : '' ?>
                  >
                    <?= htmlspecialchars($category['name']) ?>
                  </option>

                <?php endforeach; ?>

              </select>
            </div>

          </div>

          <div class="form-group">

            <label for="description">
              Deskripsi
            </label>

            <textarea
              id="description"
              name="description"
              rows="3"
            ><?= htmlspecialchars($book['description'] ?? '') ?></textarea>

          </div>

        </div>

        <div class="form-card">

          <div class="form-section-title">
            Penulis Buku
          </div>

          <div class="form-group">

            <label>
              Pilih Penulis (bisa lebih dari satu)
            </label>

            <div class="checkbox-grid">

              <?php foreach ($authors as $author): ?>

                <label class="checkbox-item">

                  <input
                    type="checkbox"
                    name="author_ids[]"
                    value="<?= htmlspecialchars($author['id']) ?>"
                    <?= in_array(
                        $author['id'],
                        $book['author_ids'] ?? []
                    ) ? 'checked' : '' ?>
                  >

                  <?= htmlspecialchars($author['name']) ?>

                </label>

              <?php endforeach; ?>

            </div>

          </div>

          <div class="form-actions">

            <a
              href="index.php"
              class="btn btn-outline"
            >
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