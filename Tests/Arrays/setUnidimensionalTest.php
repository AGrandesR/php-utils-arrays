<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Agrandesr\Utils\Arrays;

final class setUnidimensionalTest extends TestCase
{
    public function testControl() {
        Arrays::setPathSeparator('.');
        $this->assertEquals(true,true);
    }

    public function testIfIsUnidimensionak(){
        $firstTest=[
            '1lvl1'=>['1lvl2'=>'random','1lvl3'=>['1lvl4'=>'more random']],
            '2lvl1'=>[],
            '3lvl1'=>['test']
        ];
        $firstTry=Arrays::setUnidimensional($firstTest);
        $this->assertEquals(
            ['1lvl1.1lvl2'=>'random','1lvl1.1lvl3.1lvl4'=>'more random','2lvl1'=>[],'3lvl1.0'=>'test'],
            $firstTry
        );
        foreach ($firstTry as $value) {
            if(!is_array($value)) continue;
            $this->assertEmpty($value, json_encode($value) . 'is not empty');
        }
        
    }

    public function testIfSeparatorIsWorking(){
        $firstTest=[
            '1lvl1'=>['1lvl2'=>'random','1lvl3'=>['1lvl4'=>'more random']],
            '2lvl1'=>['test']
        ];
        Arrays::setPathSeparator('/');
        $firstTry=Arrays::setUnidimensional($firstTest);

        $this->assertEquals(
            ['1lvl1/1lvl2'=>'random','1lvl1/1lvl3/1lvl4'=>'more random','2lvl1/0'=>'test'],
            $firstTry
        );
        foreach ($firstTry as $value) {
            if(!is_array($value)) continue;
            $this->assertEmpty($value, json_encode($value) . 'is not empty');
        }
        
    }
}
