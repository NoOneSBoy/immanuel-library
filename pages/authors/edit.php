<?php

require_once __DIR__ . '/../../repositories/author-repository.php';

$id = $_GET['id'] ?? 1;

$author = getAuthor($id);

if ($author === null) {
    echo 'Penulis tidak ditemukan.';
    exit;
}

$pageTitle = 'Edit Penulis';
$pageSubtitle = 'Perbarui data penulis yang terdaftar di sistem';

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Edit Penulis - Perpustakaan Digital</title>

  <link rel="stylesheet" href="../../styles/authors/create.css">
</head>

<body>

  <div class="app-shell">

    <?php require_once __DIR__ . '/../../components/admin/sidebar.php'; ?>

    <main class="app-main">

      <?php require_once __DIR__ . '/../../components/admin/topbar.php'; ?>

      <div class="app-content">

        <form
          method="post"
          action="../../actions/authors/update.php"
        >

          <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($author['id']) ?>"
          >

          <div class="form-card">

            <div class="form-section-title">
              Data Penulis
            </div>

            <div class="form-group">

              <label for="name">
                Nama Penulis
              </label>

              <input
                type="text"
                id="name"
                name="name"
                value="<?= htmlspecialchars($author['name']) ?>"
                placeholder="Contoh: Tere Liye"
              >

            </div>

            <div class="form-group">

              <label for="bio">
                Biografi Singkat
              </label>

              <textarea
                id="bio"
                name="bio"
                rows="3"
                placeholder="Biografi singkat penulis"
              ><?= htmlspecialchars($author['bio']) ?></textarea>

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