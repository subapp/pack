<?php

namespace Subapp\Pack\Decorator;

use Subapp\Pack\Compactor\CompactorInterface;

/**
 * Class CompactorProcessHandler
 * @package Subapp\Pack\Decorator
 */
class CompactorProcessHandler implements ProcessHandlerInterface
{

    /**
     * @var CompactorInterface
     */
    private $compactor;

    /**
     * CompactorProcessHandler constructor.
     * @param CompactorInterface $compactor
     */
    public function __construct(CompactorInterface $compactor)
    {
        $this->compactor = $compactor;
    }

    /**
     * @inheritDoc
     */
    public function serialize($values)
    {
        return $this->compactor->compact($values);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($values)
    {
        return $this->compactor->extend($values);
    }

}