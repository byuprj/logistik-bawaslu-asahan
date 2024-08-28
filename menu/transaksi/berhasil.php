<div class="content">
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "berhasil") {
            echo "<div class='alert alert-info'>Transaksi berhasil dibuat!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                </div>";
        }
    }
    error_reporting(0);
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "edit") {
            echo "<div class='alert alert-info'>Data berhasil di edit!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                </div>";
        } else if ($pesan == "hapus") {
            echo "<div class='alert alert-info'>Data berhasil di hapus!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                </div>";
        }
    }
    ?>

    <div>
        <table class="mt-5" width="100%">
            <tr>
                <td><h5>Detail Transaksi</h5></td>
            </tr>
        </table>
        <br>
        
        <table class="table" width="100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama pengirim</td>
                    <td>Nama Barang</td>
                    <td>Jumlah</td>
                    <td>Tanggal Diantar</td>
                    <td>opsi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_terakhir = "";
                $query = mysqli_query($koneksi, "
                    SELECT tb_transaksi.*, tb_pelanggan.nama_pelanggan 
                    FROM tb_transaksi 
                    JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan 
                    ORDER BY tb_transaksi.id_transaksi DESC LIMIT 1
                ");
                
                $no = 1;

                if ($d = mysqli_fetch_assoc($query)) {
                    $id_terakhir = $d['id_transaksi'];
                    $data = $d;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_pelanggan']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><?php echo $data['jumlah']; ?></td>
                        <td><?php echo $data['tanggal_ambil']; ?></td>
                        <td> <a href="?menu=transaksi/edittransaksi&id_transaksi=<?php echo $data['id_transaksi']; ?>&opsi=edit" class="opsi"><i class="la la-edit"></i></a>
                        <a href="?menu=transaksi/inputtransaksi&id_transaksi=<?php echo $data['id_transaksi']; ?>&opsi=hapus" onclick="return konfirmasi();" class="opsi"><i class="la la-trash-alt"></i></a></td>
                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data transaksi.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php if ($id_terakhir != ""): ?>
            <a href="transaksi/cetaktransaksi.php?id_transaksi=<?php echo $id_terakhir; ?>" target="_blank" class="button btn-blue mr-3">Cetak Transaksi</a>
        <?php endif; ?>
        <button class="button btn-grey" onclick="document.location.href='?menu=home/beranda1'"><i class="la la-angle-left"></i> Kembali</button>
    </div>
</div>
