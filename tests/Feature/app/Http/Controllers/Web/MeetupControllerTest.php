<?php

declare(strict_types=1);

test('meetups url redirects to agenda', function (): void {
    $response = $this->get('/meetups');

    $response->assertRedirect('/agenda');
});
