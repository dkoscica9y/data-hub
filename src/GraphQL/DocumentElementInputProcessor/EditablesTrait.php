<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\DataHubBundle\GraphQL\DocumentElementInputProcessor;

use Pimcore\Model\Document\PageSnippet;
use Pimcore\Model\Document\Editable;

trait EditablesTrait
{

    public function cleanEditables(PageSnippet $document, $editableName)
    {
        $editables = $document->getEditables();

        /** @var Editable $editable */
        foreach ($editables as $editable) {
            $name = $editable->getName();
            if ($name === $editableName || strpos($name, $editableName . ".") === 0) {
                $document->removeEditable($name);
            }
        }
    }
}

