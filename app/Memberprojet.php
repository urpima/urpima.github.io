<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Projet;
class Memberprojet extends Model
{
    use SoftDeletes;

    public $table = 'memberprojets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
       
        
          'projet_id', 
          'chercheur_id', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
  
    public function user()
    {
        return $this->belongsTo(User::class, 'chercheur_id');
    }
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id');
    }
  
}
