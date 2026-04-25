<?php // Penanda dimulainya kode PHP dalam file.

namespace App\Models; // Mendefinisikan 'alamat' class ini agar Laravel tahu di mana letaknya (folder app/Models).

use Illuminate\Database\Eloquent\Model; // Mengambil blueprint Model utama dari Laravel agar class ini punya fitur database.

class Category extends Model // Membuat class Category yang mewarisi semua fungsi cerdas Eloquent ORM.
{
    // Memberitahu Laravel bahwa tabel di database bernama 'category'. 
    // Jika tidak ditulis, Laravel akan mencari tabel bernama 'categories' (jamak).
    protected $table = 'category';
    
    // Daftar kolom yang diizinkan untuk diisi secara massal (mass assignment). 
    // Hanya kolom 'name' yang boleh diinput langsung lewat fungsi create/update.
    protected $fillable = ['name'];

    // Mendefinisikan hubungan "One-to-Many" (Satu ke Banyak).
    public function products()
    {
        // Menyatakan bahwa satu kategori bisa memiliki banyak produk.
        // 'category_id' adalah kolom (foreign key) yang ada di tabel produk untuk menghubungkan keduanya.
        return $this->hasMany(Product::class, 'category_id');
    }
}