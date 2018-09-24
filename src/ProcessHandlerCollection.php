<?php

namespace Subapp\Pack;

use Subapp\Collection\Collection;
use Subapp\Pack\Common\Setup\SetupInterface;
use Subapp\Pack\ProcessHandler\ProcessHandlerFactory;
use Subapp\Pack\ProcessHandler\ProcessHandlerInterface;

/**
 * Class ProcessHandlerCollection
 * @package Subapp\Pack
 */
class ProcessHandlerCollection implements ProcessHandlerInterface
{

    /**
     * @var Collection|ProcessHandlerInterface[]
     */
    private $collection;

    /**
     * @var ProcessHandlerFactory
     */
    private $factory;

    /**
     * Facade constructor.
     */
    public function __construct()
    {
        $this->collection = new Collection([], ProcessHandlerInterface::class);
        $this->factory = new ProcessHandlerFactory();
    }

    /**
     * @param SetupInterface $setup
     */
    public function setup(SetupInterface $setup)
    {
        $setup->setup($this);
    }

    /**
     * @param $process
     */
    public function addProcess($process)
    {
        $this->addProcessHandler($this->factory->getProcessHandler($process));
    }

    /**
     * @param ProcessHandlerInterface $handler
     */
    public function addProcessHandler(ProcessHandlerInterface $handler)
    {
        $this->collection->append($handler);
    }

    /**
     * @inheritDoc
     */
    public function serialize($values)
    {
        $handlers = $this->getHandlers();

        for ($index = 0, $length = count($handlers); $index < $length; $index++) {
            $handlers[$index]->serialize($values);
        }

        return $values;
    }

    /**
     * @inheritDoc
     */
    public function unserialize($values)
    {
        $handlers = $this->getHandlers();

        for ($index = count($handlers); $index > 0; $index--) {
            $handlers[$index]->unserialize($values);
        }

        return $values;
    }

    /**
     * @return array|ProcessHandlerInterface[]
     */
    public function getHandlers()
    {
        return $this->collection->toArray();
    }


}