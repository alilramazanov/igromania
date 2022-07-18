<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @property string $name
 * @property string $description
 * @property string|null $preview
 * @property string|null $detail_photos
 * @property string|null $videos
 * @property integer $studio_id
 *
 */

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'preview',
        'detail_photos',
        'videos',
        'studio_id',
    ];

    public function getPreviewAttribute($value){
        return env('APP_URL') . '/storage/' . $value;
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'games_genres', 'game_id','genre_id');
    }

    public function studio(){
        return $this->belongsTo(Studio::class);
    }
}
