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
        <div class="col-md-12 d-flex justify-content-start align-items-center">
            <a href="<?= base_url('barang'); ?>" class="btn btn-dark mb-2">&#8676; Cancel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?= base_url('barang/proses_add_barang'); ?>" method="post" class="form-control">
                <h2>Form Barang</h2>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                    <label for="nama_barang">Nama Barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                    <label for="harga">Harga</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required>
                    <label for="stok">Stok</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan Barang" required>
                    <label for="satuan">Satuan Barang</label>
                </div>
                <div class="form-floating mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>