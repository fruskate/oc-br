<?php namespace Frukt\Books\Classes;


use Frukt\Books\Models\Rating;

class RateHelper
{
    public static function setRateToBook($book_id, $user_id, $rating)
    {
        Rating::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'rating' => $rating
        ]);
    }
}
