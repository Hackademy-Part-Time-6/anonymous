<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;
class Image extends Model
{   
    use HasFactory;


    protected $fillable = ['path'];

    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }
}
