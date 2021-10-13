<?php namespace Frukt\Books\Models;

use Model;

/**
 * Model
 */
class Publisher extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    protected $fillable = ['name'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_books_publishers';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'books' => [
            'table' => 'mm_book_publisher',
            Book::class,
        ],
    ];
}
