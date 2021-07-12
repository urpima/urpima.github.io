<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Speaker extends Model implements HasMedia ,Searchable
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'speakers';

    /*protected $appends = [
        'photo',
    ];*/

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'start_time',
        'photo',
        'day_number',
        'subtitle',
        'axe_id',
        'twitter',
        'facebook',
        'linkedin',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'full_description',
    ];

    /*public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }*/

    public function axe()
    {
        return $this->belongsTo(Axe::class, 'axe_id');
    }

    /*public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }*/
    public function getSearchResult(): SearchResult
    {
        $url = route('semin', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
