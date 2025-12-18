<?php

declare(strict_types=1);


test('shows the login page', function (): void {
    $this->get('/'.config('laravel_catalunya.filament.admin_panel_path').'/login')
        ->assertOk()
        ->assertSee('Laravel Catalunya');
});
