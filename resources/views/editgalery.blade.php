@extends('layouts.app')

@section('css')
<style>
/* .image-frame {
  display: inline-block;
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}

.image-frame img {
  max-width: 100%;
  height: auto;
}

.image-description {
  margin-top: 10px;
} */

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="/galery/update" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="mb-3">
              <legend>Edit Data</legend>
              @csrf
              <input type="hidden" name="id" class="form-control" id="title" placeholder="Masukkan Title" value="{{ $Galery->id }}">
          
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan Title" value="{{ $Galery->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Picture</label>
                    <input type="file" name="image" class="form-control" id="image"  onchange="halo(this)">
                </div>
                <div>
                  <img src="{{ asset('storage/'.$Galery->picture_name) }}" alt="" style="max-width: 50%" data-id="{{ $Galery->id }}" data-nama="{{ $Galery->picture_name }}" id="preview">
                  <div id="previewbox" style="width: 48%; display: none;">
                    <img id="previewImage" src="" alt="Preview Image" width="100%">
                  </div>
                  <div class="mt-1" style="display: none" id="button-gbr">
                    <span type="button" class="btn btn-primary" onclick="updateImage()">Ganti Gambar</span>
                  </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Tambahkan deskripsi untuk ditampilkan di Deskripsi">{{ $Galery->description }}</textarea>
                </div>
            </fieldset>
          
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>                  
    </div>
</div>
@endsection

@section('script')

<script>
let file = '';
function halo(input) {
  // console.log(event);
  file = input.files[0];
  let reader = new FileReader();
  console.log(reader);

  reader.onload = function(e) {
    let previewImg = document.getElementById('previewImage');
    let button = document.getElementById('button-gbr');
    let previewBox = document.getElementById('previewbox');
    previewBox.style.display = 'inline-block';
    button.style.display = 'block';
    previewImg.src = e.target.result;
  };

  reader.readAsDataURL(file);
}

// upload image
function updateImage(input) {
  //   let fileName = file.name; // Mendapatkan nama file
  let formData = new FormData();
  let toDelete = document.getElementById('preview').dataset.nama; // file yang akan diganti
  let idToDelete = document.getElementById('preview').dataset.id; // file yang akan diganti
  formData.append('image', file);
  formData.append('toDelete', toDelete); // Menambahkan nama file ke FormData
  formData.append('idToDelete', idToDelete); // Menambahkan nama file ke FormData

  axios.post('/update-image', formData)
    .then(function(response) {
      let source = document.getElementById('preview');
      console.log(response.data); // Tanggapan dari server
      //   ganti logo preview
      source.src = "{{ asset('storage') }}/"+response.data.savedname;
      // hilangkan previewbox
      let previewbox = document.getElementById('previewbox');
      previewbox.style.display = "none";
    })
    .catch(function(error) {
      console.error(error); // Kesalahan jika ada
    });
}
</script>
@endsection
