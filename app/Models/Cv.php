<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'file_path', 'hasil_ai'])]
class Cv extends Model
{
    protected $casts = [
        'hasil_ai' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
