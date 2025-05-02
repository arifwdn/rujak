<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Transaksi hari ini</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <b><?= indodatetime(date('Y-m-d')); ?></b>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end align-items-center">
            <a href="<?= base_url('transaksi/add_transaksi'); ?>" class="btn btn-dark mb-2">Add Transaksi</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead class="table-light">
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Customer</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($transaksi['transaksi'] as $data): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= indodatetime(date('Y-m-d', strtotime($data['tanggal']))); ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['lokasi']; ?></td>
                        <td>
                            <?php if ($data['sudah_diambil'] == null): ?>
                                <span class="badge text-bg-warning">Belum diambil</span>
                            <?php else: ?>
                                <span class="badge text-bg-success">Sudah diambil</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('transaksi/detail_transaksi/') . $data['id_transaksi']; ?>" class="btn badge text-bg-primary">detail</a>
                            <a href="<?= base_url('transaksi/delete_transaksi/') . $data['id_transaksi']; ?>" class="btn badge text-bg-danger">hapus</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Transaksi</div>
                <div class="card-body">
                    <h1 class="card-title"><?= $transaksi['total_transaksi']; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Belum diambil (hari ini)</div>
                <div class="card-body">
                    <h1 class="card-title"><?= $transaksi['total_belum_diambil']; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Sudah diambil (hari ini)</div>
                <div class="card-body">
                    <h1 class="card-title"><?= $transaksi['total_sudah_diambil']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>