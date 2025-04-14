<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Transaksi hari ini</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <b><?= date('D, d M Y'); ?></b>
        </div>
        <hr />
    </div>
    <div class="row">
        <table class="table">
            <thead class="table-light">
                <th>No</th>
                <th>Nama Customer</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
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
    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Transaksi</div>
                <div class="card-body">
                    <h1 class="card-title">0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Belum diambil (hari ini)</div>
                <div class="card-body">
                    <h1 class="card-title">0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Sudah diambil (hari ini)</div>
                <div class="card-body">
                    <h1 class="card-title">0</h1>
                </div>
            </div>
        </div>
    </div>
</div>