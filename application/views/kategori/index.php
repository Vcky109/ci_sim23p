<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Daftar Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-tittle">List Kategori</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                        <i class="fas fa-minus"></i>
                        <button type="button" class="btn btn-tool" data_add data-card-widget="collapse" data-toggle="tooltip" tittle="Remove">
                            <i class="fas fa-minus"></i>
                        </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            <div class="card-body">
                <a href="<?= base_url('kategori/tambah'); ?>" class="btn btn-primary mb-3">Tambah Kategori</a>
                <?php if (!empty($kategori)): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $b): ?>
                                <tr>
                                    <td><?= $b['kategori'];?></td>
                                    <td>
                                        <a href="<?= base_url('kategori/edit/'. $b['idkategori']);?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="<?= base_url('kategori/hapus/'. $b['idkategori']);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus berita ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p> Tidak Ada Kategori yang tersedia</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
