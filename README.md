# oc-br
Book Recomendations

## Дополнительные пакеты

### Maatwebsite Excel

Установка пакета: `composer required maatwebsite/excel`

Публикация настроек: `php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config`

Добавить в провайдеры в `config/app.php` - `Maatwebsite\Excel\ExcelServiceProvider::class,`

Добавить в алиасы в `config/app.php` - `'Excel' => Maatwebsite\Excel\Facades\Excel::class,`
