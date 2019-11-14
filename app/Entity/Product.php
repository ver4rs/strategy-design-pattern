<?php

namespace App\Entity;

class Product implements ProductInterface
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var string $description */
    private $description;

    /** @var int $price */
    private $price;

    /** @var int $quantity */
    private $quantity;

    /** @var int $countReviews */
    private $countReviews;

    /** @var int $sold */
    private $sold;

    /**
     * @param int    $id
     * @param string $name
     * @param string $description
     * @param int    $price
     * @param int    $quantity
     * @param int    $countReviews
     * @param int    $sold
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        int $price,
        int $quantity,
        int $countReviews,
        int $sold
    ) {
        $this->id           = $id;
        $this->name         = $name;
        $this->description  = $description;
        $this->price        = $price;
        $this->quantity     = $quantity;
        $this->countReviews = $countReviews;
        $this->sold         = $sold;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getCountReviews(): int
    {
        return $this->countReviews;
    }

    /**
     * @return int
     */
    public function getSold(): int
    {
        return $this->sold;
    }
}
