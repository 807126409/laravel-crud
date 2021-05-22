<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FcstmrType extends Model
{
    //
    protected $table = 'fcstmr_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','name','magento_id'
    ];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    protected $guarded = []; // YOLO
}
