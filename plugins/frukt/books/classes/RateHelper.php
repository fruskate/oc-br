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

    public static function selectDataUserId($user_id, $rating)
    {
        $items = \Db::select('select * from frukt_books_ratings where user_id=\''.$user_id.'\' and rating=\''.$rating.'\'');
        return $items;
    }

    public static function getRecommendedItemsByUser($user_id, $limit = 5)
    {
        $users = \Db::select('select s.item_id2 from frukt_books_slope_one s,frukt_books_ratings u where u.user_id = '
            . $user_id
            . ' and s.item_id1 = u.book_id and s.item_id2 != u.book_id group by s.item_id2 order by sum(u.rating * s.times - s.rating)/sum(s.times) desc limit '
            . $limit);

        return $users;
    }
}
