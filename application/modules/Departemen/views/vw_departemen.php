

 <style type="text/css">
  
  td.details-control {
      background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
      cursor: pointer;
  }
  tr.shown td.details-control {
      background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
  }
 </style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Departemen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Departemen</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Departemen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?> 
                <a href="<?php echo base_url() . 'Departemen/create'; ?>" class="btn btn-primary mb-3">Tambah</a>
                <table id="example1"  class="display responsive nowrap" cellspacing="0" width="100%">
                <thead >
                    <tr>
                        <th></th>
                        <th scope="col">No</th>
                        <th scope="col">Id Departemen</th>
                        <th scope="col">Nama Departemen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($departemen as $c) : ?>
                        <tr>
                            <td scope="row"></td>    
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $c['fn_iddepartment']; ?></td>
                            <td><?php echo $c['fv_nmdepartment']; ?></td>
                            <td>
                           
                            <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Departemen/edit/<?php echo $c['fn_iddepartment'] ?>">Edit</a>    
                            <a class="btn btn-block btn-danger" href="<?php echo base_url()?>Departemen/delete/<?php echo $c['fn_iddepartment'] ?>">Hapus</a>    
                              
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<script>
  $(function () {
    $("#example1").DataTable({
        
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
