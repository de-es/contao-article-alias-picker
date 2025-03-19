<?php

declare(strict_types=1);

/*
 * This file is part of the Contao Article Alias Picker extension.
 *
 * (c) [de][es] web solutions
 *
 * @license LGPL-3.0-or-later
 */

namespace DeEs\ContaoArticleAliasPicker\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;

#[AsCallback(table: 'tl_page', target: 'config.onload')]
#[AsCallback(table: 'tl_files', target: 'config.onload')]
#[AsCallback(table: 'tl_news_archive', target: 'config.onload')]
#[AsCallback(table: 'tl_calendar', target: 'config.onload')]
#[AsCallback(table: 'tl_faq_category', target: 'config.onload')]
#[AsCallback(table: 'tl_article', target: 'config.onload')]
class ConfigOnLoadCallbackListener
{
    public function __invoke(): void
    {
        $GLOBALS['TL_CSS'][] = 'bundles/contaoarticlealiaspicker/backend.css';
    }
}
