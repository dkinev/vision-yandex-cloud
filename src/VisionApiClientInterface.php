<?php

declare(strict_types=1);

namespace  dkinev\VisionYandexCloud;

use dkinev\VisionYandexCloud\responses\IAMTokenResponse;
use dkinev\VisionYandexCloud\templates\AbstractTemplate;

/**
 * Базовый интерфейс пакета распознавания Vision Yandex Cloud
 */
interface  VisionApiClientInterface
{
    public function getFreshAIMToken(): IAMTokenResponse;

    function setAIMToken(string $IAMToken);

    public function getDetectedDocument(string $base64ConvertedImage, AbstractTemplate $template, string $lang);
}