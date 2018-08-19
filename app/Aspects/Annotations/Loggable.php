<?php
/**
 * Created by PhpStorm.
 * User: Sheng-Wei Lin
 * Date: 2018/8/2
 * Time: 下午 04:03
 */

namespace App\Aspects\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
class Loggable extends Annotation
{
}