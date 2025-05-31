@extends('backend.back')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="bi bi-eye"></i> Detail Produk: {{ $product->name }}
        </h2>
        <div class="btn-group">
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Product Details -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Produk</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-md-4">
                            @if($product->image)
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-fluid rounded shadow"
                                         style="max-height: 300px; width: 100%; object-fit: cover;">
                                </div>
                            @else
                                <div class="text-center">
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="height: 300px;">
                                        <div class="text-muted">
                                            <i class="bi bi-image" style="font-size: 3rem;"></i>
                                            <p class="mt-2">Tidak ada gambar</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="30%"><strong>Nama Produk:</strong></td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Kategori:</strong></td>
                                    <td>
                                        <span class="badge bg-info">{{ $product->category->name ?? 'N/A' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Harga:</strong></td>
                                    <td>
                                        <span class="fs-4 fw-bold text-success">{{ $product->formatted_price }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Level Pedas:</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-fire {{ $i <= $product->spice_level ? 'text-danger' : 'text-muted' }}" 
                                                   style="font-size: 1.2rem;"></i>
                                            @endfor
                                            <span class="ms-2 badge bg-danger">{{ $product->spice_level_text }}</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Tipe Produk:</strong></td>
                                    <td>
                                        @if($product->is_premium)
                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-star"></i> Premium
                                            </span>
                                        @else
                                            <span class="badge bg-info">Regular</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        @if($product->is_active)
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle"></i> Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="bi bi-pause-circle"></i> Tidak Aktif
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Dibuat:</strong></td>
                                    <td>{{ $product->created_at->format('d F Y, H:i') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Terakhir Diperbarui:</strong></td>
                                    <td>{{ $product->updated_at->format('d F Y, H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Product Description -->
                    @if($product->description)
                        <div class="mt-4">
                            <h6><strong>Deskripsi Produk:</strong></h6>
                            <div class="bg-light p-3 rounded">
                                <p class="mb-0">{{ $product->description }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Sales Statistics (Placeholder) -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-graph-up"></i> Statistik Penjualan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="border rounded p-3">
                                <h4 class="text-primary mb-1">0</h4>
                                <small class="text-muted">Total Terjual</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-3">
                                <h4 class="text-success mb-1">Rp 0</h4>
                                <small class="text-muted">Total Pendapatan</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-3">
                                <h4 class="text-warning mb-1">0</h4>
                                <small class="text-muted">Bulan Ini</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-3">
                                <h4 class="text-info mb-1">0</h4>
                                <small class="text-muted">Rating Rata-rata</small>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> 
                            Statistik akan tersedia setelah ada transaksi penjualan
                        </small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Actions -->
        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-lightning"></i> Aksi Cepat
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit Produk
                        </a>
                        
                        <button type="button" 
                                class="btn btn-{{ $product->is_active ? 'outline-warning' : 'outline-success' }}"
                                onclick="toggleStatus()">
                            <i class="bi bi-{{ $product->is_active ? 'pause' : 'play' }}"></i> 
                            {{ $product->is_active ? 'Nonaktifkan' : 'Aktifkan' }} Produk
                        </button>
                        
                        <button type="button" class="btn btn-outline-info" onclick="duplicateProduct()">
                            <i class="bi bi-files"></i> Duplikasi Produk
                        </button>
                        
                        <hr>
                        
                        <button type="button" class="btn btn-outline-danger" onclick="deleteProduct()">
                            <i class="bi bi-trash"></i> Hapus Produk
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product Preview -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-eye"></i> Preview Customer
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <small class="text-muted">Tampilan produk untuk customer:</small>
                    </div>
                    
                    <!-- Mini Product Card Preview -->
                    <div class="card mt-2" style="max-width: 100%;">
                        <div class="position-relative">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $product->name }}"
                                     style="height: 150px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                    <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                            
                            <!-- Spice Level Badge -->
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-danger">
                                    <i class="bi bi-fire"></i> Level {{ $product->spice_level }}
                                </span>
                            </div>
                            
                            <!-- Premium Badge -->
                            @if($product->is_premium)
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-star"></i> Premium
                                    </span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1" style="font-size: 0.9rem;">{{ $product->name }}</h6>
                            <p class="card-text text-muted small mb-2">
                                {{ Str::limit($product->description, 50) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-success small">{{ $product->formatted_price }}</span>
                                <button class="btn btn-primary btn-sm" disabled>
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-2">
                        <small class="text-muted">
                            {{ $product->is_active ? 'Produk terlihat oleh customer' : 'Produk tidak terlihat oleh customer' }}
                        </small>
                    </div>
                </div>
            </div>
            
            <!-- Related Products -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-collection"></i> Produk Terkait
                    </h6>
                </div>
                <div class="card-body">
                    @if($product->category)
                        <p class="small text-muted mb-2">Produk lain dalam kategori "{{ $product->category->name }}":</p>
                        
                        @php
                            $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->where('is_active', true)
                                ->take(3)
                                ->get();
                        @endphp
                        
                        @if($relatedProducts->count() > 0)
                            @foreach($relatedProducts as $related)
                                <div class="d-flex align-items-center mb-2 p-2 border rounded">
                                    @if($related->image)
                                        <img src="{{ asset('storage/' . $related->image) }}" 
                                             alt="{{ $related->name }}" 
                                             class="rounded me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold">{{ $related->name }}</div>
                                        <div class="small text-success">{{ $related->formatted_price }}</div>
                                    </div>
                                    <a href="{{ route('admin.products.show', $related) }}" 
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="small text-muted">Tidak ada produk lain dalam kategori ini.</p>
                        @endif
                    @else
                        <p class="small text-muted">Kategori produk tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Forms for Actions -->
<form id="toggleStatusForm" method="POST" action="{{ route('admin.products.toggle-active', $product) }}" style="display: none;">
    @csrf
    @method('PATCH')
</form>

<form id="deleteForm" method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
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

// Duplicate product
function duplicateProduct() {
    if (confirm('Apakah Anda ingin membuat duplikasi produk ini?\n\nAnda akan diarahkan ke halaman tambah produk dengan data yang sudah terisi.')) {
        // Redirect to create page with query parameters
        const params = new URLSearchParams({
            duplicate: {{ $product->id }},
            name: '{{ $product->name }} (Copy)',
            category_id: {{ $product->category_id }},
            description: '{{ addslashes($product->description) }}',
            price: {{ $product->price }},
            spice_level: {{ $product->spice_level }},
            is_premium: {{ $product->is_premium ? 1 : 0 }}
        });
        
        window.location.href = '{{ route("admin.products.create") }}?' + params.toString();
    }
}
</script>
@endsection
