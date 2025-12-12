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

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                         id="successAlert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @include('admin.forms.wisata.forms-input')

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

@include('admin.forms.foot')
@include('admin.forms.partial.animation-alert-succes')
@include('admin.forms.partial.image-size-validation')
</body>

</html>
