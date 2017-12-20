<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ZendTest\Log\Processor;

use PHPUnit\Framework\TestCase;
use Zend\Log\Processor\Backtrace;

class BacktraceTest extends TestCase
{

    public function testProcess()
    {
        $processor = new Backtrace();

        $event = [
            'timestamp' => '',
            'priority' => 1,
            'priorityName' => 'ALERT',
            'message' => 'foo',
            'context' => []
        ];

        $event = $processor->process($event);

        $this->assertArrayHasKey('file', $event['context']);
        $this->assertArrayHasKey('line', $event['context']);
        $this->assertArrayHasKey('class', $event['context']);
        $this->assertArrayHasKey('function', $event['context']);
    }

}
