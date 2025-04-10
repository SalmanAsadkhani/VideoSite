<?php

namespace App\Models;


use App\Jobs\SendEmail;
use App\Mail\ForgotPassword;
use App\Mail\VerificationEmail;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        "sex",
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        SendEmail::dispatchSync($this , new VerificationEmail($this));

    }

    public function sendPasswordResetNotification($token)
    {
        SendEmail::dispatchSync($this,new ForgotPassword($this ,$token));
    }


    public function getgravatarAttribute()
    {
        $hash  = md5($this->attributes['email']);
        return "https://www.gravatar.com/avatar/$hash";
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


    public function getCreatedAtAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }

    public function getAvatarAttribute()
    {
        return '/storage/' . $this->attributes['avatar'];
    }





}
