<?php

namespace App\Entity;

interface ProductInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @return int
     */
    public function getQuantity(): int;

    /**
     * @return int
     */
    public function getCountReviews(): int;

    /**
     * @return int
     */
    public function getSold(): int;
}
