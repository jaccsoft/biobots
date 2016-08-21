<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'print_data';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
