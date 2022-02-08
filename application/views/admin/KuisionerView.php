<?= content_open('Form Keluarga Sejahtera') ?>
<?php
// menampilkan error validasi
if ($this->session->flashdata('error_validation')) {
    foreach ($this->session->flashdata('error_validation') as $key => $value) {
        echo '<div class="alert alert-danger">' . $value . '</div>';
    }
}
?>
<form method="post" action="<?= site_url($url . '/simpan') ?>" enctype="multipart/form-data">


    <label for="penduduk">Nama Penduduk</label>
    <select name="penduduk[]">

        <?php foreach ($penduduk as $l) : ?>
            <option value="<?= $l['id_penduduk']; ?>"><?= $l['n_nama']; ?></option>
        <?php endforeach; ?>
    </select>


    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th class="text-center" width="50px">No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pada umumnya anggota keluarga makan dua kali sehari atau lebih
                    <input type="hidden" name="id_pertanyaan[]" value="Pada umumnya anggota keluarga makan dua kali sehari atau lebih">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Anggota keluarga memiliki pakaian yang berbeda untuk dirumah/bekerja/sekolah dan berpergian
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Rumah yang ditempati keluarga mempunyai atap, lantai dan dinding yang baik
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bila ada anggota keluarga sakit dibawa ke sarana kesehatan
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Bila pasangan usia subur ingin berKB pergi ke sarana kesehatan
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Semua anak umur 7-15 tahun dalam keluarga bersekolah
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Pada umumnya anggota keluarga melaksanakan ibadah sesuai dengan agama dan kepercayaan masing-masing
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Paling kurang sekali seminggu seluruh anggota keluarga makan daging/ikan/telur
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Seluruh anggota keluarga memperoleh/paling kurang satu setel pakaian baru dalam setahun
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Luas lantai rumah paling kurang 8 M² untuk setiap penghuni rumah
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Tiga bulan terakhir keluarga dalam keadaan sehat sehingga dapat melaksanakan tugas /fungsi masing-masing
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
            <tr>
                <td>12</td>
                <td>Ada seorang atau lebih anggota keluarga yang bekerja untuk memperoleh penghasilan
                    <input type="hidden" name="id_pertanyaan[]" value="Lebih 2">
                </td>
                <td><select name="jawaban[]">

                        <?php foreach ($jawab as $jaw) : ?>
                            <option value="<?= $jaw; ?>"><?= $jaw; ?></option>
                        <?php endforeach; ?>
                    </select></td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <a href="<?php echo base_url(); ?>/"><button class="btn btn-primary">Kembali</button></a>
    </div>
</form>


</div>


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>/assetsh/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assetsh/bootstrap/usebootstrap.js"></script>
</body>

</html>