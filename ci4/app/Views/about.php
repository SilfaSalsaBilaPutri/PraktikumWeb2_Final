<?= include 'template/header.php'; ?>

<style>
    section h2 {
        color: #e91e63;
        margin-top: 0;
        font-size: 24px;
        border-bottom: 2px solid #e91e63;
        padding-bottom: 5px;
    }

    section p {
        color: #444;
        font-size: 16px;
        line-height: 1.7;
    }

    section ul {
        padding-left: 20px;
        font-size: 16px;
        color: #444;
    }

    section ul li {
        margin-bottom: 10px;
    }

    section a {
        color: #e91e63;
        text-decoration: none;
        font-weight: bold;
    }

    section a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        section {
            padding: 20px;
        }

        section h2 {
            font-size: 20px;
        }
    }
</style>

<section>
    <h2>Tentang Website Ini</h2>
    <p>Website ini merupakan platform informasi dan pembelajaran yang dikembangkan sebagai bagian dari mata kuliah
        <strong>Pemrograman Web</strong>. Tujuan utamanya adalah menyediakan ruang bagi mahasiswa untuk belajar, berbagi
        artikel, dan
        memperluas wawasan di bidang teknologi, pendidikan, dan isu-isu menarik lainnya.
    </p>
</section>

<section>
    <h2>Apa yang Bisa Kamu Temukan?</h2>
    <ul>
        <li>📘 Artikel bermanfaat seputar dunia teknologi dan kehidupan kampus.</li>
        <li>🧠 Tips dan tutorial coding dari dasar hingga menengah.</li>
        <li>💬 Insight dari pengalaman belajar mahasiswa.</li>
        <li>📅 Informasi kegiatan dan proyek mahasiswa.</li>
    </ul>
</section>

<section>
    <h2>Kenapa Harus Kunjungi Website Ini?</h2>
    <p>Kami percaya bahwa <strong>berbagi pengetahuan adalah bentuk kontribusi terbaik</strong>. Di sini kamu bisa
        belajar
        banyak hal secara gratis dan mudah diakses kapan saja. Konten ditulis secara orisinal dan diperbarui secara
        berkala.</p>
</section>

<section>
    <h2>Hubungi Kami</h2>
    <p>Jika kamu punya kritik, saran, atau ingin berkontribusi, silakan kunjungi halaman <a
            href="<?= base_url('/contact'); ?>">kontak</a>. Kami sangat terbuka untuk kolaborasi!</p>
</section>

<?= include 'template/footer.php'; ?>