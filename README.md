# oc-br
Book Recomendations System for mos.ru

## Установка.

Установка производится стандартно.

1. Сначала клонируется репозиторий.

2. В любой подкаталог устанавливается OctoberCMS.

3. Копируется OctoberCMS в корневой каталог и запускается установка `php artisan october:install`

4. После установки необходимо выполнить загрузку датасета книг командой `php artisan import:dataset`

5. Далее коннектим те книги, которые имеются в books.json предоставленном экспертами командой
`php artisan import:books`

## Дополнительные пакеты

### Maatwebsite Excel

Необходим для того, чтобы работать с импортом и экспортом в excel формате.

Установка пакета: `composer require maatwebsite/excel`

Публикация настроек: `php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config`

Добавить в провайдеры в `config/app.php` - `Maatwebsite\Excel\ExcelServiceProvider::class,`

Добавить в алиасы в `config/app.php` - `'Excel' => Maatwebsite\Excel\Facades\Excel::class,`
