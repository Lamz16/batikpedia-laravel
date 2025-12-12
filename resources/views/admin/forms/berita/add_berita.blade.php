<!DOCTYPE html>
<html lang="en">


@include('admin.forms.head')
<body>
<div class="container-scroller">
    <!-- top bar-->
    @include('admin.components.topbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.components.theme-setting')
        <!-- partial:../../partials/_sidebar.html -->
        @include('admin.components.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Data Berita</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="inputNamaBerita">Nama Berita</label>
                                        <input type="text" class="form-control" id="inputNamaBerita" placeholder="Nama Berita">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputTanggalBerita">Tanggal Berita</label>
                                        <input type="datetime-local" class="form-control" id="inputTanggalBerita" placeholder="Tanggal Berita">
                                        <input type="hidden" name="tgl_berita" id="tglBeritaHidden">
                                    </div>

                                    <div class="form-group">
                                        <label for="lokasiBerita">Lokasi Berita</label>
                                        <input type="text" class="form-control" id="lokasiBerita" placeholder="Lokasi Berita">
                                    </div>

                                    <div class="form-group">
                                        <label for="urlBerita">Url Berita</label>
                                        <input type="text" class="form-control" id="urlBerita" placeholder="Url Berita">
                                    </div>

                                    <div class="form-group">
                                        <label for="urlImgBerita">Gambar Berita</label>
                                        <input type="text" class="form-control" id="urlImgBerita" placeholder="Url Gambar Berita">
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
@include('admin.forms.foot')
<script src="{{asset('build/js/date-picker.js')}}"></script>
<!-- End custom js for this page-->
</body>

</html>
