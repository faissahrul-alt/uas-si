<?php

if (isset($_POST['csimpan'])) {
    $tjudul = $_POST['tjudul'];
    $tisi = $_POST['tisi'];

    $waktu = date("Y-m-d H:i:s");

    $db->insert("pengumuman", [
        'judul' => $tjudul,
        'isipengumuman' => $tisi,
        'waktu' => $waktu
    ]);

     header("location: ./?page=pengumuman");
    exit;
}
?>     


      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">PENGUMUMAN</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!--begin::Card-->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Data Pengumuman</h3>

                    <div class="card-tools">
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        aria-label="Collapse card"
                      >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        aria-label="Remove card"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a href="./?page=tambah-pengumuman" class="btn btn-primary">Tambah</a>
                    <table class="table table-striped tabel-hover">
                      <tr><th>No</th><th>Judul Pengumuman</th>
                        <th>Waktu Publikasi</th><th>Opsi</th>
                      </tr>
                      <?php
                      $data=$db->show("pengumuman");
                      $n=0;
                      foreach ($data as $d) {
                        $n++;
                    echo"<tr>
                  <td>$n</td><td>$d[judul]</td><td>2026-11-18 23:59:59</td><td> <a href='#' class ='btn btn-warning'>Edit <a href='#' class ='btn btn-danger' >Hapus </td>
                      </tr>";

                      }

                      ?>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer"></div>
                  <!-- /.card-footer -->
                </div>
                <!--end::Card-->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>