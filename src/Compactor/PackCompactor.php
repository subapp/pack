<?php

namespace Subapp\Pack\Compactor;

use Subapp\Pack\Compactor\Builder\PackerBuilder;
use Subapp\Pack\Compactor\Collection\Values;
use Subapp\Pack\Compactor\Collection\ValuesInterface;
use Subapp\Pack\Compactor\Packer\PackerInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class PackCompactor
 * @package Subapp\Pack\Compactor
 */
class PackCompactor implements CompactorInterface
{

    /**
     * @var PackerInterface
     */
    private $packer;

    /**
     * ReduceCompactor constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema)
    {
        $builder = new PackerBuilder();
        $this->packer = $builder->getPacker($schema);
    }

    /**
     * @inheritDoc
     */
    public function compact($values)
    {
        $values = ($values instanceof ValuesInterface) ? $values : new Values($values);

        return $this->packer->pack($values);
    }

    /**
     * @inheritDoc
     */
    public function extend($compacted)
    {
        $values = new Values();

        $this->packer->unpack($compacted, $values);

        return $values;
    }

    /**
     * @return PackerInterface
     */
    public function getPacker()
    {
        return $this->packer;
    }

}