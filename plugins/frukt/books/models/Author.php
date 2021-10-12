<?php namespace Frukt\Books\Models;

use Model;

/**
 * Model
 */
class Author extends Model
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
    public $table = 'frukt_books_authors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'books' => Book::class,
    ];
}
