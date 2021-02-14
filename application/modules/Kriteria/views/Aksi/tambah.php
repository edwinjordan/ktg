<form action="<?= base_url() .'Kriteria/save'; ?>" method="post">
    <div class="container">
        <div class="col py-4">
            <div class="mb-3 row">
                <label for="namKriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namKriteria" name="nmKriteria">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="mb-3 row">
                <label for="PParam" class="col-sm-2 col-form-label">Param</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="PParam" name="param">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mx-2">Tambah</button>
        <a href="<?php echo base_url().'kriteria'; ?>" type="reset" class="btn btn-danger px-4" data-dismiss="modal">Kembali</a>
    </div>
</form>