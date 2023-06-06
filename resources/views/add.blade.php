@extends('layouts.app')

@section('css')
<style>
.image-frame {
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
}

#previewImage {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  border: 1px solid #ccc;
  object-fit: cover;
}
#previewbox {
    display: none;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="/galery" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="mb-3">
                <legend>Tambah Data</legend>
          
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan Title">
                </div>
                <div class="form-group">
                    <label for="image">Picture</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Masukkan Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Tambahkan deskripsi untuk ditampilkan di Deskripsi"></textarea>
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
</script>
@endsection
