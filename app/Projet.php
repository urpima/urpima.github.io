<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Projet extends Model  implements Searchable
{
    use SoftDeletes;

    public $table = 'projets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titre',
         'type',
          'responsable_id', 
          'nature',
          'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'responsable_id');
    }
  
    public function getSearchResult(): SearchResult
    {
        $url = route('admin.projets.show', $this->id);

        return new SearchResult(
            $this,
            $this->titre,
            $url
         );
    }
}
