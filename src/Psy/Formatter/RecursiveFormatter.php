<?php

/*
 * This file is part of PsySH
 *
 * (c) 2012 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Formatter;

use Psy\Formatter\ArrayFormatter;
use Psy\Formatter\ObjectFormatter;

/**
 * A pretty-printer for recursive objects references..
 */
abstract class RecursiveFormatter
{
    public static function format($obj)
    {
        throw new \InvalidArgumentException('format should be implemented by extending classes.');
    }

    public static function formatRef($obj)
    {
        throw new \InvalidArgumentException('formatRef should be implemented by extending classes.');
    }

    public static function formatValue($val)
    {
        if (is_object($val)) {
            return ObjectFormatter::formatRef($val);
        } elseif (is_array($val)) {
            return ArrayFormatter::formatRef($val);
        } else {
            return json_encode($val);
        }
    }
}