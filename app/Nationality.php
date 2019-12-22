<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    /**
     * @var string
     */
    protected $table = 'nationality';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nationality'
    ];

    /**
     * @var mixed
     */
    public $timestamps = true;

    // relaciones
    
    /**
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany('App\User', 'nationality_id', 'id');
    }
}
