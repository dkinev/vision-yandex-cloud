<?php

declare(strict_types=1);

namespace dkinev\VisionYandexCloud\exceptions;

/**
 * Данные в фабрике не шаблоне заполнены
 */
class FillTemplateException extends \Exception
{
    public function getName()
    {
        return 'FillTemplate';
    }
}
