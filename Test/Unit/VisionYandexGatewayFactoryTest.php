<?php

namespace dkinev\VisionYandexCloud\Test\Unit;

use dkinev\VisionYandexCloud\FileAssist;
use dkinev\VisionYandexCloud\templates\AbstractTemplate;
use dkinev\VisionYandexCloud\VisionApiClient;
use dkinev\VisionYandexCloud\VisionYandexGateway;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class VisionYandexGatewayFactoryTest extends TestCase
{
    /**
     * @var VisionApiClient|MockObject
     */
    protected $clientApi;

    /**
     * @var FileAssist|MockObject
     */
    protected $fileAssist;

    protected function setUp(): void
    {
        $this->clientApi = $this->getMockBuilder(VisionApiClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->fileAssist = $this->getMockBuilder(FileAssist::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testInstanceClient()
    {
        $template = $this->createMock(AbstractTemplate::class);

        $result = new VisionYandexGateway($this->clientApi, $this->fileAssist, $template);

        $this->assertInstanceOf(VisionYandexGateway::class, $result);
    }
}
