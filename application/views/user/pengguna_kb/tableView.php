<?= content_open($title) ?>
<hr>
<?= $this->session->flashdata('info') ?>
<table class="table table-bordered table-responsive" id="example">
    <thead>
        <tr>
            <th class="text-center" width="50px">No</th>
            <th>Nomor KK</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jenis KB</th>
            <th width="200px">Jenis RT</th>

        </tr>

        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($datatable->result() as $row) {
        ?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td><?= $row->nomor_kk ?></td>
                <td><?= $row->nik ?></td>
                <td><?= $row->n_nama ?></td>
                <td><?= $row->jenis_kelamin ?></td>
                <td><?= $row->tanggal_lahir ?></td>
                <td><?= $row->n_nama_kb ?></td>
                <td><?= $row->n_rt_rw ?></td>

            </tr>
        <?php
            $no++;
        }

        ?>
    </tbody>
</table>

<?= content_close() ?>