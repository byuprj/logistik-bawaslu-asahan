<style>
    .judul {
    background-color: #FFD700; /* Warna latar belakang hijau */
    color: white; /* Warna teks putih */
    padding: 15px; /* Jarak dalam */
    text-align: center; /* Rata tengah */
    border-radius: 8px; /* Sudut membulat */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan */
    margin-bottom: 20px; /* Jarak bawah */
    font-family: 'Arial', sans-serif; /* Gaya font */
}

.judul h3 {
    margin: 0; /* Hilangkan margin default */
    font-size: 24px; /* Ukuran font */
    text-transform: uppercase; /* Huruf kapital semua */
    letter-spacing: 2px; /* Jarak antar huruf */
    font-weight: bold; /* Ketebalan font */
}
    
    .table_data {
        width: 100%;
        border-collapse: collapse;
    }

    .table_data th, .table_data td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .table_data th {
        background-color: #f2f2f2;
    }

    @media screen and (max-width: 768px) {
        .table_data thead {
            display: none;
        }

        .table_data tr {
            display: block;
            margin-bottom: 15px;
        }

        .table_data td {
            display: block;
            text-align: right;
            padding-left: 50%;
            position: relative;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        .table_data td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
        }

        .table_data td:last-child {
            border-bottom: 0;
        }
    }
</style>

<div class="content">
    <?php
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

    <script type="text/javascript">
        function konfirmasi() {
            var tanya = confirm("Apakah anda yakin ingin menghapus data ini?");
            return tanya ? true : false;
        }
    </script>
    <div class="judul">
        <h3>RIWAYAT PENGIRIMAN</h3>
    </div>

    <div class="tabel">
        <table class="table_data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama pengirim</th>
                    <th>No. Telepon</th>
                    <th>Nama Barang</th>
                    <th>Alamat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Diantar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $q = mysqli_query($koneksi, "SELECT * FROM tb_transaksi t LEFT JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan");
                while ($data = mysqli_fetch_assoc($q)) {
                    $no++;
                ?>
                    <tr>
                        <td data-label="No"><?php echo $no; ?></td>
                        <td data-label="Nama pengirim"><?php echo $data['nama_pelanggan']; ?></td>
                        <td data-label="No. Telepon"><?php echo $data['no_telp']; ?></td>
                        <td data-label="Nama Barang"><?php echo $data['nama_barang']; ?></td>
                        <td data-label="Alamat"><?php echo $data['alamat_brg']; ?></td>
                        <td data-label="Jumlah"><?php echo $data['jumlah']; ?></td>
                        <td data-label="Tanggal Diantar"><?php echo $data['tanggal_ambil']; ?></td>
                        <td data-label="Opsi">
                            <a href="?menu=transaksi/edittransaksi&id_transaksi=<?php echo $data['id_transaksi']; ?>&opsi=edit" class="opsi"><i class="la la-edit"></i></a>
                            <a href="?menu=transaksi/inputtransaksi&id_transaksi=<?php echo $data['id_transaksi']; ?>&opsi=hapus" onclick="return konfirmasi();" class="opsi"><i class="la la-trash-alt"></i></a>
                            <a href="transaksi/cetaktransaksi.php?id_transaksi=<?php echo $data['id_transaksi']; ?>" class="opsi" target="_blank"><i class="la la-print"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

