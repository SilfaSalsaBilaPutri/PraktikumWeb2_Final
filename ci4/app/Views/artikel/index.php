<?= $this->include('template/header'); ?>

<div class="container mt-4">
    <h1 class="mb-4">Daftar Artikel</h1>

    <?php if (!empty($artikel)): ?>
        <?php foreach ($artikel as $row): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title"><?= esc($row['judul']) ?></h4>
                    <small class="text-muted">
                        Kategori: <?= esc($row['nama_kategori']) ?> |
                        Tanggal: <?= date('d M Y', strtotime($row['created_at'])) ?>
                    </small>
                    <p class="card-text mt-2">
                        <?= esc(substr(strip_tags($row['isi']), 0, 200)) ?>...
                    </p>
                    <a href="<?= base_url('artikel/' . $row['slug']) ?>" class="btn btn-sm btn-primary">
                        Baca Selengkapnya
                    </a>

                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info">Belum ada artikel yang dipublikasikan.</div>
    <?php endif; ?>
</div>

<?= $this->include('template/footer'); ?>