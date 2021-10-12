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
}
