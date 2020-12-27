<<<<<<< HEAD
## Database Kategori
Pada bagian ini hanya membuat migration sama model Kategori

Langkah-langkah : 
- Buat model dengan command php artisan make:model Kategori -m
- -m di belakang nama model maksudnya adalah sekalian sama migrationsnya
- Kategori dibuat dengan foreign key user_id mengacu ke id di table users
=======
## Register Customer
Membuat proses customer, data customer baru ketika daftar langsung mempunyai role "member"

Langkah-langkah : 
- Tambahkan kolom phone di form register
- value pada form register dan login di tambahi default value old('nama field')
>>>>>>> ebe5f73258da000e7247c9aed480a96957506bb1
