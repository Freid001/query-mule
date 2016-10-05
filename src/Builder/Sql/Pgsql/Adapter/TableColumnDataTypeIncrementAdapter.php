<?php namespace freidcreations\QueryMule\Builder\Sql\Pgsql\Adapter;
use freidcreations\QueryMule\Builder\Sql\Common\TableColumnDataTypeAttribute;
use freidcreations\QueryMule\Query\Sql\Common\TableColumnDataTypeAdapterInterface;
use freidcreations\QueryMule\Builder\Sql\Common\TableColumnDefinition;
use freidcreations\QueryMule\Query\Sql\Common\TableColumnDataTypeAttributeInterface;

/**
 * Class TableColumnDataTypeIncrementAdapter
 * @package freidcreations\QueryMule\Builder\Sql\Pgsql\Adapter
 */
class TableColumnDataTypeIncrementAdapter implements TableColumnDataTypeAdapterInterface, TableColumnDataTypeAttributeInterface
{
    const SERIAL = 'SERIAL';

    /**
     * @var TableColumnDataTypeAttribute
     */
    private $column;

    /**
     * @param TableColumnDataTypeAttribute $column
     * @return void
     */
    public function setTableColumnDataTypeAttribute(TableColumnDataTypeAttribute $column)
    {
        $this->column = $column;
    }

    /**
     * @param $parameter
     */
    public function parameter($parameter){}

    /**
     * @param $after
     */
    public function after($after){}

    /**
     * @param $key
     * @return bool
     */
    public function hasAttribute($key)
    {
        if(isset($this->column->{$key})){
            return true;
        }
        return false;
    }

    /**
     * @param $key
     * @return null
     */
    public function __get($key)
    {
        $value = null;
        switch($key){
            case 'data_type':
                $value = self::SERIAL;
                break;
            case 'parameter':
                $value = null;
                break;
            case 'after':
                $value = null;
                break;
            default:
                $value = $this->column->{$key};
        }

        return $value;
    }

    /**
     * @return TableColumnDefinition
     */
    public function definition() : TableColumnDefinition
    {
        return $this->column->definition();
    }
}