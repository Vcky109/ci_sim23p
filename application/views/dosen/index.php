<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Dosen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Dosen</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Dosen</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= base_url('dosen/tambah'); ?>" class="btn btn-primary mb-3">Tambah Dosen</a>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <form method="GET" action="<?= base_url('dosen'); ?>">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama dosen..." value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <form method="GET" action="<?= base_url('dosen'); ?>">
                            <label for="records_per_page">Tampilkan</label>
                            <select name="records_per_page" onchange="this.form.submit()">
                                <option value="5" <?= isset($_GET['records_per_page']) && $_GET['records_per_page'] == 5 ? 'selected' : ''; ?>>5</option>
                                <option value="10" <?= isset($_GET['records_per_page']) && $_GET['records_per_page'] == 10 ? 'selected' : ''; ?>>10</option>
                                <option value="20" <?= isset($_GET['records_per_page']) && $_GET['records_per_page'] == 20 ? 'selected' : ''; ?>>20</option>
                            </select>
                            <span>record per page</span>
                        </form>
                    </div>
                </div>

                <?php if (!empty($dosen)): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = $offset + 1;
                                foreach ($dosen as $d): 
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($d['id']); ?></td>
                                    <td><?= htmlspecialchars($d['nama']); ?></td>
                                    <td><?= htmlspecialchars($d['alamat']); ?></td>
                                    <td><?= htmlspecialchars($d['jenis_kelamin']); ?></td>
                                    <td><?= htmlspecialchars($d['email']); ?></td>
                                    <td><?= htmlspecialchars($d['telp']); ?></td>
                                    <td>
                                        <a href="<?= base_url('dosen/edit/'. $d['id']); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('dosen/hapus/'. $d['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        <?= $pagination; ?>
                    </div>

                <?php else: ?>
                    <p class="text-muted">Tidak ada data dosen yang tersedia.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
</div>
