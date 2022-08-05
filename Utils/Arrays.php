<?php
namespace AGrandesR\Utils;

use Error;

class Arrays {
    //region SEPARATOR methods
    static function setPathSeparator(string $separator) : void {
        $GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR']=$separator;
    }

    static function getPathSeparator() : string {
        return $GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR'];
    }
    //endregion

    static function hello() {
        return "hello";
    }
    //FROM agile-router...
    static function isArrayRouteSetInArray(string $arrayRoute, array $array, &$value=null) : bool {
        $paths = explode('.',$arrayRoute);
        $isSet=true;
        foreach($paths as $path){
            if(isset($array[$path])){
                $value=$array[$path];
                array_shift($paths);
                if(!empty($paths)) return self::isArrayRouteSetInArray(implode('.',$paths),$array[$path]);
            }else return false;
        }
        return $isSet;
    }
    
    static function issetPath(string $path, $array) {
        //Random
    }

    static function pathSet(string $path, mixed $value, array &$receivedArray, bool $byReference=true) : array {
        self::avoidInfiniteLoop();

        if($byReference) $workingArray = &$receivedArray;
        else $workingArray = $receivedArray;

        if(!isset($GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR'])) $GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR']='.';
        $sprt=$GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR'];

        $pathSlugs=explode($sprt,$path);

        //We check if we are in the last slug of the path
        $lastSlug=Count($pathSlugs)===1; //Remember, we remove one $slug in each call
        $actualKeyOfTheArray=$pathSlugs[0]; //We collect the actual Slug - This is usefull to insert in the final iteration and to create the path to avoid problems with references
        if($lastSlug) {
            //We set the new value in the correct site
            $workingArray[$actualKeyOfTheArray]=$value;
            return  $workingArray;
        }
        unset($pathSlugs[0]); //We remove the 
        $pathSlugs=array_values($pathSlugs); //Resort the array to avoid problems with the unset
        if(!isset($workingArray[$actualKeyOfTheArray])) $workingArray[$actualKeyOfTheArray]=null;
        self::pathSet(implode($sprt,$pathSlugs),$value,$workingArray[$actualKeyOfTheArray]);
        return $workingArray;
    }

    static function pathGet(string $path, array $receivedArray) : mixed {
        if(!isset($GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR'])) $GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR']='.';
        $sprt=$GLOBALS['X-AGRANDESR-ARRAYS-SEPARATOR'];

        $pathSlugs=explode($sprt,$path);

        $tmpArray=$receivedArray;
        foreach($pathSlugs as $segment) {
            if(isset($tmpArray[$segment])){
                $tmpArray=$tmpArray[$segment];
            } else return null;
        }
        return $tmpArray;
    }

    static function avoidInfiniteLoop(string $msg='') : void {
        if(isset($GLOBALS['X-AGRANDESR-AVOID-INFINITE'])) {
            if($GLOBALS['X-AGRANDESR-AVOID-INFINITE-LOOP']>100) throw new Error("Infinite Loop: $msg", 1);
            $GLOBALS['X-AGRANDESR-AVOID-INFINITE-LOOP']++;
        }else $GLOBALS['X-AGRANDESR-AVOID-INFINITE-LOOP']=0;
    }
}