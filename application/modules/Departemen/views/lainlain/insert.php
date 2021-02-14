<div class="container">
    <div class="row">
        <div class="col">
            <form action="<?= base_url() . 'departemen/save'; ?> " method="post">
                <div class="mb-3">
                    <label for="Nama_Departemen" class="form-label">Nama Departemen</label>
                    <input type="text" class="form-control" id="Nama_Departemen" name="Nama_Departemen">
                </div>
                <button type="submit" class="btn btn-primary">Selesai!</button>
            </form>
        </div>
    </div>
</div>