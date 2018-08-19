<?php

namespace App\Aspects\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * Class UseTransaction
 * @Annotation
 * @Target("METHOD")
 * @package App\Aspects\Annotations
 */
class UseTransaction extends Annotation
{
    /**
     * connection to begin transaction
     *
     * @var string
     */
    public $connection = 'mysql';
}