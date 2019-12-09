<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "Total Belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.');

                    ?>
                </div> <br><br>
                <h3>Input Alamat Pengiriman dan pembayaran</h3>
                <form action="<?= base_url('dashboard/proses_pesanan') ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No Handphone</label>
                        <input type="text" name="no_hp" placeholder="No Handphone Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jasa Pengiriman</label>
                        <select name="pengiriman" id="" class="form-control">
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">PILIH BANK</label>
                        <select name="bank" id="" class="form-control">
                            <option value="bri">BRI - XXXXXXXX</option>
                            <option value="bni">BNI - XXXXXXXX</option>
                            <option value="bca">BCA - XXXXXXXX</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">PESAN</button>
                </form>
            <?php
            } else {
                echo 'keranjang belanja anda masih kosong';
            }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>