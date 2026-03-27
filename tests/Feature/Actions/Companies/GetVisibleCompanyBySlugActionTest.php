<?php

declare(strict_types=1);

use App\Actions\Companies\GetVisibleCompanyBySlugAction;
use App\Models\Company;

test('returns a visible company by slug', function (): void {
    $company = Company::factory()->visible()->create([
        'slug' => 'my-company',
    ]);

    $action = new GetVisibleCompanyBySlugAction();
    $result = $action->execute('my-company');

    expect($result->id)->toBe($company->id);
});

test('throws ModelNotFoundException for hidden company', function (): void {
    Company::factory()->hidden()->create([
        'slug' => 'hidden-company',
    ]);

    $action = new GetVisibleCompanyBySlugAction();
    $action->execute('hidden-company');
})->throws(Illuminate\Database\Eloquent\ModelNotFoundException::class);

test('throws ModelNotFoundException for non-existent slug', function (): void {
    $action = new GetVisibleCompanyBySlugAction();
    $action->execute('non-existent-company');
})->throws(Illuminate\Database\Eloquent\ModelNotFoundException::class);
