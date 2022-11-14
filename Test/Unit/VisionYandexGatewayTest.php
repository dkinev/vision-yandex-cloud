<?php

namespace dkinev\VisionYandexCloud\Test\Unit;

use dkinev\VisionYandexCloud\templates\AbstractTemplate;
use dkinev\VisionYandexCloud\VisionApiClient;
use PHPUnit\Framework\TestCase;

class VisionYandexGatewayTest extends TestCase
{
    protected $mockApi;
    protected $mockTemplate;

    protected function setUp(): void
    {
        $this->mockApi = $this->getMockBuilder(VisionApiClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockTemplate = $this->getMockBuilder(AbstractTemplate::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testProcessDetection()
    {
        $this->mockApi->expects($this->any())
            ->method('getDetectedDocument')
            ->willReturn([]);

        $result = $this->mockTemplate;
        $this->assertInstanceOf(AbstractTemplate::class, $result);
    }
}
