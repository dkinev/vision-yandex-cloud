<?php

declare(strict_types=1);

namespace dkinev\VisionYandexCloud\exceptions;

/**
 * Ошибка получения IAM токена
 */
class GetIAMTokenException extends \Exception
{
    public function getName()
    {
        return 'GetIAMToken';
    }
}