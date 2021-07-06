<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule2 extends Model
{
    use SoftDeletes;

    public $table = 'schedule2s';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'Axe_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function axe()
    {
        return $this->belongsTo(Axe::class, 'Axe_id');
    }
}
