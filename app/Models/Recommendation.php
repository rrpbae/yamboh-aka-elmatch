<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = ['cv_id', 'job_vacancy_id', 'score'];
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
