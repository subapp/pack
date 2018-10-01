<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\SchemaKeeperInterface;

/**
 * Class SchemaColumn
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class SchemaColumn extends AbstractColumnLength implements SchemaKeeperInterface
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;

    /**
     * @var string
     */
    private $separator;

    /**
     * @var boolean
     */
    private $isInitialized = false;

    /**
     * @inheritDoc
     */
    public function __construct($name, $column, SchemaInterface $schema, $separator, $position)
    {
        parent::__construct($name, $column, $schema->getByteSize(), $position);

        $this->schema = $schema;
        $this->separator = $separator;
    }

    /**
     * @return void
     */
    private function initialize()
    {
        if (!$this->isInitialized) {

            foreach ($this->schema->getColumns() as $column) {
                $isStringType = (null !== $column->getTypeName() && $column->getType()->isString());

                if ($isStringType && $column->getLength() === null) {
                    throw new \UnexpectedValueException('Infinity length not allowed for inner columns');
                }

                $column->setName(sprintf('%s%s%s', $this->getName(), $this->getSeparator(), $column->getName()));

                if ($column instanceof static) {
                    $column->initialize();
                }
            }

            $this->isInitialized = true;
        }
    }

    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return null;
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        $this->initialize();

        return $this->schema;
    }

    /**
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }

    /**
     * @param string $separator
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;
    }
    
}