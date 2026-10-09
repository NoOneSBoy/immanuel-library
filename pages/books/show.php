
<?php

require_once __DIR__ . '/../../repositories/book-repository.php';

$book = getBook();

if ($book === null) {
    http_response_code(404);
    $pageTitle = 'Buku Tidak Ditemukan';
    $pageSubtitle = 'Data buku tidak tersedia';
} else {
    $pageTitle = 'Detail Buku';
    $pageSubtitle = 'Informasi lengkap buku beserta kategori dan penulis';
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - Perpustakaan Digital</title>
    <link rel="stylesheet" href="../../styles/books/show.css">
</head>

<body>

<div class="app-shell">

    <?php require_once __DIR__ . '/../../components/admin/sidebar.php'; ?>

    <main class="app-main">

        <?php require_once __DIR__ . '/../../components/admin/topbar.php'; ?>

        <div class="app-content">

            <?php if ($book === null): ?>

                <div class="detail-card">
                    <h1>Buku Tidak Ditemukan</h1>
                    <p>Maaf, data buku tidak tersedia.</p>
                    <a href="index.php" class="btn btn-outline">Kembali</a>
                </div>

            <?php else: ?>

                <div class="detail-grid">

                    <div class="detail-cover">
                        <svg
                            class="icon"
                            width="40"
                            height="40"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                        </svg>
                    </div>

                    <div class="detail-card">

                        <h1><?= htmlspecialchars($book['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>

                        <p class="detail-meta">
                            ISBN: <?= htmlspecialchars($book['isbn'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            &middot;
                            Terbit <?= htmlspecialchars((string) ($book['year'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <div class="detail-row">
                            <div class="detail-label">Kategori</div>
                            <div class="detail-value">
                                <span class="badge badge-muted">
                                    <?= htmlspecialchars($book['category'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-label">Penulis</div>
                            <div class="detail-value">
                                <div class="chip-list">
                                    <?php foreach (($book['authors'] ?? []) as $author): ?>
                                        <span class="chip">
                                            <?= htmlspecialchars($author, ENT_QUOTES, 'UTF-8'); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-label">Stok Tersedia</div>
                            <div class="detail-value">
                                <?= htmlspecialchars((string) ($book['stock'] ?? 0), ENT_QUOTES, 'UTF-8'); ?>
                                eksemplar
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-label">Deskripsi</div>
                            <div class="detail-value">
                                <?= htmlspecialchars($book['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        </div>

                        <div class="form-actions" style="border-top:none; padding-top:6px;">
                            <a href="index.php" class="btn btn-outline">Kembali</a>
                            <a
                                href="edit.php?id=<?= urlencode((string) $book['id']); ?>"
                                class="btn btn-primary"
                            >
                                Edit Buku
                            </a>
                        </div>

                    </div>
                </div>

            <?php endif; ?>

        </div>
    </main>
</div>

</body>
</html>