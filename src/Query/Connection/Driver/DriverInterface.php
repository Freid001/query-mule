<?php

namespace QueryMule\Query\Connection\Driver;

use QueryMule\Query\Sql\Sql;
use QueryMule\Query\Sql\Statement\FilterInterface;
use QueryMule\Query\Sql\Statement\SelectInterface;
use QueryMule\Query\Table\TableInterface;

/**
 * Class AdapterInterface
 * @package QueryMule\Adapter
 */
interface DriverInterface
{
    const DRIVER_MYSQL  = 'mysql';
    const DRIVER_PGSQL  = 'pgsql';
    const DRIVER_SQLITE = 'sqlite';

    /**
     * @return FilterInterface
     */
    public function filter() : FilterInterface;

    /**
     * @param array $cols
     * @param TableInterface $table
     * @return SelectInterface
     */
    public function select(array $cols = [],TableInterface $table = null) : SelectInterface;

    /**
     * @param Sql $sql
     */
    public function fetch(Sql $sql);

    /**
     * @param Sql $sql
     */
    public function fetchAll(Sql $sql);
}