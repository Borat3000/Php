<?php

include_once __DIR__ . '/../functions.php';

$items       = require __DIR__ . '/../items-data.php';
$currentPage = strtolower($_GET['page'] ?? 'index');

switch($currentPage)
{
    case 'index':
        $filterBy     = $_GET['search'] ?? null;
        $pageTemplate = file_get_contents(__DIR__ . '/templates/list.html');
        $rowsContent  = '';

        foreach($items as $item)
        {
            $detailsUrl = $item['count'] !== 0
                ? sprintf('<a href="#"  onclick="showDetails(%d)">Подробнее</a>', $item['id'])
                : '--';

            $countDetails = $item['count'] !== 0
                ? $item['count']
                : 'Нет в наличии';

            $rowsContent .= sprintf(
                '<tr><td>%s</td><td>%d</td><td>%s</td><td>%s</td>',
                $item['title'], $item['price'], $countDetails, $detailsUrl
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

            exit(str_replace('{rows}', $rowsContent, file_get_contents(__DIR__ . '/templates/details.html')));
        }

        exit('Инструмент не найден');

    case 'search':
        $filterBy     = (string) ($_GET['query'] ?? null);
        $pageTemplate = file_get_contents(__DIR__ . '/templates/list.html');
        $rowsContent  = '';

        foreach($items as $item)
        {
            if($filterBy !== '' && (mb_strtolower($filterBy) !== mb_strtolower($item['title'])))
            {
                continue;
            }

            $detailsUrl = $item['count'] !== 0
                ? sprintf('<a href="#"  onclick="showDetails(%d)">Подробнее</a>', $item['id'])
                : '--';

            $countDetails = $item['count'] !== 0
                ? $item['count']
                : 'Нет в наличии';

            $rowsContent .= sprintf(
                '<tr><td>%s</td><td>%d</td><td>%s</td><td>%s</td>',
                $item['title'], $item['price'], $countDetails, $detailsUrl
            );
        }

        exit($rowsContent);

    default:
        renderError('Страница не найдена');
}
