<?php namespace Frukt\Books\Components;

use Cms\Classes\ComponentBase;
use Frukt\Books\Classes\RateHelper;
use Frukt\Books\Models\Book;
use Frukt\Books\Models\User;
use function Matrix\trace;

/**
 * TestModule Component
 */
class TestModule extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Тестовый модуль',
            'description' => 'Для проверки решения'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRecomendationForUser()
    {
        $user = User::find(post('user_id'));

        if ($user) {
            //забираем все данные в которых действие было 0.3
            $data = RateHelper::selectDataUserId($user->id, 0.3);
            //забираем забираем все жирные действия свои и других пользователей
            $out = RateHelper::getRecommendedItemsByUser($user->id);
            //формируем массив, чтобы всё что нам не нужно почистить
            $result = array();
            trace_log($data, $out);
            foreach ($out as $value) {
                $result[$value->item_id2] = $value->item_id2;
            }
            //чистим
            foreach ($data as $value) {
                unset($result[$value->book_id]);
            }
            //выводим результат
            trace_log($result);

            $recBookArray = array();
            foreach ($result as $item) {
                $recBookArray[] = $item;
            }

            $books = Book::whereIn('id', $recBookArray)->get();
        }

        return [
            '#result' => $this->renderPartial($this.'::make_recomendation', ['user' => $user, 'books' => $books])
        ];
    }
}
