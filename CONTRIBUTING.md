# Contributing to Laravel Catalunya

Thank you for your interest in contributing!  
This project aims to build a friendly and supportive Laravel community, and we welcome any help.

Please follow the guidelines below before submitting your contribution.

---

## 📌 Branching Model

- **main** → Protected branch. Holds stable and production-ready code.
- **development** → All contributions must target this branch.
- **feature/*** → Feature or fix branches created in your own fork.

---

## 🚀 How to Contribute

### 1. Fork the Repository
Create a fork of this repository under your GitHub account.

### 2. Create a Feature Branch
In your fork:

```bash
git checkout -b feature/my-feature-name
```

Use descriptive names:
feature/add-telegram-link, feature/fix-typo, etc.

### 3. Make Your Changes

Please ensure:

Code follows Laravel conventions.

No secrets .env, tokens, or personal configs are committed.

Tests pass if applicable.

### 4. Pull Latest development

Keep your branch updated:

git fetch upstream
git checkout development
git pull
git checkout feature/my-feature-name
git merge development


(Assuming you added the main repo as upstream.)

### 5. Submit a Pull Request

Open a PR against development, not main.

Please include:

A clear description of the change

Screenshots if relevant

Steps to reproduce or test the update

PRs to main will be closed automatically.

## 🧪 Code Style

Follow Laravel’s Pint configuration. Run:

```bash
composer format
```

Run larastan to check for issues:

```bash
composer analyse
```

Keep commits clean and atomic

## 💬 Communication

For discussion, ideas, or clarifications, feel free to:

Open a GitHub Discussion

Open an Issue

Join our Telegram channel (info on the project website)

## Thank you for contributing!
Together we can grow the Laravel Catalunya ecosystem.
