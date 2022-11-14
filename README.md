# Vision Yandex Cloud

## Описание

Vision Yandex Cloud предоставляет API для загрузки документов на обработку и получение результатов распознавания.
Для работы с API системы требуется получить ключи доступа.

## Установка

Добавить в `composer.json`

```
"repositories": [
    ...
    {
      "type": "vcs",
      "url": "https://github.com/dkinev/vision-yandex-cloud.git"
    }
  ]
```

Запустить

```
composer require --prefer-dist dkinev/vision-yandex-cloud dev-main
```

или добавить

```
"dkinev/vision-yandex-cloud": "dev-main"
```

в `composer.json`.

## Использование

Создать новый экземпляр класса

```injectablephp
$visionYandexCloud = VisionYandexGatewayFactory::instanceClient(
        '', // oAuth токен
        '', // folderId
        new Passport(), // Шаблон обрабатываемого документа
        new Client(), // GuzzleHTTP клиент
        '/home/user/IAMToken.txt', // Путь к файлу для распознавания
    );
```

### Создание запроса

На выходе получаем класс - набор параметров распознанного документа.

```injectablephp
// Формирование ключей и инициализация объекта
use GuzzleHttp\Client;
use dkinev\VisionYandexCloud\templates\Passport;
use dkinev\VisionYandexCloud\VisionYandexGatewayFactory;

$api = VisionYandexGatewayFactory::instanceClient(
    '',
    '',
    new Client(),
    new Passport()
);

try {
    $arrayOfDto = $api->processDetection('/tmp/1234.jpg');
} catch (visionYandexCloud\exceptions\FillTemplateException $e) {
    echo 'Распознать документ не удалось' . PHP_EOL;
}

var_dump($arrayOfDto->toArray());
```

Доступны следующие Шаблоны в зависимости от переданной модели:
- **Passport**
- **DriverLicenseBack**
- **DriverLicenseFront**

### Возможные исключения

-------------
```
AccessDeniedException       Ошибка доступа по токену
FillTemplateException       Ошибка заполнения шаблона данными
GetIAMTokenException        Ошибка получения IAM токена
GetTextDetectionException   Ошибка запроса на распознавание документа
IAMFileException            Ошибка при обращении к файлу содержащему IAM откен
ImageFileException          Ошибка работы с изображением
```

### Psalm тестирование

-------------

Покрытие кода тестированием Psalm

Установка dev:
```
composer require --dev vimeo/psalm
```

Запуск проверки:
```
./vendor/bin/psalm .
```

-------------

Документация по использованию распознавания текста сервисом Vision: 
https://cloud.yandex.ru/docs/vision/operations/ocr/text-detection