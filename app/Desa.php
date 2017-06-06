<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'tbl_desa';
    protected $fillable = ['kode','nama','kecamatan_id'];

    public function kecamatan(){//kita gunakan eager loading nanti
        return $this->belongsTo('App\Kecamatan');
    }
}
