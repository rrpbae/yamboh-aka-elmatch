<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['cv_id', 'job_vacancy_id', 'score'])]
class Recommendation extends Model
{
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
