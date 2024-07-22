<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';
    protected $primaryKey = 'id_obat';
    protected $keyType = 'string';

    protected $fillable = [
    'id_obat',
    'nama_obat',
    'harga',
    'quantity',
    'id_kategori'
    ];

    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
