<?php

function renderSuccess(string $pageTitle, string $pageBody): void
{
    $pageContent = str_replace(
        ['{title}', '{body}'],
        [$pageTitle, $pageBody],
        file_get_contents(__DIR__ . '/template.html')
    );

    exit($pageContent);
}

function renderError(string $message): void
{
    $errorBlock  = str_replace('{message}', $message, file_get_contents(__DIR__ . '/error-template.html'));
    $pageContent = str_replace(
        ['{title}', '{body}'],
        ['Ошибка', $errorBlock],
        file_get_contents(__DIR__ . '/template.html')
    );

    exit($pageContent);
}
