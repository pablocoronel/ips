<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'nombre', 'apellido', 'email', 'nationality_id',
    ];

    /**
     * @var mixed
     */
    public $timestamps = true;

    //relaciones

    /**
     * @return mixed
     */
    public function nationality_user(){
        return $this->belongsTo('App\Nationality', 'nationality_id', 'id');
    }
}