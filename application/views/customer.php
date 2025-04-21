<?= $this->session->tempdata('customer_message'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Customer</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <b><?= date('D, d M Y'); ?></b>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end align-items-center">
            <a href="<?= base_url('customer/add_customer'); ?>" class="btn btn-dark mb-2">Add Customer</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead class="table-light">
                <th>No</th>
                <th>Nama</th>
                <th>No HP/WA</th>
                <th>Lokasi</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($customer as $data):
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><a class="btn badge fs-6 text-dark" href="https://wa.me/<?= $data['no_hp']; ?>" target="_blank"><?= $data['no_hp']; ?></a></td>
                        <td><?= $data['lokasi']; ?></td>
                        <td>
                            <a href="<?= base_url('customer/edit_customer/') . $data['id_customer']; ?>" class="btn badge text-bg-primary">edit</a>
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