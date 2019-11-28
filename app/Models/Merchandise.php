<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Merchandise.
 *
 * @package namespace App\Models;
 */
class Merchandise extends Model implements Transformable
{
    use TransformableTrait,Notifiable;

    public $timestamps = true;
    protected $table = 'merchandises';
    protected $guarded = ['id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','name','status',
        'introduction','stock_count','price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


}
