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
                            <?php foreach ($customer as $data): ?>
                                <option value="<?= $data['id_customer'] ?>" data-hp="<?= $data['no_hp']; ?>" data-lokasi="<?= $data['lokasi']; ?>">
                                    <?= $data['nama'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="id_customer">Customer</label>
                    </div>
                </div>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td id="namaCustomer">unknown</td>
                    </tr>
                    <tr>
                        <td>No. Hp/Wa</td>
                        <td>:</td>
                        <td><a id="noHpCustomer" class="text-dark text-decoration-none" href="https://wa.me/62" target="_blank" rel="noopener noreferrer">unknown</a></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td id="lokasiCustomer">unknown</td>
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
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-floating mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="pilihBarang" aria-label="Pilih Barang">
                                    <option selected disabled>-Pilih Barang-</option>
                                    <?php foreach ($barang as $data): ?>
                                        <option value="<?= $data['id_barang'] ?>" data-harga="<?= $data['harga']; ?>" data-stok="<?= $data['stok']; ?>">
                                            <?= $data['nama_barang'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="pilihBarang">Barang</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" id="btnAddBarang">+ Add Barang</button>
                    </div>
                </div>
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
                        <th>Delete</th>
                    </thead>
                    <tbody id="containerBarang">

                    </tbody>
                    <tr>
                        <td colspan="7">Total Pendapatan</td>
                        <td>Rp<input type="number" id="totalPendapatan" name="total_pendapatan" value="0" style="border: none; width: 100px;" readonly />,-</td>
                    </tr>
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
                            <p>Telah diambil pada <?= indodatetime(date('Y-m-d')); ?></p>
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