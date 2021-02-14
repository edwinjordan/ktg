<h2 class="pt-3">MASTER KRITERIA</h2>
<hr>
<a href="Kriteria/create" class="btn btn-primary">Tambahkan</a>
<table class="table table-hover mt-2">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Param</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kriteria as $k) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $k['fv_nmkriteria']; ?></td>
                <td><?= $k['fc_param']; ?></td>
                <td>
                    <a href="<?php echo base_url().'ubah/'.$k['fn_idkriteria']; ?>">
                        <div class="btn btn-warning"><i class="fa fa-edit"></i></div>
                    </a>
                    <form action="<?= base_url().'delete/'.$k['fn_idkriteria']; ?>" class="d-inline" onclick="return confirm('Apakah Anda Yakin?')">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            <?php endforeach; ?>
            </tr>
    </tbody>
</table>