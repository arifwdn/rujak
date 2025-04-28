<?= $this->session->tempdata('transaksi_message'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Transaksi</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <b><?= indodatetime(date('Y-m-d')); ?></b>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end align-items-center">
            <a href="<?= base_url('transaksi/add_transaksi') ?>" class="btn btn-dark mb-2">Add Transaksi</a>
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
                foreach ($transaksi as $data): ?>
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
                            <a href="#" class="btn badge text-bg-primary">detail</a>
                            <a href="#" class="btn badge text-bg-danger">hapus</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>