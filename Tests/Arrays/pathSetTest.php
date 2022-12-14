<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Agrandesr\Utils\Arrays;

final class pathSetTest extends TestCase
{
    public function testControl() {
        Arrays::setPathSeparator('.');
        $this->assertEquals(true,true);
    }

    public function testDeepChange() {
        $firstTest=[
            '1lvl1'=>[
                '1lvl2'=>'Hello',
                '1lvl2'=>'Test'
            ],
            '2lvl1'=>[
                '1lvl2'=>'Hello',
                '2lvl2'=>[
                    '1lvl3'=>[
                        '1lvl4'=>'There'
                    ]
                ]
            ],
            'Random string'
        ];
        $firstTry=Arrays::pathSet('1lvl1.1lvl2','Hi',$firstTest);

        $this->assertEquals(
            $firstTest,
            $firstTry
        );
        $this->assertEquals(
            $firstTry['1lvl1']['1lvl2'],
            'Hi'
        );

    }

    public function testRootChange(){
        $array=[''=>['random'=>'random']];
        $firstTest=[''=>'test'];
        $firstTry=Arrays::pathSet('','test',$array);
        $this->assertEquals(
            $firstTest,
            $firstTry
        );

    }

    public function testPathSetSeparatorChange(){
        Arrays::setPathSeparator('.');
        $firstTest=['lvl1'=>['lvl2'=>['lvl3'=>'success']]];
        $firstTry=Arrays::pathSet('lvl1.lvl2.lvl3','test',$firstTest,false);
        $this->assertEquals(
            'test',
            $firstTry['lvl1']['lvl2']['lvl3']
        );
        Arrays::setPathSeparator('/');
        $secondTest=$firstTry;
        $secondTry=Arrays::pathSet('lvl1/lvl2/lvl3','2ndTest',$secondTest,false);
        $this->assertEquals(
            '2ndTest',
            $secondTry['lvl1']['lvl2']['lvl3']
        );
    }
    
    public function testPathSetOnEmptyArray() {
        Arrays::setPathSeparator('.');
        $firstTest=[];
        $firstTry=Arrays::pathSet('lvl1.lvl2.lvl3','test',$firstTest,false);

        $this->assertEquals(
            'test',
            $firstTry['lvl1']['lvl2']['lvl3']
        );
        $this->assertEquals(
            ['lvl3'=>'test'],
            $firstTry['lvl1']['lvl2']
        );
    }

    public function testPathWithStringsElements() {
        Arrays::setPathSeparator('.');
        $firstTest=['lvl1'=>['lvl2'=>''],'1lvl'=>['2lvl'=>[]]];
        $firstTry=Arrays::pathSet('lvl1.lvl2.lvl3','test',$firstTest);

        $this->assertEquals(
            'test',
            $firstTry['lvl1']['lvl2']['lvl3']
        );
        $this->assertEquals(
            ['lvl3'=>'test'],
            $firstTry['lvl1']['lvl2']
        );
    }
}
