<?php

namespace App;

class StringFunction
{
    public function camelCase(string $str): string
    {
        if (empty($str)) {
            return '';
        }
        preg_match_all('~[A-Za-z]+~', $str, $match);
        $words =  array_map(function($index, $word) {
            if ($index === 0) {
                return $word;
            }
            return ucfirst($word);
        }, array_keys($match[0]), $match[0]);
        return implode('', $words);
    }

    public function isBalancedHooks(string $str): bool
    {
        $stack = new \SplStack();
        for ($i = 0; $i < strlen($str); $i++) {
            if (($str[$i] === ')') && ($stack->count() === 0)) {
                return false;
            }
            $str[$i] === '(' ? $stack->add($i, $str[$i]) : $stack->pop();
        }
        return $stack->count() === 0;
    }

    public function revRot(string $string,int $size): string
    {
        if (empty($string) || empty($size)) {
            return '';
        }
        $arr = str_split($string);
        $chunks = array_chunk($arr, $size);
        $res = '';
        foreach($chunks as $chunk) {
            if (count($chunk) !== $size) {
                continue;
            }
            $square = array_map(function($element) {
                return pow($element, 3);
            }, $chunk);
            if (array_sum($square) % 2 === 0) {
                $chunk = array_reverse($chunk);
            } else {
                $firstElement = array_shift($chunk);
                array_push($chunk, $firstElement);
            }
            $res .= implode('', $chunk);
        }
        return $res;
    }
}
