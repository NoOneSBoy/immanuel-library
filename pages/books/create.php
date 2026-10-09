<?php

require_once '../../repositories/book-repository.php';
require_once '../../repositories/category-repository.php';
require_once '../../repositories/author-repository.php';

$categories = getCategories();
$authors = getAuthors();

$pageTitle = 'Tambah Buku';
$pageSubtitle = 'Tambahkan buku baru ke dalam koleksi perpustakaan';

require_once '../../components/admin/topbar.php';
require_once '../../components/admin/sidebar.php';
?>

<main class="app-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Buku</h3>
                    </div>

                    <form action="../../actions/books/store.php" method="POST">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Buku</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="isbn"
                                    name="isbn"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Tahun Terbit</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="year"
                                    name="year"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="stock"
                                    name="stock"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select
                                    class="form-select"
                                    id="category_id"
                                    name="category_id"
                                    required
                                >
                                    <option value="">Pilih Kategori</option>

                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id']; ?>">
                                            <?= htmlspecialchars($category['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penulis</label>

                                <?php foreach ($authors as $author): ?>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="author_ids[]"
                                            value="<?= $author['id']; ?>"
                                            id="author_<?= $author['id']; ?>"
                                        >

                                        <label
                                            class="form-check-label"
                                            for="author_<?= $author['id']; ?>"
                                        >
                                            <?= htmlspecialchars($author['name']); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea
                                    class="form-control"
                                    id="description"
                                    name="description"
                                    rows="5"
                                    required
                                ></textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button
                                type="submit"
                                name="store"
                                class="btn btn-primary"
                            >
                                Simpan Buku
                            </button>

                            <a
                                href="index.php"
                                class="btn btn-secondary"
                            >
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>