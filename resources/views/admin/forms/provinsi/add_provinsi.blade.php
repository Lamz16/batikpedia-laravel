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
                                    <h4 class="card-title">Tambah Data Provinsi</h4>

                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                        <script>
                                            setTimeout(() => {
                                                const alert = document.getElementById('successAlert');
                                                if(alert){
                                                    const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                                                    bsAlert.close();
                                                }
                                            }, 3000);
                                        </script>
                                    @endif

                                    <form class="forms-sample" method="POST"
                                          action="{{ route('admin.forms.add-provinsi.store') }}"
                                          enctype="multipart/form-data">

                                        @csrf

                                        <div class="form-group">
                                            <label for="nama_provinsi">Nama Provinsi</label>
                                            <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" placeholder="Nama Provinsi">
                                        </div>

                                        <div class="form-group">
                                            <label>Upload Gambar Provinsi</label>
                                            <input type="file" name="img_provinsi" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                       placeholder="Upload Gambar">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="detail_provinsi">Detail Provinsi</label>
                                            <textarea class="form-control" id="detail_provinsi" name="detail_provinsi" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2" id="submitBtn">
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="submitSpinner"></span>
                                            <span id="submitText">Submit</span>
                                        </button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a
                                        href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free <a
                                        href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap dashboard</a> templates from Bootstrapdash.com</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
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
