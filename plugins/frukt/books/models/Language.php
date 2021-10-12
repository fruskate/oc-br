<?php namespace Frukt\Books\Models;

use Model;

/**
 * Model
 */
class Language extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    protected $fillable = ['name', 'name_short'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_books_languages';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'books' => [
            'table' => 'mm_book_language',
            Book::class,
        ],
    ];
}
