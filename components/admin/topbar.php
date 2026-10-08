<header class="topbar">
    <div class="topbar-content">
        <div>
            <h1><?= htmlspecialchars($pageTitle ?? '') ?></h1>

            <?php if (!empty($pageSubtitle)): ?>
                <p><?= htmlspecialchars($pageSubtitle) ?></p>
            <?php endif; ?>
        </div>
    </div>
</header>