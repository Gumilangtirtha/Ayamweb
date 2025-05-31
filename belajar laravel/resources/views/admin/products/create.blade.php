@extends('backend.back')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="bi bi-plus-circle"></i> Tambah Produk Baru
        </h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Produk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Masukkan nama produk"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            id="category_id" 
                                            name="category_id" 
                                            required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" 
                                               class="form-control @error('price') is-invalid @enderror" 
                                               id="price" 
                                               name="price" 
                                               value="{{ old('price') }}" 
                                               min="0" 
                                               step="1000"
                                               placeholder="0"
                                               required>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="spice_level" class="form-label">Level Pedas <span class="text-danger">*</span></label>
                                    <select class="form-select @error('spice_level') is-invalid @enderror" 
                                            id="spice_level" 
                                            name="spice_level" 
                                            required>
                                        <option value="">Pilih Level</option>
                                        <option value="1" {{ old('spice_level') == '1' ? 'selected' : '' }}>1 - Tidak Pedas</option>
                                        <option value="2" {{ old('spice_level') == '2' ? 'selected' : '' }}>2 - Sedikit Pedas</option>
                                        <option value="3" {{ old('spice_level') == '3' ? 'selected' : '' }}>3 - Pedas Sedang</option>
                                        <option value="4" {{ old('spice_level') == '4' ? 'selected' : '' }}>4 - Pedas</option>
                                        <option value="5" {{ old('spice_level') == '5' ? 'selected' : '' }}>5 - Sangat Pedas</option>
                                    </select>
                                    @error('spice_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div class="mb-3" id="imagePreview" style="display: none;">
                            <label class="form-label">Preview Gambar</label>
                            <div class="border rounded p-3 text-center">
                                <img id="previewImg" src="" alt="Preview" class="img-fluid" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_premium" 
                                           name="is_premium" 
                                           value="1" 
                                           {{ old('is_premium') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_premium">
                                        <i class="bi bi-star text-warning"></i> Produk Premium
                                    </label>
                                    <div class="form-text">Tandai jika ini adalah produk premium dengan harga lebih tinggi</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_active" 
                                           name="is_active" 
                                           value="1" 
                                           {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        <i class="bi bi-check-circle text-success"></i> Aktif
                                    </label>
                                    <div class="form-text">Produk akan ditampilkan di menu jika diaktifkan</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Produk
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Sidebar with Tips -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-lightbulb"></i> Tips Menambah Produk
                    </h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="bi bi-info-circle"></i> Panduan:</h6>
                        <ul class="mb-0 small">
                            <li>Gunakan nama produk yang jelas dan menarik</li>
                            <li>Deskripsi yang detail membantu pelanggan memahami produk</li>
                            <li>Pilih level pedas sesuai dengan rasa produk</li>
                            <li>Gunakan gambar berkualitas tinggi untuk menarik pelanggan</li>
                            <li>Tandai sebagai premium jika produk memiliki nilai lebih</li>
                        </ul>
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="bi bi-exclamation-triangle"></i> Perhatian:</h6>
                        <ul class="mb-0 small">
                            <li>Pastikan harga sudah sesuai dengan cost produksi</li>
                            <li>Level pedas harus akurat untuk kepuasan pelanggan</li>
                            <li>Gambar akan di-resize otomatis jika terlalu besar</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-lightning"></i> Aksi Cepat
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-list"></i> Lihat Semua Produk
                        </a>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="fillSampleData()">
                            <i class="bi bi-magic"></i> Isi Data Contoh
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    });
    
    // Price formatting
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('input', function(e) {
        // Remove non-numeric characters except decimal point
        let value = e.target.value.replace(/[^\d]/g, '');
        e.target.value = value;
    });
    
    // Form validation
    const form = document.getElementById('productForm');
    form.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const category = document.getElementById('category_id').value;
        const price = document.getElementById('price').value;
        const spiceLevel = document.getElementById('spice_level').value;
        
        if (!name || !category || !price || !spiceLevel) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi (*)');
            return false;
        }
        
        if (parseFloat(price) <= 0) {
            e.preventDefault();
            alert('Harga harus lebih besar dari 0');
            return false;
        }
    });
});

// Fill sample data function
function fillSampleData() {
    if (confirm('Apakah Anda ingin mengisi form dengan data contoh?')) {
        document.getElementById('name').value = 'Ayam Goreng Spesial';
        document.getElementById('description').value = 'Ayam goreng dengan bumbu rahasia yang renyah di luar dan juicy di dalam. Cocok untuk semua kalangan dengan cita rasa yang tak terlupakan.';
        document.getElementById('price').value = '25000';
        document.getElementById('spice_level').value = '2';
        document.getElementById('is_active').checked = true;
    }
}
</script>
@endsection
