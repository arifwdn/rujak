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
        <div class="col-md-12 d-flex justify-content-start align-items-center">
            <a href="<?= base_url('customer'); ?>" class="btn btn-dark mb-2">&#8676; Cancel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?= base_url(($customer != []) ? 'customer/proses_edit_customer' : 'customer/proses_add_customer'); ?>" method="post" class="form-control">
                <h2>Form Customer</h2>
                <input type="text" class="form-control" name="id_customer" value="<?= ($customer != []) ? $customer['id_customer'] : ''; ?>" placeholder="Id Customer" hidden>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= ($customer != []) ? $customer['nama'] : ''; ?>" placeholder="Nama Customer" required>
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= ($customer != []) ? $customer['no_hp'] : ''; ?>" placeholder="Nomor Handphon/WA" required>
                    <label for="no_hp">Nomor Handphon/WA</label>
                    <i>Cth.6285212345678</i>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="lokasi" name="lokasi" placeholder="Alamat Customer" required style="height: 100px; resize:none;"><?= ($customer != []) ? $customer['lokasi'] : ''; ?></textarea>
                    <label for="nama">Lokasi</label>
                </div>
                <div class="form-floating mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>