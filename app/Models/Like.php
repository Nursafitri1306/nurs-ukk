<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'photolikes';
    protected $primaryKey = 'likeId';

    protected $fillable = ['photoId', 'userId', 'date_like'];
}
