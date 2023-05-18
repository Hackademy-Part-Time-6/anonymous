<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use Laravel\Scout\Searchable;

class Ad extends Model
{
    protected $fillable = ['title', 'body', 'price'];

    use HasFactory, Searchable;

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }



    public function images()
    {
        return $this->hasMany(Image::class);
    }


    static public function ToBeRevisionedCount()
    {
        $count = Ad::where('is_accepted', null)->count();
        return ($count > 0) ? $count : 'No hay anuncios pendientes';
    }

    static public function ApprovedCount()
    {
        $count = Ad::where('is_accepted', true)->count();
        return ($count > 0) ? $count : 'No hay anuncios aprobados';
    }

    static public function ApprovedCountJSON()
    {
        $count = Ad::where('is_accepted', true)->count();
        return ($count > 0) ? $count : 'No hay anuncios aprobados';
    }
}