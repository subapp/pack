<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Accessor\ArrayAccessor;
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
        $value = $this->getValue($column->getColumnName(), $accessor);

        return $this->toPlatformValue($value, $column);
    }
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $accessor
     * @return mixed
     */
    public function expandValue(ColumnInterface $column, AccessorInterface $accessor)
    {
        $value = $this->getValue($column->getName(), $accessor);
        
        return $this->toPhpValue($value, $column);
    }
    
    /**
     * @param                   $key
     * @param AccessorInterface $accessor
     * @return int|string|array
     * @throws \UnexpectedValueException
     */
    protected function getValue($key, AccessorInterface $accessor)
    {
        if (false === $accessor->hasValue($key)) {
            throw new \UnexpectedValueException(sprintf('Value for key (%s) does not exist in input accessor', $key));
        }
        
        return $accessor->getValue($key);
    }

    /**
     * @param                   $key
     * @param $value
     * @param AccessorInterface $accessor
     * @return int|string|array
     */
    protected function setValue($key, $value, AccessorInterface $accessor)
    {
        return $accessor->setValue($key, $value);
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
    
    /**
     * @param array $keys
     * @param array $values
     * @return AccessorInterface
     * @throws \UnexpectedValueException
     */
    protected function composeArrayAccessor(array $keys, array $values)
    {
        $hydrator = $this->getHydrator();

        if (($countValues = count($values)) !== ($countKeys = count($keys))) {
            throw new \UnexpectedValueException(sprintf('Unexpected count of pairs for keys (%d) and values (%s). Expected: (%s)',
                $countKeys, $countValues, implode(', ', $keys)));
        }
        
        return current($hydrator->toAccessor(array_combine($keys, $values)));
    }
    
}