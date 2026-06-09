<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'nama_perusahaan', 'alamat', 'kontak'])]
class Company extends Model
{
    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
