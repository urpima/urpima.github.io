<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Publication extends Model  implements Searchable
{
    use SoftDeletes;

    public $table = 'publications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
       'fichier',
       'typedocument',
       'titre', 
       'titredelivre',
        'auteur', 
        'journal', 
        'volume', 
      'numero', 
      'page' ,
      'annee' ,
      'editeur',
        'chapitre',
        'itle',
        'issn',
        'doi',
        'url',
       'anneeuniverciteur',
        'anneesoutenance',
       'encadreur',
        'resume',
        'motcle',
       'idApp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'auteur');
    }
    public function getSearchResult(): SearchResult
    {
        $url = route('publication', $this->id);

        return new SearchResult(
            $this,
            $this->titre,
           
            $url
        );
    }
}
