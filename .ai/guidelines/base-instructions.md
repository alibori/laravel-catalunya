# Laravel Catalunya AI Base Instructions

These are some base instructions to be used for AI interactions related to the Laravel Catalunya project.

## Strings

All strings in the project should be in English. This includes code comments, commit messages, documentation, and any user-facing text.

For user-facing text, we will use Laravel's localization features to allow for future translations. When adding new user-facing text to the application, use the `__('Your text here')` helper function to allow for localization, but write the actual text in English. All strings surrounded by `__('')` should be updated in the language files located in `lang` directory, with English as the default language.

## Models

After creating or updating models always run this command:

```bash
php artisan ide-helper:models -M
```

This will generate the necessary PHPDoc annotations for the models, which improves IDE support and helps with static analysis tools like PHPStan. Always ensure that your models are properly annotated to maintain code quality and readability.

## Actions

All actions that returns lists of items should be paginated. This means that instead of returning a full collection of items, the action should return a paginated response using Laravel's pagination features. This is important for performance and scalability, especially when dealing with large datasets.

When creating an action that returns a list of items, use the `paginate()` method on the query builder to return a paginated response.
