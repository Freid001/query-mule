<?php

declare(strict_types=1);

namespace Redstraw\Hooch\Query\Common\Statement;


use Redstraw\Hooch\Query\Connection\Driver\DriverInterface;
use Redstraw\Hooch\Query\Sql\Statement\OnFilterInterface;

/**
 * Trait HasOnFilter
 * @package Redstraw\Hooch\Query\Common\Statement
 */
trait HasOnFilter
{
    /**
     * @return OnFilterInterface|null
     */
    public function onFilter(): ?OnFilterInterface
    {
        if($this instanceof DriverInterface){
            switch($this->driverName()){
                case DriverInterface::DRIVER_MYSQL:
                    return new \Redstraw\Hooch\Builder\Sql\Mysql\OnFilter($this->query(), $this->operator());

                case DriverInterface::DRIVER_PGSQL:
                    break;

                case DriverInterface::DRIVER_SQLITE:
                    break;

                default:
                    $this->logger()->error(sprintf("Driver: %u not supported.", $this->driverName()));
            }
        }

        return null;
    }
}