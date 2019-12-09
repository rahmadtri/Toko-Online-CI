<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>
    <?php foreach ($barang as $brg) : ?>
        <form method="post" action="<?= base_url('admin/data_barang/update') ?>">

            <input type="hidden" name="id_brg" class="form-control" value="<?= $brg->id_brg ?>">

            <div class="form-group">
                <label for="">NAMA BARANG</label>
                <input type="text" name="nama_brg" class="form-control" value="<?= $brg->nama_brg ?>">
            </div>
            <div class="form-group">
                <label for="">KETERANGAN</label>
                <input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan ?>">
            </div>
            <div class="form-group">
                <label for="">KATEGORI</label>
                <select class="form-control" name="kategori">
                    <option value="elektronik">Elektronik</option>
                    <option value="pakaian pria">Pakaian Pria</option>
                    <option value="kecantikan">Kecantikan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">HARGA</label>
                <input type="text" name="harga" class="form-control" value="<?= $brg->harga ?>">
            </div>
            <div class="form-group">
                <label for="">STOK</label>
                <input type="text" name="stok" class="form-control" value="<?= $brg->stok ?>">
            </div>
            <button class="btn btn-dark" type="submit">UPDATE</button>
        </form>
    <?php endforeach; ?>
</div>