<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'title', 'pros', 'cons', 'advice_to_owner', 'rating'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function evaluationCriteria(): BelongsToMany
    {
        return $this->belongsToMany(
            EvaluationCriteria::class,
            'review_ratings',
            'review_id',
            'evaluation_criteria_id'
        )->withPivot('rating');
    }
}
