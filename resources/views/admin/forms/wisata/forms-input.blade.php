<form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('admin.forms.add-wisata.store') }}">

    @csrf
    <div class="form-group">
        <label for="inputNamaWisata">Nama Wisata</label>
        <input type="text" class="form-control" id="inputNamaWisata" name="nama_wisata" placeholder="Nama Wisata">
    </div>
    <div class="form-group">
        <label for="inputDetailWisata">Detail Wisata</label>
        <textarea class="form-control" id="inputDetailWisata" name="detail_wisata" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="inputLat">Lat</label>
        <input type="text" class="form-control" id="inputLat" name="lat"
               placeholder="Latitude">
    </div>

    <div class="form-group">
        <label for="inputLon">Lon</label>
        <input type="text" class="form-control" id="inputLon" name="lon"
               placeholder="Longitude">
    </div>

    <div id="alertFileToLarge" class="alert alert-danger d-none" role="alert">
        Ukuran file terlalu besar, pastikan tidak lebih dari 2 MB
    </div>

    <div id="alertFormatNotSupport" class="alert alert-danger d-none" role="alert">
        Format file anda tidak mendukung
    </div>

    <div class="form-group">
        <label for="imageWisata">Url Gambar Wisata</label>
        <input type="file" name="img_wisata" class="file-upload-default">
        <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled
                   placeholder="Upload Gambar">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="inputWilayah">Wilayah Wisata</label>
        <input type="text" class="form-control" id="inputWilayah" name="wilayah" placeholder="Wilayah Wisata">
    </div>

    <div class="form-group">
        <label for="inputIdProvinsi">Provinsi</label>
        <select class="js-example-basic-single form-control" id="inputIdProvinsi" name="provinsi_id">
            <option value="" class="font-weight-bold">Pilih Provinsi</option>
            @foreach($provinsi as $p)
                <option value="{{$p->id_provinsi}}">{{$p->nama_provinsi}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button type="reset" class="btn btn-light">Cancel</button>
</form>
