<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;


class Image extends Model
{
    use HasFactory;
    protected $casts = [
        'labels' => 'array'
    ];

    protected $fillable = ['path'];

    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }


    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h) {
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$filename}";
        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null)
    {
        return self::getUrlByFilePath($this->path, $w, $h);
    }
    public static function find($id)
    {
        return self::where('id', $id)->first();
    }

    public function getLabels()
    {
        return $this->labels ? $this->labels : [];
    }

}