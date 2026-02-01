# Action pattern

This project uses the **Action Pattern** to encapsulate business logic into discrete, reusable classes called "Actions". This approach promotes separation of concerns, making the codebase more maintainable and testable.

## Key Concepts

- **Action Classes**: Each action is represented by a class that contains a single public method, named `execute()`, which performs the specific task.
- **Reusability**: Actions can be reused across different parts of the application, reducing code duplication.
- **Testability**: Actions can be easily tested in isolation, allowing for more straightforward unit tests.

## Location

Action classes are stored in the `app/Actions` directory. You can organize them further into subdirectories based on their domain or functionality.
