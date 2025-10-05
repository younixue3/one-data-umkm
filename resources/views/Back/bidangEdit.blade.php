@extends('Back.master')

@section('title', 'Edit Bidang')

@section('page-title', 'Edit Bidang')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.bidang.index') }}">Bidang</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Konten Bidang</h3>
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

                    <form action="{{ route('dashboard.bidang.update', $bidang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $bidang->id }}">

                        <div class="form-group mb-3">
                            <label for="category">Bidang <span class="text-danger">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                <option value="">-- Pilih Bidang --</option>
                                <option value="perindustrian" {{ old('category', $bidang->category) == 'perindustrian' ? 'selected' : '' }}>Perindustrian</option>
                                <option value="perdagangan dalam negeri" {{ old('category', $bidang->category) == 'perdagangan dalam negeri' ? 'selected' : '' }}>Perdagangan Dalam Negeri</option>
                                <option value="perdagangan luar negeri" {{ old('category', $bidang->category) == 'perdagangan luar negeri' ? 'selected' : '' }}>Perdagangan Luar Negeri</option>
                                <option value="koperasi" {{ old('category', $bidang->category) == 'koperasi' ? 'selected' : '' }}>Koperasi</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description', $bidang->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            @if($bidang->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $bidang->image) }}" alt="{{ $bidang->title }}" class="img-thumbnail" style="max-height: 200px">
                                </div>
                            @endif
                            <div class="input-group">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                <label class="input-group-text" for="image">Upload</label>
                            </div>
                            <small class="text-muted">Format: JPG, PNG, JPEG. Maks: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
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
    // Inisialisasi CKEditor untuk deskripsi
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
        
    // Preview gambar sebelum upload
    document.getElementById('image').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (document.querySelector('.img-thumbnail')) {
                    document.querySelector('.img-thumbnail').src = e.target.result;
                } else {
                    document.getElementById('imagePreview').style.display = 'block';
                    document.querySelector('#imagePreview img').src = e.target.result;
                }
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection
