<?= $this->include('template/header'); ?>

<article class="entry">
    <h2><?= esc($artikel['judul']); ?></h2>

    <?php if (!empty($artikel['gambar'])): ?>
        <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="<?= esc($artikel['judul']); ?>"
            style="max-width:100%; height:auto; margin-bottom: 20px;">
    <?php endif; ?>

    <p><?= esc($artikel['isi']); ?></p>
</article>

<?= $this->include('template/footer'); ?>