<?php

declare(strict_types=1);

use App\Actions\Companies\GetVisibleCompaniesAction;
use App\Models\Company;

test('returns only visible companies', function (): void {
    $visibleCompany = Company::factory()->visible()->create();
    Company::factory()->hidden()->create();

    $action = new GetVisibleCompaniesAction();
    $result = $action->execute();

    expect($result->total())->toBe(1)
        ->and($result->items()[0]->id)->toBe($visibleCompany->id);
});

test('does not return hidden companies', function (): void {
    Company::factory()->hidden()->create();

    $action = new GetVisibleCompaniesAction();
    $result = $action->execute();

    expect($result->total())->toBe(0)
        ->and($result->items())->toBeEmpty();
});

test('returns paginated results', function (): void {
    Company::factory()->count(15)->visible()->create();

    $action = new GetVisibleCompaniesAction();
    $result = $action->execute(perPage: 5);

    expect($result->total())->toBe(15)
        ->and($result->perPage())->toBe(5)
        ->and($result->items())->toHaveCount(5)
        ->and($result->hasPages())->toBeTrue();
});

test('returns companies ordered by latest first', function (): void {
    $oldest = Company::factory()->visible()->create(['created_at' => now()->subDays(2)]);
    $newest = Company::factory()->visible()->create(['created_at' => now()]);

    $action = new GetVisibleCompaniesAction();
    $result = $action->execute();

    expect($result->items()[0]->id)->toBe($newest->id)
        ->and($result->items()[1]->id)->toBe($oldest->id);
});
