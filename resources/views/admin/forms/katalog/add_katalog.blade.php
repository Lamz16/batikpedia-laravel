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
                                <h4 class="card-title">Tambah Data Katalog Batik</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="inputNamaBatik">Nama Batik</label>
                                        <input type="text" class="form-control" id="inputNamaBatik"
                                               placeholder="Nama Batik">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDetailBatik">Detail Batik</label>
                                        <textarea class="form-control" id="inputDetailBatik" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSejarahBatik">Sejarah Batik</label>
                                        <textarea class="form-control" id="inputSejarahBatik" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputMaknaBatik">Makna Batik</label>
                                        <textarea class="form-control" id="inputMaknaBatik" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload Gambar Batik</label>
                                        <input type="file" name="img[]" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Gambar">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>
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
                                        <label for="inputJenisBatik">Jenis Batik</label>
                                        <select class="form-control" id="inputJenisBatik">
                                            <option>None</option>
                                            <option>Tradisional</option>
                                            <option>Modern</option>
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
