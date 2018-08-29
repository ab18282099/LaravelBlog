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

    /**
     * UseTransactionAspect constructor.
     * @param LoggerInterface $logger
     */
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
        // 取得指定的連線
        $connectionName = $invocation->getMethod()
            ->getAnnotation('App\Aspects\Annotations\UseTransaction')
            ->connection;

        try
        {
            // 開啟交易
            DB::connection($connectionName)->beginTransaction();

            // invoke
            $result = $invocation->proceed();

            // 完成後 commit
            DB::connection($connectionName)->commit();

            return $result;
        }
        catch (\Exception $exception)
        {
            // 紀錄錯誤並 rollback
            $this->logger->error($exception->getMessage());
            DB::connection($connectionName)->rollBack();

            throw $exception;
        }
    }
}