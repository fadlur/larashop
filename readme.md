## Database Produk
Pada bagian ini hanya membuat migration sama model Produk

Langkah-langkah : 
- Buat model dengan command php artisan make:model Produk -m
- -m di belakang nama model maksudnya adalah sekalian sama migrationsnya
- Produk dibuat dengan foreign key user_id mengacu ke id di table users
- Produk juga dikelompokkan berdasarkan kategori, sehingga foreign key kategori_id

## CRUD Kategori
CRUD Kategori digunakan untuk create, read, update dan delete kategori

Langkah-langkahnya :
- Panggil model Kategori dari KategoriController
- Edit function index dengan menambahkan itemkategori
- Tambahkan function store
- Edit function edit
- Tambahkan function update dan delete
- Tambahkan function produk di model Kategori untuk relasi hasMany produk