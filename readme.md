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

## Upload Image
Upload image digunakan untuk mengupload yang nantinya digunakan untuk upload produk image, kategori image dan foto profil customer

Langkah-langkahnya :
- Update model Image dan migrationnya
- Buatlah 1 buah controller ImageController
- Jalankan perintah storage:link
- Update config/filesystems.php
- Tambahkan route upload image, delete image dan detail image by id

## Upload Image Kategori
Upload image atau banner kategori

Langkah-langkahnya :
- Tambahkan 2 function upload dan hapus image kategori
- Tambahkan 2 route ke web.php
- Edit file views kategori/index.blade.php bagian upload image

## CRUD Produk
Proses create, read, update dan delete data produk

Langkah-langkahnya :
- Tambahkan model Kategori dan Produk ke ProdukController
- Edit bagian function index sampai destroy
- Edit juga views produknya

## Detail Produk
Pada bagian detail produk, kita akan menambahkan foto-foto untuk masing-masing produk

Langkah-langkahnya :
- Buat model ProdukImage dan migrationsnya
- Edit bagian function show pada controller ProdukController
- Tambahkan function upload image dan hapus image
- Edit juga file produk/index.blade.php untuk menampilkan banner produk