<?php

declare(strict_types=1);

namespace dkinev\VisionYandexCloud\exceptions;

/**
 * Ошибка работы с файлом хранения IAM токена
 */
class IAMFileException extends \Exception
{
    public function getName()
    {
        return 'IAMFile';
    }
}