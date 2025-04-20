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
            <a href="#" class="btn btn-dark mb-2">Add Barang</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead class="table-light">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Rujak kecil</td>
                    <td>Rp10000,-</td>
                    <td>10</td>
                    <td>
                        <a href="#" class="btn badge text-bg-primary">edit</a>
                        <a href="#" class="btn badge text-bg-danger">hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>