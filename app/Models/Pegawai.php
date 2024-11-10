<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";

    protected $fillable = ['nama', 'nip', 'file1', 'file2', 'file3'];
}
