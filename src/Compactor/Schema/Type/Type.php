<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class Type
 * @package Subapp\Pack\Compactor\Schema\Type
 */
abstract class Type
{
    
    const TINYINT       = 'tiny_integer';
    const SMALLINT      = 'small_integer';
    const INTEGER       = 'integer';
    const BIGINT        = 'big_integer';
    const CHAR          = 'char';
    const STRING        = 'string';
    const TEXT          = 'text';
    const NUMERIC       = 'numeric';
    const DECIMAL       = 'decimal';
    const BOOLEAN       = 'boolean';
    const FLOAT         = 'float';
    const DOUBLE        = 'double';
    const BINARY        = 'binary';
    const RESOURCE      = 'resource';
    const BLOB          = 'blob';
    const DATE          = 'date';
    const TIME          = 'time';
    const DATETIME      = 'datetime';
    const TIMESTAMP     = 'timestamp';
    const ENUM          = 'enum';
    const ARRAY_LIST    = 'list';
    const BOOLEAN_LIST  = 'boolean_list';
    const DATA_ARRAY    = 'array';
    const OBJECT        = 'object';
    const JSON          = 'json';
    const UUID          = 'uuid';

    const PHP_TYPE_BOOLEAN      = 'boolean';
    const PHP_TYPE_INT          = 'integer';
    const PHP_TYPE_DOUBLE       = 'double';
    const PHP_TYPE_FLOAT        = 'float';
    const PHP_TYPE_RESOURCE     = 'resource';
    const PHP_TYPE_STRING       = 'string';

    protected static $typesMap = [
        self::TINYINT       => IntegerType::class,
        self::SMALLINT      => IntegerType::class,
        self::INTEGER       => IntegerType::class,
        self::BIGINT        => IntegerType::class,
        self::CHAR          => StringType::class,
        self::STRING        => StringType::class,
        self::TEXT          => StringType::class,
        self::NUMERIC       => IntegerType::class,
        self::DECIMAL       => DoubleType::class,
        self::BOOLEAN       => BooleanType::class,
        self::FLOAT         => FloatType::class,
        self::DOUBLE        => DoubleType::class,
        self::BINARY        => ResourceType::class,
        self::BLOB          => ResourceType::class,
        self::RESOURCE      => ResourceStringType::class,
        self::DATE          => DateType::class,
        self::TIME          => TimeType::class,
        self::DATETIME      => DatetimeType::class,
        self::TIMESTAMP     => TimestampType::class,
        self::ENUM          => EnumType::class,
        self::DATA_ARRAY    => ArrayType::class,
        self::ARRAY_LIST    => ArrayListType::class,
        self::BOOLEAN_LIST  => BooleanListType::class,
        self::OBJECT        => ObjectType::class,
        self::JSON          => JsonType::class,
        self::UUID          => StringType::class,
    ];

    protected static $phpNamesMap = [
        self::TINYINT       => 'boolean',
        self::SMALLINT      => 'integer',
        self::INTEGER       => 'integer',
        self::BIGINT        => 'integer',
        self::CHAR          => 'string',
        self::STRING        => 'string',
        self::TEXT          => 'string',
        self::NUMERIC       => 'integer',
        self::DECIMAL       => 'double',
        self::BOOLEAN       => 'boolean',
        self::FLOAT         => 'float',
        self::DOUBLE        => 'double',
        self::BINARY        => 'resource',
        self::BLOB          => 'resource',
        self::RESOURCE      => 'resource',
        self::DATE          => 'string',
        self::TIME          => 'string',
        self::TIMESTAMP     => 'integer',
        self::ENUM          => 'string',
        self::DATA_ARRAY    => 'array',
        self::ARRAY_LIST    => 'array',
        self::BOOLEAN_LIST  => 'integer',
        self::OBJECT        => 'object',
        self::JSON          => 'string',
        self::DATETIME      => 'string',
        self::UUID          => 'string',
    ];
    
    /**
     * @var int
     */
    protected $length = 0;
    
    /**
     * @var int
     */
    protected $precision = 0;
    
    /**
     * @var null
     */
    protected $extra = null;
    
    /**
     * @param array $parameters
     *
     * @return Type
     */
    public static function __set_state(array $parameters = [])
    {
        /** @var Type $instance */
        $reflection = new \ReflectionClass(static::class);
        $instance = $reflection->newInstance();
        
        foreach ($parameters as $name => $value) {
            if ($reflection->hasProperty($name) && $reflection->getProperty($name)->isProtected()) {
                $property = $reflection->getProperty($name);
                $property->setAccessible(true);
                $property->setValue($instance, $value);
            }
        }
        
        return $instance;
    }
    
    /**
     * @param $type
     *
     * @return $this
     * @throws \UnexpectedValueException
     */
    public static function retrieveTypeObject($type)
    {
        if (!array_key_exists($type, static::$typesMap)) {
            throw new \UnexpectedValueException(sprintf('Unable create column type object with name "%s" because cannot find it', $type));
        }
        
        $class = static::$typesMap[$type];
        
        return new $class($type);
    }
    
    /**
     * @param string      $name
     * @param string      $class
     * @param string|null $phpTypeName
     *
     * @throws \UnexpectedValueException
     */
    public static function registerType($name, $class, $phpTypeName)
    {
        if (isset(static::$typesMap[$name])) {
            throw new \UnexpectedValueException(sprintf('Cannot register new type with name "%s" because it already registered', $name));
        }
        
        static::overrideType($name, $class, $phpTypeName);
    }
    
    /**
     * @param string      $name
     * @param string      $class
     * @param string|null $phpTypeName
     *
     * @throws \UnexpectedValueException
     */
    public static function overrideType($name, $class, $phpTypeName = null)
    {
        if (!is_subclass_of($class, static::class)) {
            throw new \UnexpectedValueException(sprintf('Class %s should been subclass of %s'), $class, static::class);
        }
        
        if (null !== $phpTypeName) {
            static::$phpNamesMap[$name] = $phpTypeName;
        }
        
        static::$typesMap[$name] = $class;
    }

    /**
     * @return boolean
     */
    public function isString()
    {
        return $this->getPhpName() === static::PHP_TYPE_STRING;
    }

    /**
     * @return boolean
     */
    public function isInt()
    {
        return $this->getPhpName() === static::PHP_TYPE_INT;
    }

    /**
     * @return boolean
     */
    public function isDouble()
    {
        return $this->getPhpName() === static::PHP_TYPE_DOUBLE;
    }

    /**
     * @return boolean
     */
    public function isFloat()
    {
        return $this->getPhpName() === static::PHP_TYPE_FLOAT;
    }

    /**
     * @return boolean
     */
    public function isResource()
    {
        return $this->getPhpName() === static::PHP_TYPE_RESOURCE;
    }

    /**
     * @return boolean
     */
    public function isBoolean()
    {
        return $this->getPhpName() === static::PHP_TYPE_BOOLEAN;
    }
    
    /**
     * @return string
     */
    public function getPhpName()
    {
        return static::$phpNamesMap[$this->getName()];
    }
    
    /**
     * @return string
     */
    abstract public function getName();
    
    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }
    
    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }
    
    /**
     * @return int
     */
    public function getPrecision()
    {
        return $this->precision;
    }
    
    /**
     * @param int $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }
    
    /**
     * @return null
     */
    public function getExtra()
    {
        return $this->extra;
    }
    
    /**
     * @param null $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
    
    /**
     * @param $value
     *
     * @return mixed
     */
    abstract public function toPhpValue($value);
    
    /**
     * @param $value
     *
     * @return mixed
     */
    abstract public function toPlatformValue($value);
    
}