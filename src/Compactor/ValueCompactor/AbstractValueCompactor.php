<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Hydrator\HydratorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Class AbstractValueTransformer
 * @package Subapp\Pack\Compactor\ValueCompactor
 */
abstract class AbstractValueCompactor implements ValueCompactorInterface
{

    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * AbstractValueCompactor constructor.
     * @param HydratorInterface $hydrator
     */
    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $accessor
     * @return mixed
     */
    public function collapseValue(ColumnInterface $column, AccessorInterface $accessor)
    {
        $value = $accessor->getValue($column->getColumnName());

        return $this->toPlatformValue($value, $column);
    }
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $accessor
     * @return mixed
     */
    public function expandValue(ColumnInterface $column, AccessorInterface $accessor)
    {
        $value = $accessor->getValue($column->getName());
        
        return $this->toPhpValue($value, $column);
    }
    
    /**
     * @param                 $value
     * @param ColumnInterface $column
     * @return mixed
     */
    protected function toPlatformValue($value, ColumnInterface $column)
    {
        return $column->getType()->toPlatformValue($value);
    }
    
    /**
     * @param                 $value
     * @param ColumnInterface $column
     * @return mixed
     */
    protected function toPhpValue($value, ColumnInterface $column)
    {
        return $column->getType()->toPhpValue($value);
    }
    
}