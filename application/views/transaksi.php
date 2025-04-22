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
                <tr>
                    <td>1</td>
                    <td><?= date('d-m-Y'); ?></td>
                    <td>Alibi</td>
                    <td>Asgard</td>
                    <td><span class="badge text-bg-warning">Belum diambil</span></td>
                    <td>
                        <a href="#" class="btn badge text-bg-primary">edit</a>
                        <a href="#" class="btn badge text-bg-danger">hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>