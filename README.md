# Buddhi Babu AI Chat Bot

Buddhi Babu is an AI Chat Bot built using Laravel. This guide will walk you through the steps to clone the repository, set up the project, and configure the Gemini API in your environment variables.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Prerequisites

Before you begin, ensure you have met the following requirements:

- [PHP](https://www.php.net/downloads) (>= 8.2)
- [Composer](https://getcomposer.org/download/)
- [Node.js and npm](https://nodejs.org/en/download/)
- [MySQL](https://www.mysql.com/downloads/)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/pratiklamichhane/buddhi-babu-ai-chat-bot.git
    cd buddhi-babu-ai-chat-bot
    ```

2. **Install the dependencies:**

    ```bash
    composer install
    npm install
    ```

3. **Create a copy of the `.env` file:**

    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**

    - Create a new MySQL database.
    - Update the `.env` file with your database credentials:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

## Configuration

### Gemini API

To configure the Gemini API, you need to set the following environment variables in your `.env` file:

```env
GEMINI_API_KEY=your_gemini_api_key

