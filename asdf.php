<?php

class A
{
    const NAME = 'A';

    public static function test()
    {
        $args = func_get_args();
        echo static::NAME, ' '.join(',', $args)." \n";
    }
}

class B extends A
{
    const NAME = 'B';

    public static function test()
    {
        echo self::NAME, "\n";
        echo static::NAME, "\n";
        forward_static_call(['A', 'test'], 'more', 'args');
        A::test('foo', 'bar');
        forward_static_call('test', 'other', 'args');
    }
}

B::test('foo');

function test()
{
    $args = func_get_args();
    echo 'C '.join(',', $args)." \n";
}
