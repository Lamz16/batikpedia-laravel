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
                                <h4 class="card-title">Tambah Data Wisata</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="inputNamaWisata">Nama Wisata</label>
                                        <input type="text" class="form-control" id="inputNamaWisata" placeholder="Nama Wisata">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDetailWisata">Detail Wisata</label>
                                        <textarea class="form-control" id="inputDetailWisata" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputLat">Lat</label>
                                        <input type="text" class="form-control" id="inputLat"
                                               placeholder="Latitude">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputLon">Lon</label>
                                        <input type="text" class="form-control" id="inputLon"
                                               placeholder="Longitude">
                                    </div>

                                    <div class="form-group">
                                        <label for="imageWisata">Url Gambar Wisata</label>
                                        <input type="text" class="form-control" id="imageWisata" placeholder="Url Gambar Wisata">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputWilayah">Wilayah Wisata</label>
                                        <input type="text" class="form-control" id="inputWilayah" placeholder="Wilayah Wisata">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputIdProvinsi">Provinsi</label>
                                        <select class="form-control" id="inputIdProvinsi">
                                            <option>None</option>
                                            <option>Bali</option>
                                            <option>Jawa Timur</option>
                                        </select>
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
<!-- End custom js for this page-->
</body>

</html>
