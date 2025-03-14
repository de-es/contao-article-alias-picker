<?php

declare(strict_types=1);

/*
 * This file is part of the Contao Article Alias Picker extension.
 *
 * (c) [de][es] web solutions
 *
 * @license LGPL-3.0-or-later
 */

namespace DeEs\ContaoArticleAliasPicker\InsertTag;

use Contao\ArticleModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsInsertTag;
use Contao\CoreBundle\InsertTag\Exception\InvalidInsertTagException;
use Contao\CoreBundle\InsertTag\InsertTagResult;
use Contao\CoreBundle\InsertTag\OutputType;
use Contao\CoreBundle\InsertTag\ResolvedInsertTag;
use Contao\CoreBundle\InsertTag\Resolver\InsertTagResolverNestedResolvedInterface;

#[AsInsertTag('article_alias')]
class ArticleAliasInsertTag implements InsertTagResolverNestedResolvedInterface
{
    public function __invoke(ResolvedInsertTag $insertTag): InsertTagResult
    {
        if (null === $insertTag->getParameters()->get(0)) {
            throw new InvalidInsertTagException('Missing parameters for insert tag.');
        }

        if (!$objArticle = ArticleModel::findById($insertTag->getParameters()->get(0))) {
            return new InsertTagResult('');
        }

        $alias = $objArticle->alias;

        return new InsertTagResult('#'.$alias, OutputType::text);
    }
}
