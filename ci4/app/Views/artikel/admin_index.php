<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="row mb-3">
    <div class="col-md-6">
        <form id="search-form" class="form-inline">
            <input type="text" name="q" id="search-box" value="<?= esc($q); ?>" placeholder="Cari judul artikel"
                class="form-control mr-2">

            <select name="kategori_id" id="category-filter" class="form-control mr-2">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= esc($k['nama_kategori']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
</div>

<!-- ✅ Indikator Loading -->
<div id="loading" style="display: none; font-style: italic;">Sedang mengambil data...</div>

<!-- ✅ Kontainer Data & Pagination -->
<div id="article-container"></div>
<div id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        const articleContainer = $('#article-container');
        const paginationContainer = $('#pagination-container');
        const searchForm = $('#search-form');
        const searchBox = $('#search-box');
        const categoryFilter = $('#category-filter');
        const loadingIndicator = $('#loading');

        const fetchData = (url) => {
            loadingIndicator.show();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function (data) {
                    renderArticles(data.artikel);
                    renderPagination(data.pager, data.q, data.kategori_id);
                },
                error: function () {
                    articleContainer.html('<div class="alert alert-danger">❌ Gagal memuat data dari server.</div>');
                    paginationContainer.html('');
                },
                complete: function () {
                    loadingIndicator.hide();
                }
            });
        };

        const renderArticles = (articles) => {
            let html = `
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th><a href="#" class="sort-link" data-sort="id">ID</a></th>
                <th><a href="#" class="sort-link" data-sort="judul">Judul</a></th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
`;


            if (articles.length > 0) {
                articles.forEach(article => {
                    html += `
                        <tr>
                            <td>${article.id}</td>
                            <td>
                                <b>${article.judul}</b>
                                <p><small>${article.isi.substring(0, 50)}...</small></p>
                            </td>
                            <td>${article.nama_kategori}</td>
                            <td>${article.status}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="/admin/artikel/edit/${article.id}">Ubah</a>
                                <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?');" href="/admin/artikel/delete/${article.id}">Hapus</a>
                            </td>
                        </tr>
                    `;
                });
            } else {
                html += '<tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>';
            }

            html += '</tbody></table>';
            articleContainer.html(html);
        };

        const renderPagination = (pager, q, kategori_id) => {
            let html = '<nav><ul class="pagination">';

            pager.links.forEach(link => {
                const url = link.url ? `${link.url}&q=${q}&kategori_id=${kategori_id}` : '#';
                html += `
                    <li class="page-item ${link.active ? 'active' : ''}">
                        <a class="page-link" href="${url}">${link.title}</a>
                    </li>
                `;
            });

            html += '</ul></nav>';
            paginationContainer.html(html);
        };

        // Event: Submit cari
        searchForm.on('submit', function (e) {
            e.preventDefault();
            const q = searchBox.val();
            const kategori_id = categoryFilter.val();
            fetchData(`/admin/artikel?q=${q}&kategori_id=${kategori_id}`);
        });

        // Event: Ganti kategori
        categoryFilter.on('change', function () {
            searchForm.trigger('submit');
        });

        // Load pertama
        fetchData('/admin/artikel');
    });
</script>

<?= $this->include('template/admin_footer'); ?>