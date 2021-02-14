<?php foreach ($kriteria as $k) { ?>
    <form action="<?php echo base_url() . 'kriteria/update/' . $k['fn_idkriteria']; ?>" method="post">
        <div class="container">
            <div class="col my-4">
                <div class="mb-3 row">
                    <label for="nmKriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nmKriteria" name="nmKriteria" value="<?php echo $k['fv_nmkriteria'] ?>">
                    </div>
                </div>
            </div>
            <div class="col my-4">
                <div class="mb-3 row">
                    <label for="param" class="col-sm-2 col-form-label">Param</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="param" name="param" value="<?php echo $k['fc_param'] ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mx-2">Ubah</button>
            <a href="<?php echo base_url() .'kriteria' ?>" type="reset" class="btn btn-danger px-4" data-dismiss="modal">Kembali</a>
        </div>
    </form>
<?php } ?>