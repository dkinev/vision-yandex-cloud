<?php

declare(strict_types=1);

namespace  dkinev\VisionYandexCloud;

use GuzzleHttp\Client;
use mfteam\ocrVisionYandexCloud\exceptions\IAMFileException;
use dkinev\VisionYandexCloud\templates\AbstractTemplate;

/**
 * Фабрика Api клиента
 *
 * Class VisionYandexGateway
 * @package dkinev\VisionYandexGatewayFactory
 */
class VisionYandexGatewayFactory
{
    /**
     * @param string $oAuthToken
     * @param string $folderId
     * @param Client $guzzleClient
     * @param AbstractTemplate $template
     * @param string|null $IAMFile
     * @return VisionYandexGateway
     * @throws IAMFileException
     */
    public static function instanceClient(
        string            $oAuthToken,
        string            $folderId,
        Client            $guzzleClient,
        AbstractTemplate  $template,
        string            $IAMFile = null
    ): VisionYandexGateway
    {
        $clientApi = new VisionApiClient($oAuthToken, $folderId, $guzzleClient);
        $fileAssist = new FileAssist($IAMFile);

        return new VisionYandexGateway($clientApi, $fileAssist, $template);
    }
}
