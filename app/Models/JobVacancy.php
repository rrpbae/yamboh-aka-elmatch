<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = ['company_id', 'posisi', 'deskripsi', 'kualifikasi', 'kontak_email', 'kontak_telepon', 'status_open'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
