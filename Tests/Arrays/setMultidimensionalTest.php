<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Agrandesr\Utils\Arrays;

final class setMultidimensionalTest extends TestCase
{
    public function testControl() {
        Arrays::setPathSeparator('.');
        $this->assertEquals(true,true);
    }

    public function testIfIsMultidimensional(){
        $firstTest=[
            '1lvl1.2lvl1.3lvl1'=>'random1',
            '1lvl1.2lvl1.3lvl2'=>'random2',
            '1lvl1.2lvl2'=>'random3',
            '1lvl2'=>'random4'
        ];
        $firstTry=Arrays::setMultidimensional($firstTest);
        $this->assertEquals(
            [
                '1lvl1'=>[
                    '2lvl1'=>[
                        '3lvl1'=>'random1',
                        '3lvl2'=>'random2',
                    ],
                    '2lvl2'=>'random3'
                ],
                '1lvl2'=>'random4'
            ],
            $firstTry
        );
    }

    public function testIfSeparatorIsWorking(){
        $firstTest=[
            '1lvl1/2lvl1/3lvl1'=>'random1',
            '1lvl1/2lvl1/3lvl2'=>'random2',
            '1lvl1/2lvl2'=>'random3',
            '1lvl2'=>'random4'
        ];
        $firstTry=Arrays::setMultidimensional($firstTest);
        Arrays::setPathSeparator('/');
        $firstTry=Arrays::setMultidimensional($firstTest);
        $this->assertEquals(
            [
                '1lvl1'=>[
                    '2lvl1'=>[
                        '3lvl1'=>'random1',
                        '3lvl2'=>'random2',
                    ],
                    '2lvl2'=>'random3'
                ],
                '1lvl2'=>'random4'
            ],
            $firstTry
        );
    }
}
