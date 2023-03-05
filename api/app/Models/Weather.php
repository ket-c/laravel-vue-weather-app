<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'weather_details', 'location_details', 'weather_date'];
    protected $cast = [
        'weather_date'=>'datetime:Y-m-d H:i:s',
    ];

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }
}
