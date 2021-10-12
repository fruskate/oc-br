<?php namespace Frukt\Books\Models;

use Model;

/**
 * Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_books_persons';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
