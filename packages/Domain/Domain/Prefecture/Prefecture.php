<?php

namespace packages\Domain\Domain\Prefecture;

class Prefecture
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /**
     * Prefecture constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     * @return Prefecture
     */
    public static function of(string $name): self
    {
        return new self($name);
    }
}
