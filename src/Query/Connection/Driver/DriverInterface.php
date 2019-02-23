<?php

namespace Redstraw\Hooch\Query\Connection\Driver;

use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use Redstraw\Hooch\Query\Common\Operator\Operator;
use Redstraw\Hooch\Query\Sql\Sql;
use Redstraw\Hooch\Query\Sql\Statement\FilterInterface;
use Redstraw\Hooch\Query\Sql\Statement\OnFilterInterface;
use Redstraw\Hooch\Query\Sql\Statement\SelectInterface;
use Redstraw\Hooch\Query\Sql\Statement\UpdateInterface;

/**
 * Class AdapterInterface
 * @package Redstraw\Hooch\Query\Connection\Driver
 */
interface DriverInterface
{
    const DRIVER_MYSQL  = 'mysql';
    const DRIVER_PGSQL  = 'pgsql';
    const DRIVER_SQLITE = 'sqlite';
    const FETCH = 'fetch';
    const FETCH_ALL = 'fetchAll';

    /**
     * @return FilterInterface|null
     */
    public function filter() : ?FilterInterface;

    /**
     * @return OnFilterInterface|null
     */
    public function onFilter() : ?OnFilterInterface;

    /**
     * @return SelectInterface|null
     */
    public function select() : ?SelectInterface;

    /**
     * @return UpdateInterface|null
     */
    public function update() : ?UpdateInterface;

    /**
     * @param CacheInterface $cache
     * @param int|null $ttl
     * @return DriverInterface|null
     */
    public function cache(CacheInterface $cache, ?int $ttl = null) : ?DriverInterface;

    /**
     * @param Sql $sql
     * @return mixed
     */
    public function fetch(Sql $sql);

    /**
     * @param Sql $sql
     * @return mixed
     */
    public function fetchAll(Sql $sql);

    /**
     * @return string
     */
    public function driverName(): string;

    /**
     * @return LoggerInterface
     */
    public function logger(): LoggerInterface;

    /**
     * @return Operator
     */
    public function operator(): Operator;

    /**
     * @param Sql $sql
     * @param string $method
     * @return array|mixed|null
     */
    public function execute(Sql $sql, string $method);
}
