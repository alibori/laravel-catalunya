<?php

declare(strict_types=1);

namespace App\Filament\Resources\JobPostings;

use App\Filament\Resources\JobPostings\Pages\CreateJobPosting;
use App\Filament\Resources\JobPostings\Pages\EditJobPosting;
use App\Filament\Resources\JobPostings\Pages\ListJobPostings;
use App\Filament\Resources\JobPostings\Schemas\JobPostingForm;
use App\Filament\Resources\JobPostings\Tables\JobPostingsTable;
use App\Models\JobPosting;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Override;

final class JobPostingResource extends Resource
{
    protected static ?string $model = JobPosting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Briefcase;

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('Job Posting');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Job Postings');
    }

    #[Override]
    public static function getEloquentQuery(): Builder
    {
        if (Auth::user() instanceof User && Auth::user()->is_admin) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return JobPostingForm::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return JobPostingsTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobPostings::route('/'),
            'create' => CreateJobPosting::route('/create'),
            'edit' => EditJobPosting::route('/{record}/edit'),
        ];
    }
}
