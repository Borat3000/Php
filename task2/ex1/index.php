<?php

include_once __DIR__ . '/../functions.php';

$items       = require __DIR__ . '/../items-data.php';
$currentPage = strtolower($_GET['page'] ?? 'index');

switch($currentPage)
{
    case 'index':
        $pageTemplate = file_get_contents(__DIR__ . '/templates/list.html');
        $rowsContent  = '';

        foreach($items as $item)
        {
            $detailsUrl = $item['count'] !== 0
                ? sprintf('<a href="%s">Подробнее</a>', sprintf('index.php?page=details&item=%d', $item['id']))
                : '--';

            $rowsContent .= sprintf(
                '<tr><td>%s</td><td>%d</td><td>%d</td><td>%s</td>',
                $item['title'], $item['price'], $item['count'], $detailsUrl
            );
        }

        renderSuccess('Список инструментов', str_replace('{rows}', $rowsContent, $pageTemplate));

        break;

    case 'details':
        $itemId   = (int ) ($_GET['item'] ?? 0);
        $itemData = null;

        foreach($items as $item)
        {
            if($item['id'] === $itemId)
            {
                $itemData = $item;

                break;
            }
        }

        if($itemData !== null)
        {
            $rowsContent = sprintf(
                '<tr><td>%s</td><td>%d</td><td>%d</td><td>%s</td>',
                $itemData['title'], $itemData['price'], $itemData['count'], $itemData['description']
            );

            renderSuccess(
                sprintf('Подробная информация об инструменте %s', $itemData['title']),
                str_replace('{rows}', $rowsContent, file_get_contents(__DIR__ . '/templates/details.html'))
            );
        }
        else
        {
            renderError('Инструмент не найден');
        }

        break;

    default:
        renderError('Страница не найдена');
}
