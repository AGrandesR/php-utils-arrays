<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Agrandesr\Utils\Arrays;

final class pathGetTest extends TestCase
{
    public function testControl() {
        Arrays::setPathSeparator('.');
        $this->assertEquals(true,true);
    }

    public function testDeepGet() {
        $firstTest=[
            "1lvl1"=>[
                "1lvl2"=>"Hello",
                "1lvl2"=>"Test"
            ],
            "2lvl1"=>[
                "1lvl2"=>"Hello",
                "2lvl2"=>[
                    "1lvl3"=>[
                        "1lvl3"=>"There"
                    ]
                ]
            ],
            "Random string"
        ];
        $firstTry=Arrays::pathGet('1lvl1.1lvl2',$firstTest);
        $secondTry=Arrays::pathGet('2lvl1.2lvl2.1lvl3.1lvl3',$firstTest);

        $this->assertEquals(
            $firstTest['1lvl1']['1lvl2'],
            $firstTry
        );
        $this->assertEquals(
            $firstTest['2lvl1']['2lvl2']['1lvl3']['1lvl3'],
            //'There',
            $secondTry
        );

    }

    public function testPathSetSeparatorChange(){
        Arrays::setPathSeparator('.');
        $firstTest=["lvl1"=>["lvl2"=>["lvl3"=>'success']]];
        $firstTry=Arrays::pathGet('lvl1.lvl2.lvl3',$firstTest);
        $this->assertEquals(
            'success',
            $firstTry
        );
        Arrays::setPathSeparator('/');
        $secondTest=$firstTest;
        $secondTry=Arrays::pathGet('lvl1/lvl2/lvl3',$secondTest);
        $this->assertEquals(
            'success',
            $secondTry
        );
    }
    
}
