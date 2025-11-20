<?php

declare(strict_types=1);

test('Not debugging statements are left in our code.')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();

test('Ensure environment variables are not used directly in our code.')
    ->expect('env')
    ->not->toBeUsed()
    ->ignoring('config');

arch('Use strict types and equality')->expect('App')
    ->toUseStrictTypes()
    ->toUseStrictEquality();
