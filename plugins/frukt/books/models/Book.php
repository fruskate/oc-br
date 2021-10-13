<?php namespace Frukt\Books\Models;

use Model;

/**
 * Model
 */
class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_books_books';

    protected $fillable = ['import_id', 'author_id', 'title', 'year', 'age'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'author' => Author::class,
    ];

    public $belongsToMany = [
        'languages' => [
            'table' => 'mm_book_language',
            Language::class,
        ],
        'persons' => [
            'table' => 'mm_book_person',
            Person::class,
        ],
        'places' => [
            'table' => 'mm_book_place',
            Place::class,
        ],
        'publishers' => [
            'table' => 'mm_book_publisher',
            Publisher::class,
        ],
        'rubrics' => [
            'table' => 'mm_book_rubric',
            Rubric::class,
        ]
    ];
}
