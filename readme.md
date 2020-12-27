## Database Kategori
Pada bagian ini hanya membuat migration sama model Kategori

Langkah-langkah : 
- Buat model dengan command php artisan make:model Kategori -m
- -m di belakang nama model maksudnya adalah sekalian sama migrationsnya
- Kategori dibuat dengan foreign key user_id mengacu ke id di table users