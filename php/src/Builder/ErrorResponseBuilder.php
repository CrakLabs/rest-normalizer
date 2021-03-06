<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Builder\Data\ErrorDataBuilder;
use Crak\Component\RestNormalizer\Data;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Response;

/**
 * Class ErrorResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class ErrorResponseBuilder extends AbstractResponseBuilder implements ErrorResponseBuilderInterface
{
    const CLASS_NAME = __CLASS__;

    use ErrorResponseBuilderTrait;

    /**
     * @param ErrorDataBuilder $dataBuilder
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     * @param HttpErrorCode $httpErrorCode
     */
    public function __construct(
        ErrorDataBuilder $dataBuilder,
        NonEmptyString $apiVersion,
        HttpMethod $httpMethod,
        HttpErrorCode $httpErrorCode
    )
    {
        parent::__construct($dataBuilder, $apiVersion, $httpMethod);
        $this->initErrorTrait($httpErrorCode);
    }

    /**
     * @inheritdoc
     * @throws ResponseBuilderException
     */
    public function build()
    {
        $response = Response::create(
            $this->getHttpMethod(),
            $this->getApiVersion(),
            true,
            $this->httpErrorCode,
            $this->errors,
            $this->getParameters(),
            new Data()
        );

        return $this->getDataBuilder()->build($response);
    }

    /**
     * @param ErrorDataBuilder $dataBuilder
     * @param string $apiVersion
     * @param HttpMethod $httpMethod
     * @param HttpErrorCode $httpErrorCode
     * @return ErrorResponseBuilder
     */
    public static function create(ErrorDataBuilder $dataBuilder,
                                  $apiVersion,
                                  HttpMethod $httpMethod,
                                  HttpErrorCode $httpErrorCode
    )
    {
        return new self(
            $dataBuilder,
            new NonEmptyString($apiVersion),
            $httpMethod,
            $httpErrorCode
        );
    }
}
