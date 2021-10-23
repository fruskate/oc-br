<?php namespace Frukt\Books\Models;

use Model;

/**
 * Model
 */
class Rating extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_books_ratings';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'book' => Book::class,
        'user' => User::class,
    ];
}
