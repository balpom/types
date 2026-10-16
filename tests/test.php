<?php

namespace Balpom\Types;

ini_set('max_execution_time', '15');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('html_errors', 'off');
error_reporting(E_ALL);

include dirname(__DIR__) . '/vendor/autoload.php';

$string = new StringType();
$strictString = new StrictStringType();

echo $string->coerce('3.1415926535') . PHP_EOL;
echo gettype($string->coerce('3.1415926535')) . PHP_EOL;
echo $string->coerce(3.1415926535) . PHP_EOL;
echo gettype($string->coerce(3.1415926535)) . PHP_EOL;

echo PHP_EOL . '1 ------------------------------------------' . PHP_EOL . PHP_EOL;

echo $strictString->coerce('3.1415926535') . PHP_EOL;
echo gettype($strictString->coerce('3.1415926535')) . PHP_EOL;
try {
    echo $strictString->coerce(3.1415926535) . PHP_EOL;
    echo gettype($strictString->coerce(3.1415926535)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '2 ------------------------------------------' . PHP_EOL . PHP_EOL;

$int = new IntType();
$strictInt = new StrictIntType();

echo $int->coerce(7777777) . PHP_EOL;
echo gettype($int->coerce(7777777)) . PHP_EOL;
echo $int->coerce('7777777') . PHP_EOL;
echo gettype($int->coerce('7777777')) . PHP_EOL;
echo $int->coerce(0000000) . PHP_EOL;
echo gettype($int->coerce(0000000)) . PHP_EOL;
echo $int->coerce('+0000000') . PHP_EOL;
echo gettype($int->coerce('+0000000')) . PHP_EOL;
echo $int->coerce('-0000000') . PHP_EOL;
echo gettype($int->coerce('-0000000')) . PHP_EOL;
try {
    echo $int->coerce('') . PHP_EOL;
    echo gettype($int->coerce('')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    echo $int->coerce(true) . PHP_EOL;
    echo gettype($int->coerce(true)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '3 ------------------------------------------' . PHP_EOL . PHP_EOL;

echo $strictInt->coerce(-55555) . PHP_EOL;
echo gettype($strictInt->coerce(-55555)) . PHP_EOL;
echo $strictInt->coerce(0) . PHP_EOL;
echo gettype($strictInt->coerce(0)) . PHP_EOL;
echo $strictInt->coerce(-0) . PHP_EOL;
echo gettype($strictInt->coerce(-0)) . PHP_EOL;
echo $strictInt->coerce(+000) . PHP_EOL;
echo gettype($strictInt->coerce(+000)) . PHP_EOL;
try {
    echo $strictInt->coerce(true) . PHP_EOL;
    echo gettype($strictInt->coerce(true)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    echo $strictInt->coerce(3.1415926535) . PHP_EOL;
    echo gettype($strictInt->coerce(3.1415926535)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    echo $strictInt->coerce('3.1415926535') . PHP_EOL;
    echo gettype($strictInt->coerce('3.1415926535')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '4 ------------------------------------------' . PHP_EOL . PHP_EOL;

$strictArray = new StrictArrayType();

print_r($strictArray->coerce([]));
echo gettype($strictArray->coerce([])) . PHP_EOL;
try {
    print_r($strictArray->coerce('abcdef'));
    echo PHP_EOL;
    echo gettype($strictArray->coerce('abcdef')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

$mixed = new MixedType();

print_r($mixed->coerce(new \StdClass()));
echo gettype($mixed->coerce(new \StdClass())) . PHP_EOL;

