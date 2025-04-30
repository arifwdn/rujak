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
            <h2>Detail Transaksi</h2>
            <b>Tanggal Transaksi : <?= indodatetime(date('Y-m-d', strtotime($transaksi[0]['tanggal']))); ?></b>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $transaksi[0]['nama']; ?></td>
                </tr>
                <tr>
                    <td>No. Hp/Wa</td>
                    <td>:</td>
                    <td><a class="text-dark text-decoration-none" href="https://wa.me/<?= $transaksi[0]['no_hp']; ?>" target="_blank" rel="noopener noreferrer"><?= $transaksi[0]['no_hp']; ?></a></td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td><?= $transaksi[0]['lokasi']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <?php if ($transaksi[0]['sudah_diambil'] === null): ?>
                            <i class="badge text-bg-warning">Belum diambil</i>
                        <?php else: ?>
                            <i class="badge text-bg-success">Sudah diambil</i>
                        <?php endif; ?>
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
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($transaksi as $data): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data['id_barang']; ?></td>
                            <td><?= $data['nama_barang']; ?></td>
                            <td><?= $data['harga']; ?></td>
                            <td><?= $data['quantity']; ?></td>
                            <td><?= $data['terjual']; ?></td>
                            <td><?= $data['sisa']; ?></td>
                            <td><?= $data['total']; ?></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
                <tr>
                    <td colspan="7">Total Pendapatan</td>
                    <td>Rp<?= $transaksi[0]['total_pendapatan']; ?>,-</td>
                </tr>
            </table>
            <hr>
            <table class="table" border="0">
                <tr>
                    <td>
                        <p>Mengetahui</p>
                        <br><br>
                        <p><?= $transaksi[0]['nama']; ?></p>
                    </td>
                    <td>
                        <p>Telah diambil pada <?= ($transaksi[0]['sudah_diambil'] !== null) ? indodatetime(date('Y-m-d H:i', strtotime($transaksi[0]['sudah_diambil']))) : ''; ?></p>
                        <br><br>
                        <p><?= ($transaksi[0]['pengambil'] !== '') ? $transaksi[0]['pengambil'] : ''; ?></p>
                    </td>
                </tr>
            </table>
            <div class="form-floating mb-3 d-flex justify-content-end">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTransaksi">Confirm Transaksi</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Transaksi -->
<div class="modal fade modal-xl" id="modalTransaksi">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('transaksi/konfirmasi_transaksi/') . $transaksi[0]['id_transaksi']; ?>" method="post" class="form-control">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Konfirmasi Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($transaksi as $data): ?>
                                <tr>
                                    <input type="hidden" name="id_detail_transaksi[]" value="<?= $data['id_detail_transaksi']; ?>">
                                    <td><?= $i; ?></td>
                                    <td><?= $data['id_barang']; ?></td>
                                    <td><?= $data['nama_barang']; ?></td>
                                    <td><?= $data['harga']; ?></td>
                                    <td><?= $data['quantity']; ?></td>
                                    <td>
                                        <input class="form-control terjual" type="number" name="terjual[]" min="0" max="<?= $data['quantity']; ?>" data-harga="<?= $data['harga']; ?>" required />
                                    </td>
                                    <td>
                                        <input class="form-control sisa" type="number" name="sisa[]" min="0" max="<?= $data['quantity']; ?>" readonly />
                                    </td>
                                    <td>
                                        <input class="form-control total" type="number" value="<?= $data['total']; ?>" name="total[]" readonly />
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                        <tr>
                            <td colspan="6">
                                <button type="button" id="hitungTotal" class="btn btn-success">Hitung Total</button>
                            </td>
                            <td>Total Pendapatan</td>
                            <td>
                                <input class="form-control" type="number" name="total_pendapatan" id="totalPendapatan" min="0" required />
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="pengambil" name="pengambil" placeholder="Nama Pengambil">
                        <label for="pengambil">Nama Pengambil</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel

                    </button>
                    <button type="submit" class="btn btn-dark">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>