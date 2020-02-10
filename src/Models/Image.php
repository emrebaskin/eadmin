<?php


namespace EmreBaskin\Eadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Images
 * @package App\Models
 */
class Image extends Model
{

    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'images';

}
