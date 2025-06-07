<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'title',
        'description',
        'activity_type',
        'start_date',
        'end_date',
        'status',
        'priority'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}