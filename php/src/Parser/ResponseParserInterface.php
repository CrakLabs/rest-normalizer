<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Parser;

use Crak\Component\RestNormalizer\Exception\ResponseParserException;
use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Interface ResponseParserInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ResponseParserInterface
{
    const INTERFACE_NAME = __CLASS__;

    /**
     * @param string $json
     * @return ResponseInterface
     * @throws ResponseParserException
     */
    public function parse($json);
} 
