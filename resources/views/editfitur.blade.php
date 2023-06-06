@extends('layouts.app')

@section('css')
<style>
/* .image-frame {
  display: inline-block;
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}
.image-framepic {
  display: block;
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
}

#previewImage, #preview {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  border: 1px solid #ccc;
  object-fit: cover;
}
#previewImagepic, #previewpic {
  max-width: 700px;
  max-height: 700px;
  border-radius: 50%;
  border: 1px solid #ccc;
  object-fit: cover;
}
#previewbox, #previewboxpic {
    display: none;
} */
</style>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <form action="/about" method="post">
      @csrf
      <!-- title -->
      <div class="form-group">
        <label for="titel">Title</label>
        <input type="text" name="titel" class="form-control" id="titel" placeholder="Masukkan nama Perusahaan" value="{{ $fitur->title }}">
      </div>
      <!-- ./title -->
      <!-- Description -->
      <div class="form-group mt-3">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Tambahkan deskripsi yang sesuai">{{ $fitur->description }}</textarea>
      </div>
      <!-- ./Description -->
      <!-- Popular -->
      <div class="form-group mt-3">
        <label>Popular</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="popular" id="popular1" checked>
          <label class="form-check-label" for="popular1" value="1">
            Popular
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="popular" id="popular2">
          <label class="form-check-label" for="popular2" value="0">
            Tidak Popular
          </label>
        </div>
      </div>
      <!-- ./Popular -->
      <!-- Aktifasi -->
      <div class="form-group mt-3">
        <label>Aktifasi</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="aktif" id="aktif1" checked>
          <label class="form-check-label" for="aktif1" value="1">
            Aktif
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="aktif" id="aktif2">
          <label class="form-check-label" for="aktif2" value="0">
            Tidak aktif
          </label>
        </div>
      </div>
      <!-- ./Aktifasi -->
      <!-- Logo -->
      <div class="form-group mt-3">
        <label for="logo">Description</label>
        <div class="input-group">
          <input type="file" class="form-control" id="logo" aria-describedby="logoAddon" aria-label="Upload">
          <button class="btn btn-outline-secondary" type="button" id="logoAddon">Button</button>
        </div>
      </div>
      <div class="border row text-center">
        <div class="col-sm-6">
          <div>
            <img src="{{ asset('storage/'.$fitur->logo_name) }}" data-id="{{ $fitur->id }}"  data-nama="{{ $fitur->logo_name }}" alt="Preview" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <div class="image-description">
            <p>Logo Saat ini.</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div>
            <img alt="Preview" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <div class="image-description">
            <p>Logo Saat ini.</p>
          </div>
          <div class="btn btn-primary" onclick="updateImage()">
              <p>simpan</p>
          </div>
        </div>
      </div>
      <!-- ./Logo -->
      <!-- Gambar -->
      <div class="form-group mt-3">
        <label for="gambar">Description</label>
        <div class="input-group">
          <input type="file" class="form-control" id="gambar" aria-describedby="gambarAddon" aria-label="Upload">
          <button class="btn btn-outline-secondary" type="button" id="gambarAddon">Button</button>
        </div>
      </div>
      <div class="border row text-center">
        <div class="col-sm-6">
          <div>
            <img src="{{ asset('storage/'.$fitur->picture_name) }}" data-id="{{ $fitur->id }}"  data-nama="{{ $fitur->logo_name }}" alt="Preview" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <div class="image-description">
            <p>Gambar Saat ini.</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div>
            <img src="" alt="Preview" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <div class="image-description">
            <p>Gambar Baru.</p>
          </div>
          <div class="btn btn-primary" onclick="updateImage()">
              <p>simpan</p>
          </div>
        </div>
      </div>
      <!-- ./Gambar -->
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>                  
  </div>
</div>
@endsection

@section('script')
{{-- <script>
let file = '';
function halo(input) {
  // console.log(event);
  file = input.files[0];
  let reader = new FileReader();

  reader.onload = function(e) {
    let previewImg = document.getElementById('previewImage');
    let previewBox = document.getElementById('previewbox');
    previewBox.style.display = 'block';
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
</script> --}}
@endsection
