<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapData extends Model
{
    use HasFactory;
    public $fillable = [
        'canada',
        'america',
        'austrailia',     
        'switzerland',   
        'newzealand',
        'japan',
        'germany',
        'france',
        'england',
        'turkey',
        'time',
        'date',
        'japan_2',
    ];    
}
