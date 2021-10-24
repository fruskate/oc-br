<?php namespace Frukt\Books\Models;

use Frukt\Books\Classes\RateHelper;
use Model;

/**
 * Model
 */
class Order extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_books_orders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = ['book_id', 'user_id', 'event', 'created_at'];

    public $belongsTo = [
        'user' => User::class,
        'book' => Book::class,
    ];

    public function afterCreate()
    {
        $rating = 0.1000;
        if ($this->event == 'create_order') {
            $rating = 0.3000;
        }
        RateHelper::setRateToBook($this->book_id, $this->user_id, $rating);
    }
}
