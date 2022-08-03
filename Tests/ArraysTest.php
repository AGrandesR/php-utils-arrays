<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use AGrandesR\Utils\Arrays;

final class ArraysTest extends TestCase
{

    public function testHello(): void
    {
        $this->assertEquals(
            'hello',
            Arrays::hello()
        );
    }
}
