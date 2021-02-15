<style>
  .rating {
    margin: auto;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    /* top:-9999px; */
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:250%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Penilaian Pengiriman</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Penilaian/insert_penilaian_pengiriman/'.$kdpo.'/'.$kdsj);?>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <legend>Kriteria :</legend>
                <?php foreach($kriteria as $kr) { ?>
                  <h4 class="mt-4"><?php echo $kr->fv_nmkriteria ?></h4>
                <?php } ?>
              </div>
              <div class="col-sm-3">
                <fieldset class="rating">
                    <legend>Rating Penilaian :</legend>
                    <input type="radio" id="star5-1" name="rating1" value="5" /><label for="star5-1" title="Rocks!">5 stars</label>
                    <input type="radio" id="star4-1" name="rating1" value="4" /><label for="star4-1" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3-1" name="rating1" value="3" /><label for="star3-1" title="Meh">3 stars</label>
                    <input type="radio" id="star2-1" name="rating1" value="2" /><label for="star2-1" title="Kinda bad">2 stars</label>
                    <input type="radio" id="star1-1" name="rating1" value="1" /><label for="star1-1" title="Sucks big time">1 star</label>
                </fieldset>
                <fieldset class="rating">
                    <input type="radio" id="star5-2" name="rating2" value="5" /><label for="star5-2" title="Rocks!">5 stars</label>
                    <input type="radio" id="star4-2" name="rating2" value="4" /><label for="star4-2" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3-2" name="rating2" value="3" /><label for="star3-2" title="Meh">3 stars</label>
                    <input type="radio" id="star2-2" name="rating2" value="2" /><label for="star2-2" title="Kinda bad">2 stars</label>
                    <input type="radio" id="star1-2" name="rating2" value="1" /><label for="star1-2" title="Sucks big time">1 star</label>
                </fieldset>
                <fieldset class="rating">
                    <input type="radio" id="star5-3" name="rating3" value="5" /><label for="star5-3" title="Rocks!">5 stars</label>
                    <input type="radio" id="star4-3" name="rating3" value="4" /><label for="star4-3" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3-3" name="rating3" value="3" /><label for="star3-3" title="Meh">3 stars</label>
                    <input type="radio" id="star2-3" name="rating3" value="2" /><label for="star2-3" title="Kinda bad">2 stars</label>
                    <input type="radio" id="star1-3" name="rating3" value="1" /><label for="star1-3" title="Sucks big time">1 star</label>
                </fieldset>
                <fieldset class="rating">
                    <input type="radio" id="star5-4" name="rating4" value="5" /><label for="star5-4" title="Rocks!">5 stars</label>
                    <input type="radio" id="star4-4" name="rating4" value="4" /><label for="star4-4" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3-4" name="rating4" value="3" /><label for="star3-4" title="Meh">3 stars</label>
                    <input type="radio" id="star2-4" name="rating4" value="2" /><label for="star2-4" title="Kinda bad">2 stars</label>
                    <input type="radio" id="star1-4" name="rating4" value="1" /><label for="star1-4" title="Sucks big time">1 star</label>
                </fieldset>
                <fieldset class="rating">
                    <input type="radio" id="star5-5" name="rating5" value="5" /><label for="star5-5" title="Rocks!">5 stars</label>
                    <input type="radio" id="star4-5" name="rating5" value="4" /><label for="star4-5" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3-5" name="rating5" value="3" /><label for="star3-5" title="Meh">3 stars</label>
                    <input type="radio" id="star2-5" name="rating5" value="2" /><label for="star2-5" title="Kinda bad">2 stars</label>
                    <input type="radio" id="star1-5" name="rating5" value="1" /><label for="star1-5" title="Sucks big time">1 star</label>
                </fieldset>
              </div>
              <!-- <div class="col-sm-3">
                  <fieldset class="rating">
                      <legend>Rating KTG :</legend>
                      <input type="radio" id="star5-6" name="rating6" value="5" /><label for="star5-6" title="Rocks!">5 stars</label>
                      <input type="radio" id="star4-6" name="rating6" value="4" /><label for="star4-6" title="Pretty good">4 stars</label>
                      <input type="radio" id="star3-6" name="rating6" value="3" /><label for="star3-6" title="Meh">3 stars</label>
                      <input type="radio" id="star2-6" name="rating6" value="2" /><label for="star2-6" title="Kinda bad">2 stars</label>
                      <input type="radio" id="star1-6" name="rating6" value="1" /><label for="star1-6" title="Sucks big time">1 star</label>
                  </fieldset>
                  <fieldset class="rating">
                      <input type="radio" id="star5-7" name="rating7" value="5" /><label for="star5-7" title="Rocks!">5 stars</label>
                      <input type="radio" id="star4-7" name="rating7" value="4" /><label for="star4-7" title="Pretty good">4 stars</label>
                      <input type="radio" id="star3-7" name="rating7" value="3" /><label for="star3-7" title="Meh">3 stars</label>
                      <input type="radio" id="star2-7" name="rating7" value="2" /><label for="star2-7" title="Kinda bad">2 stars</label>
                      <input type="radio" id="star1-7" name="rating7" value="1" /><label for="star1-7" title="Sucks big time">1 star</label>
                  </fieldset>
                  <fieldset class="rating">
                      <input type="radio" id="star5-8" name="rating8" value="5" /><label for="star5-8" title="Rocks!">5 stars</label>
                      <input type="radio" id="star4-8" name="rating8" value="4" /><label for="star4-8" title="Pretty good">4 stars</label>
                      <input type="radio" id="star3-8" name="rating8" value="3" /><label for="star3-8" title="Meh">3 stars</label>
                      <input type="radio" id="star2-8" name="rating8" value="2" /><label for="star2-8" title="Kinda bad">2 stars</label>
                      <input type="radio" id="star1-8" name="rating8" value="1" /><label for="star1-8" title="Sucks big time">1 star</label>
                  </fieldset>
                  <fieldset class="rating">
                      <input type="radio" id="star5-9" name="rating9" value="5" /><label for="star5-9" title="Rocks!">5 stars</label>
                      <input type="radio" id="star4-9" name="rating9" value="4" /><label for="star4-9" title="Pretty good">4 stars</label>
                      <input type="radio" id="star3-9" name="rating9" value="3" /><label for="star3-9" title="Meh">3 stars</label>
                      <input type="radio" id="star2-9" name="rating9" value="2" /><label for="star2-9" title="Kinda bad">2 stars</label>
                      <input type="radio" id="star1-9" name="rating9" value="1" /><label for="star1-9" title="Sucks big time">1 star</label>
                  </fieldset>
                  <fieldset class="rating">
                      <input type="radio" id="star5-10" name="rating10" value="5" /><label for="star5-10" title="Rocks!">5 stars</label>
                      <input type="radio" id="star4-10" name="rating10" value="4" /><label for="star4-10" title="Pretty good">4 stars</label>
                      <input type="radio" id="star3-10" name="rating10" value="3" /><label for="star3-10" title="Meh">3 stars</label>
                      <input type="radio" id="star2-10" name="rating10" value="2" /><label for="star2-10" title="Kinda bad">2 stars</label>
                      <input type="radio" id="star1-10" name="rating10" value="1" /><label for="star1-10" title="Sucks big time">1 star</label>
                  </fieldset>
              </div> -->
              <div class="input-group col-sm-12">
                <textarea type="text" name="kritik_saran" class="form-control" placeholder="Kritik dan Saran" required></textarea>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success"> Kirim</button>
          </div>
          <!-- /.card-footer-->
        <?php echo form_close(); ?>
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->