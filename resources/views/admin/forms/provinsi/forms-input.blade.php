<form class="forms-sample" method="POST"
      action="{{ route('admin.forms.add-provinsi.store') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="nama_provinsi">Nama Provinsi</label>
        <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" placeholder="Nama Provinsi">
    </div>

    <div id="alertFileToLarge" class="alert alert-danger d-none" role="alert">
        Ukuran file terlalu besar, pastikan tidak lebih dari 2 MB
    </div>

    <div id="alertFormatNotSupport" class="alert alert-danger d-none" role="alert">
        Format file anda tidak mendukung
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
