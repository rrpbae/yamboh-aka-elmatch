<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['user_id', 'nama_perusahaan', 'alamat', 'kontak'];
    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
