<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PannesModels extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'description',
        'detected_date',
        'secteur',
    ];
}
