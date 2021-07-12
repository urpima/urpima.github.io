<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Axe extends Model
{
    use SoftDeletes;

    public $table = 'axes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
       
        'nom',
          'responsable_id', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'responsable_id');
    }
    public function speakers()
    {
        return $this->hasMany(Speaker::class, 'axe_id', 'id');
    }
}
