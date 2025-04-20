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
            <a href="#" class="btn btn-dark mb-2">Add Customer</a>
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
                <tr>
                    <td>1</td>
                    <td>Fulanah</td>
                    <td><a class="btn badge fs-6 text-dark" href="https://wa.me/6282158292042" target="_blank">6282158292042</a></td>
                    <td>Warung Biru, depan bundaran Angsau</td>
                    <td>
                        <a href="#" class="btn badge text-bg-primary">edit</a>
                        <a href="#" class="btn badge text-bg-danger">hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>