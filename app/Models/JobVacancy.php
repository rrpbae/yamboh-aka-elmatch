<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['company_id', 'posisi', 'deskripsi', 'kualifikasi', 'status_open'])]
class JobVacancy extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
