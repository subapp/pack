<?php

namespace Subapp\Pack\Tests;

use PHPUnit\Framework\TestCase;
use Subapp\Pack\Common\Setup\SetupInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Tests\Mock\Setup\SetupWithMinProcessors;
use Subapp\Pack\Tests\Mock\Setup\SetupOptimal;
use Subapp\Pack\Tests\Mock\Setup\SetupWithMaxProcessors;

abstract class AbstractBoot extends TestCase
{

    /**
     * @var ProcessHandlerCollection
     */
    protected $handlerA;
    
    /**
     * @var ProcessHandlerCollection
     */
    protected $handlerB;
    
    /**
     * @var ProcessHandlerCollection
     */
    protected $handlerC;

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

        $setupA = new SetupWithMinProcessors();
        $setupB = new SetupOptimal();
        $setupC = new SetupWithMaxProcessors();
        
        $this->schema = $setupA->getSchema();
        
        $this->handlerA = new ProcessHandlerCollection();
        $this->handlerA->setup($setupA);
        
        $this->handlerB = new ProcessHandlerCollection();
        $this->handlerB->setup($setupB);
        
        $this->handlerC = new ProcessHandlerCollection();
        $this->handlerC->setup($setupC);
    }

    /**
     * @return ProcessHandlerCollection
     */
    public function getHandlerA()
    {
        return $this->handlerA;
    }
    
    /**
     * @return ProcessHandlerCollection
     */
    public function getHandlerB()
    {
        return $this->handlerB;
    }
    
    /**
     * @return ProcessHandlerCollection
     */
    public function getHandlerC()
    {
        return $this->handlerC;
    }

    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }

}