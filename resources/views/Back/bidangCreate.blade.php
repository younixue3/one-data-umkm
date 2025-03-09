@extends('Back.master')

@section('title', 'Tambah Bidang')

@section('page-title', 'Tambah Bidang')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.bidang.index') }}">Bidang</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Konten Bidang</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <h5><i class="bi bi-exclamation-triangle-fill me-2"></i> Error!</h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.bidang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="category">Bidang <span class="text-danger">*</span></label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">-- Pilih Bidang --</option>
                                <option value="perindustrian" {{ old('category') == 'perindustrian' ? 'selected' : '' }}>Perindustrian</option>
                                <option value="perdagangan dalam negeri" {{ old('category') == 'perdagangan dalam negeri' ? 'selected' : '' }}>Perdagangan Dalam Negeri</option>
                                <option value="perdagangan luar negeri" {{ old('category') == 'perdagangan luar negeri' ? 'selected' : '' }}>Perdagangan Luar Negeri</option>
                                <option value="koperasi" {{ old('category') == 'koperasi' ? 'selected' : '' }}>Koperasi</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                                <label class="input-group-text" for="image">Upload</label>
                            </div>
                            <small class="text-muted">Format: JPG, JPEG, PNG. Ukuran maksimal: 2MB</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="mt-2" id="imagePreview" style="display: none;">
                                <img src="" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard.bidang.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Konten
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script>
    // Script untuk menampilkan preview gambar yang dipilih
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            const preview = document.getElementById('imagePreview');
            const previewImg = preview.querySelector('img');
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        }
    });
    
    // Inisialisasi CKEditor
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
