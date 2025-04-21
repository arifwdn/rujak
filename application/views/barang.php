<?= $this->session->tempdata('barang_message'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Barang</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <b><?= date('D, d M Y'); ?></b>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end align-items-center">
            <a href="<?= base_url('barang/add_barang'); ?>" class="btn btn-dark mb-2">Add Barang</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead class="table-light">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($barang as $data): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['nama_barang']; ?></td>
                        <td>Rp<?= $data['harga']; ?>,-</td>
                        <td><?= $data['stok']; ?></td>
                        <td><?= $data['satuan']; ?></td>
                        <td>
                            <a href="<?= base_url('barang/edit_barang/') . $data['id_barang']; ?>" class="btn badge text-bg-primary">edit</a>
                            <a href="<?= base_url('barang/hapus_barang/') . $data['id_barang']; ?>" class="btn badge text-bg-danger">hapus</a>
                        </td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>