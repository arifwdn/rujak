<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Transaksi</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <b><?= date('D, d M Y'); ?></b>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-start align-items-center">
            <a href="<?= base_url('transaksi'); ?>" class="btn btn-dark mb-2">&#8676; Cancel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?= base_url(($transaksi != []) ? 'transaksi/proses_edit_transaksi' : 'transaksi/proses_add_transaksi'); ?>" method="post" class="form-control">
                <h2>Form Transaksi</h2>
                <input type="text" class="form-control" name="id_customer" value="<?= ($transaksi != []) ? $transaksi['id_transaksi'] : ''; ?>" placeholder="Id Transaksi" hidden>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= ($transaksi != []) ? $transaksi['tanggal'] : ''; ?>" placeholder="Tanggal" required>
                    <label for="tanggal">Tanggal</label>
                </div>
                <div class="form-floating mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="id_customer" name="id_customer" aria-label="Pilih Customer" required>
                            <option selected disabled>-Pilih Customer-</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="id_customer">Customer</label>
                    </div>
                </div>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>Alibi</td>
                    </tr>
                    <tr>
                        <td>No. Hp/Wa</td>
                        <td>:</td>
                        <td><a class="text-dark text-decoration-none" href="https://wa.me/6282158292042" target="_blank" rel="noopener noreferrer">6282158292042</a></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td>Asgard</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <i class="badge text-bg-warning">Belum diambil</i>
                        </td>
                    </tr>
                </table>
                <hr>
                <table class="table">
                    <thead class="table-light">
                        <th>No</th>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Terjual</th>
                        <th>Sisa</th>
                        <th>Total</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <select name="id_barang[]" id="id_barang" required>
                                    <option selected disabled>-Pilih barang-</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </td>
                            <td>Rujak Uk.Kecil</td>
                            <td>Rp4000,-</td>
                            <td><input type="number" name="qty[]" id=""></td>
                            <td>-</td>
                            <td>-</td>
                            <td>Rp16000,-</td>
                            <td>
                                <a href="#" class="btn badge text-bg-primary">+</a>
                                <a href="#" class="btn badge text-bg-danger">-</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">Total Pendapatan</td>
                            <td>Rp16000,-</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table class="table" border="0">
                    <tr>
                        <td>
                            <p>Mengetahui</p>
                            <br><br><br>
                            <p>Customer</p>
                        </td>
                        <td>
                            <p>Telah diambil pada <?= date('D, d-M-Y'); ?></p>
                            <br><br><br>
                            <p>Pengambil</p>
                        </td>
                    </tr>
                </table>
                <div class="form-floating mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>