<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Cherche extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'Cherche';

    protected $appends = [
        'photo',
    ];
    
protected $hidden = [
    'password',
    'remember_token',
];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'HDR',
        'PHD',
        'Grade',
        'Spécialité',
        'Statut',
        'type',
        'typeEnc',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

public function getEmailVerifiedAtAttribute($value)
{
    return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
}

public function setEmailVerifiedAtAttribute($value)
{
    $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
}

public function setPasswordAttribute($input)
{
    if ($input) {
        $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
}

public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPassword($token));
}

}
