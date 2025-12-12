<form class="forms-sample" method="POST" action="{{ route('admin.forms.add-video') }}"
      enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="inputJudul">Judul Video</label>
        <input type="text" class="form-control" id="judul_video" name="judul_video" placeholder="Judul Video Batik">
    </div>

    <div class="form-group">
        <label for="imgVideo">Thumbnail Video</label>
        <input type="text" class="form-control" id="img_video" name="img_video" placeholder="Url Youtube">
    </div>

    <div class="form-group">
        <label for="urlVideo">Url Video</label>
        <input type="text" class="form-control" id="url_video" name="url_video" placeholder="Url link video youtube">
    </div>

    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>
