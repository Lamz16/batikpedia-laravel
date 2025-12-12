<form class="forms-sample" method="POST"
      action="{{ route('admin.forms.add-rekomendasi.store') }}"
      enctype="multipart/form-data">

    @csrf
    <div id="alertFileToLarge" class="alert alert-danger d-none" role="alert">
        Ukuran file terlalu besar, pastikan tidak lebih dari 2 MB
    </div>

    <div id="alertFormatNotSupport" class="alert alert-danger d-none" role="alert">
        Format file anda tidak mendukung
    </div>

    <div class="form-group">
        <label>Upload Gambar Konten Rekomendasi</label>
        <input type="file" name="image" class="file-upload-default">
        <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled
                   placeholder="Upload Gambar">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link Rekomendasi</label>
        <textarea class="form-control" id="link" name="link" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mr-2" id="submitBtn">
        <span id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        <span id="submitText">Submit</span>
    </button>
    <button class="btn btn-light">Cancel</button>
</form>
