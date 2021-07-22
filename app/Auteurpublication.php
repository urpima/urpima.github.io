<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Publication;
class Auteurpublication extends Model
{
    use SoftDeletes;

    public $table = 'auteurpublications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
          'publication_id', 
          'chercheur_id', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'chercheur_id', 'id');
    }
}
