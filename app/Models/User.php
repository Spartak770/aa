<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable //model@ ezaki table@ hognaki
{
    use HasFactory, Notifiable;
//    protected $table = 'users'; ete chhaskana table@ senc karox enq nshel
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ /* te vor syunakneri mej karox enq tvyal avelacnel*/
        'name',
        'email',
        'age',
        'password',
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
