## Database Produk
Pada bagian ini hanya membuat migration sama model Produk

Langkah-langkah : 
- Buat model dengan command php artisan make:model Produk -m
- -m di belakang nama model maksudnya adalah sekalian sama migrationsnya
- Produk dibuat dengan foreign key user_id mengacu ke id di table users
- Produk juga dikelompokkan berdasarkan kategori, sehingga foreign key kategori_id