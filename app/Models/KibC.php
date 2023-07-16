<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KibC extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'kib_c';

    protected $fillable = [
        'IDPemda',
        'Tahun',
        'Harga',
        'Nilai_Susut1',
        'Nilai_Susut2',
        'Akum_Susut',
        'Nilai_Sisa',
        'Sisa_Umur',
        'Jndt',
        'Kd_Bidang',
        'Kd_Unit',
        'Kd_Sub',
        'Kd_UPB',
        'Nm_UPB',
        'Kd_Aset8',
        'Kd_Aset80',
        'Kd_Aset81',
        'Kd_Aset82',
        'Kd_Aset83',
        'Kd_Aset84',
        'Kd_Aset85',
        'Nm_Aset5',
        'No_Reg8',
        'Merk',
        'Type',
        'CC',
        'Bahan',
        'Tgl_Perolehan',
        'Nomor_Pabrik',
        'Nomor_Rangka',
        'Nomor_Mesin',
        'Nomor_Polisi',
        'Nomor_BPKB',
        'Asal_usul',
        'Kondisi',
        'Kd_KA',
        'Keterangan',
        'Column38'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

}