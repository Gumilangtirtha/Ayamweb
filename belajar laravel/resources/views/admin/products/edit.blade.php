@extends('backend.back')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="bi bi-pencil"></i> Edit Produk: {{ $product->name }}
        </h2>
        <div class="btn-group">
            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info">
                <i class="bi bi-eye"></i> Lihat Detail
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Informasi Produk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" id="productForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $product->name) }}" 
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
                                            <option value="{{ $category->id }}" 
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                                      placeholder="Masukkan deskripsi produk">{{ old('description', $product->description) }}</textarea>
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
                                               value="{{ old('price', $product->price) }}" 
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
                                        <option value="1" {{ old('spice_level', $product->spice_level) == '1' ? 'selected' : '' }}>1 - Tidak Pedas</option>
                                        <option value="2" {{ old('spice_level', $product->spice_level) == '2' ? 'selected' : '' }}>2 - Sedikit Pedas</option>
                                        <option value="3" {{ old('spice_level', $product->spice_level) == '3' ? 'selected' : '' }}>3 - Pedas Sedang</option>
                                        <option value="4" {{ old('spice_level', $product->spice_level) == '4' ? 'selected' : '' }}>4 - Pedas</option>
                                        <option value="5" {{ old('spice_level', $product->spice_level) == '5' ? 'selected' : '' }}>5 - Sangat Pedas</option>
                                    </select>
                                    @error('spice_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Current Image -->
                        @if($product->image)
                            <div class="mb-3">
                                <label class="form-label">Gambar Saat Ini</label>
                                <div class="border rounded p-3 text-center bg-light">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-fluid" 
                                         style="max-height: 200px;">
                                    <div class="mt-2">
                                        <small class="text-muted">{{ basename($product->image) }}</small>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="image" class="form-label">
                                {{ $product->image ? 'Ganti Gambar Produk' : 'Gambar Produk' }}
                            </label>
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
                                {{ $product->image ? 'Kosongkan jika tidak ingin mengganti gambar.' : '' }}
                            </div>
                        </div>

                        <!-- New Image Preview -->
                        <div class="mb-3" id="imagePreview" style="display: none;">
                            <label class="form-label">Preview Gambar Baru</label>
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
                                           {{ old('is_premium', $product->is_premium) ? 'checked' : '' }}>
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
                                           {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        <i class="bi bi-check-circle text-success"></i> Aktif
                                    </label>
                                    <div class="form-text">Produk akan ditampilkan di menu jika diaktifkan</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </button>
                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-outline-info">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Sidebar with Product Info -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-info-circle"></i> Informasi Produk
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td><strong>ID Produk:</strong></td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Dibuat:</strong></td>
                            <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Diperbarui:</strong></td>
                            <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                @if($product->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tipe:</strong></td>
                            <td>
                                @if($product->is_premium)
                                    <span class="badge bg-warning text-dark">Premium</span>
                                @else
                                    <span class="badge bg-info">Regular</span>
                                @endif
                            </td>
                        </tr>
                    </table>
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
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                        <button type="button" 
                                class="btn btn-outline-{{ $product->is_active ? 'warning' : 'success' }} btn-sm"
                                onclick="toggleStatus()">
                            <i class="bi bi-{{ $product->is_active ? 'pause' : 'play' }}"></i> 
                            {{ $product->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteProduct()">
                            <i class="bi bi-trash"></i> Hapus Produk
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Tips -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-lightbulb"></i> Tips Edit Produk
                    </h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <ul class="mb-0 small">
                            <li>Pastikan perubahan harga sudah sesuai dengan strategi bisnis</li>
                            <li>Jika mengganti gambar, gunakan gambar berkualitas tinggi</li>
                            <li>Level pedas yang akurat penting untuk kepuasan pelanggan</li>
                            <li>Nonaktifkan produk jika stok habis atau tidak tersedia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Forms for Quick Actions -->
<form id="toggleStatusForm" method="POST" action="{{ route('admin.products.toggle-active', $product) }}" style="display: none;">
    @csrf
    @method('PATCH')
</form>

<form id="deleteForm" method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>

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

// Toggle product status
function toggleStatus() {
    const currentStatus = {{ $product->is_active ? 'true' : 'false' }};
    const action = currentStatus ? 'menonaktifkan' : 'mengaktifkan';
    
    if (confirm(`Apakah Anda yakin ingin ${action} produk ini?`)) {
        document.getElementById('toggleStatusForm').submit();
    }
}

// Delete product
function deleteProduct() {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?\n\nPerhatian: Data yang dihapus tidak dapat dikembalikan!')) {
        if (confirm('Konfirmasi sekali lagi: Hapus produk "{{ $product->name }}"?')) {
            document.getElementById('deleteForm').submit();
        }
    }
}
</script>
@endsection
