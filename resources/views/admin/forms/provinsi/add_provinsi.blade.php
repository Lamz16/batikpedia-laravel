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
                                        </div>
                                    @endif

                                  @include('admin.forms.provinsi.forms-input')
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

    @include('admin.forms.foot')
    @include('admin.forms.provinsi.animation-alert-succes')

    <!-- End custom js for this page-->
    </body>

    </html>
