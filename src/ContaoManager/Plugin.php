<?php

declare(strict_types=1);

/*
 * This file is part of the Contao Article Alias Picker extension.
 *
 * (c) [de][es] web solutions
 *
 * @license LGPL-3.0-or-later
 */

namespace DeEs\ContaoArticleAliasPicker\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use DeEs\ContaoArticleAliasPicker\ContaoArticleAliasPickerBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoArticleAliasPickerBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
