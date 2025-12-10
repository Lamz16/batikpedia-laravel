<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('build/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('build/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('build/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('build/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      @include('admin.components.topbar')

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
        @include('admin.components.theme-setting')
      <!-- partial:partials/_sidebar.html -->
        @include('admin.components.navbar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                        <th class="ml-5">ID</th>
                        <th>Nama Batik</th>
                        <th>Customer</th>
                        <th>Deadline</th>
                        <th>Payouts	</th>
                        <th>Traffic</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>#D1</td>
                        <td>Consectetur adipisicing elit </td>
                        <td>Beulah Cummings</td>
                        <td>03 Jan 2019</td>
                        <td>$ 5235</td>
                        <td>1.3K</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              Edit
                              <i class="typcn typcn-edit btn-icon-append"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              Delete
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

            </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 All rights reserved.</span>
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
  <script src="{{asset('build/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('build/vendors/chart.js/Chart.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('build/js/off-canvas.js')}}"></script>
  <script src="{{asset('build/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('build/js/template.js')}}"></script>
  <script src="{{asset('build/js/settings.js')}}"></script>
  <script src="{{asset('build/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('build/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>

