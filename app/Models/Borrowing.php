<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $table = 'borrowings';
    protected $fillable = ['nama_peminjaman','judul_buku','tanggal_peminjaman','tanggal_pengembalian'];
}
