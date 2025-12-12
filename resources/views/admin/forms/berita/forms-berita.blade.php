<form class="forms-sample" method="POST" action="{{ route('admin.forms.add-berita.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="inputNamaBerita">Nama Berita</label>
        <input type="text" class="form-control" id="nama_berita" name="nama_berita" placeholder="Nama Berita">
    </div>

    <div class="form-group">
        <label for="inputTanggalBerita">Tanggal Berita</label>
        <input type="datetime-local" class="form-control" id="tgl_berita"
               placeholder="Tanggal Berita">
        <input type="hidden" name="tgl_berita" id="tglBeritaHidden">
    </div>

    <div class="form-group">
        <label for="lokasiBerita">Lokasi Berita</label>
        <input type="text" class="form-control" id="lokasi_berita" name="lokasi_berita" placeholder="Lokasi Berita">
    </div>

    <div class="form-group">
        <label for="urlBerita">Url Berita</label>
        <input type="text" class="form-control" id="url_berita" name="url_berita" placeholder="Url Berita">
    </div>

    <div class="form-group">
        <label for="urlImgBerita">Gambar Berita</label>
        <input type="text" class="form-control" id="img_berita" name="img_berita" placeholder="Url Gambar Berita">
    </div>

    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>
