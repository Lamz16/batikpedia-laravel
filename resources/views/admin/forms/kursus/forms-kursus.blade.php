<form class="forms-sample" method="POST"
      action="{{ route('admin.forms.add-kursus') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="inputNama">Nama Kursus</label>
        <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" placeholder="Nama Kursus">
    </div>

    <div id="alertFileToLarge" class="alert alert-danger d-none" role="alert">
        Ukuran file terlalu besar, pastikan tidak lebih dari 2 MB
    </div>

    <div id="alertFormatNotSupport" class="alert alert-danger d-none" role="alert">
        Format file anda tidak mendukung
    </div>

    <div class="form-group">
        <label>Upload Gambar Kursus</label>
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
        <label for="inputHarga">Harga Kursus</label>
        <input type="text" class="form-control" id="harga_kursus_display" placeholder="Input biaya">
        <input type="hidden" name="harga" id="harga_kursus">
    </div>

    <div class="form-group">
        <label for="inputDeskripsi">Detail Kursus</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="inputUrl">Url Kursus</label>
        <input type="text" class="form-control" id="url_kursus" name="url_kursus" placeholder="Input Url kursus">
    </div>

    <button type="submit" class="btn btn-primary mr-2" id="submitBtn">
        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="submitSpinner"></span>
        <span id="submitText">Submit</span>
    </button>
    <button type="reset" class="btn btn-light">Cancel</button>
</form>
