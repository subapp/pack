<?php

namespace Subapp\Pack\Tests;

use PHPUnit\Framework\TestCase;
use Subapp\Pack\Common\Setup\SetupInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Tests\Mock\Setup\SetupVersion10001;

abstract class AbstractBoot extends TestCase
{

    /**
     * @var SetupInterface
     */
    protected $setup;

    /**
     * @var ProcessHandlerCollection
     */
    protected $handler;

    /**
     * @var SchemaInterface
     */
    protected $schema;

    /**
     * @inheritDoc
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->setup = $this->createSetupObject();
        $this->handler = new ProcessHandlerCollection();
        $this->schema = $this->setup->getSchema();

        $this->setup->setup($this->handler);
    }

    /**
     * @return SetupVersion10001
     */
    private function createSetupObject()
    {
        return new SetupVersion10001();
    }

    /**
     * @return SetupInterface
     */
    public function getSetup()
    {
        return $this->setup;
    }

    /**
     * @return ProcessHandlerCollection
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }

}