<?php

namespace App\Aspects;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Around;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;

/**
 * Class UseTransactionAspect
 * @package App\Aspects
 */
class UseTransactionAspect implements Aspect
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param MethodInvocation $invocation
     * @Around("@execution(App\Aspects\Annotations\UseTransaction)")
     * @return mixed Executed result
     * @throws \Exception
     */
    public function aroundMethod(MethodInvocation $invocation)
    {
        $connectionName = $invocation->getMethod()
            ->getAnnotation('App\Aspects\Annotations\UseTransaction')
            ->connection;

        try
        {
            DB::connection($connectionName)->beginTransaction();

            $result = $invocation->proceed();

            DB::connection($connectionName)->commit();

            return $result;
        }
        catch (\Exception $exception)
        {
            $this->logger->error($exception->getMessage());

            DB::connection($connectionName)->rollBack();

            throw $exception;
        }
    }
}