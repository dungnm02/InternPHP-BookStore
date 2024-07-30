<?php

namespace App\DTOs;

class BookDTO
{
    private $id;
    private $title;
    private $coverImage; // Đường dẫn đến ảnh bìa của sách
    private $authorsName; // Tên của tác giả, nếu có nhiều tác giả thì cách nhau bởi dấu phẩy
    private $lowestPrice; // Giá của format có giá thấp nhất đã apply discount
    private $highestPrice; // Giá của format có giá cao nhất đã apply discount

    public function __construct($id, $title, $coverImage, $authors, $lowestPrice, $highestPrice)
    {
        $this->id = $id;
        $this->title = $title;
        $this->coverImage = $coverImage;
        $this->authorsName = "";
        foreach ($authors as $author) {
            $this->authorsName .= $author->name . ", ";
        }
        $this->lowestPrice = $lowestPrice;
        $this->highestPrice = $highestPrice;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCoverImage()
    {
        return $this->coverImage;
    }

    /**
     * @param mixed $coverImage
     */
    public function setCoverImage($coverImage): void
    {
        $this->coverImage = $coverImage;
    }

    public function getAuthorsName(): string
    {
        return $this->authorsName;
    }

    public function setAuthorsName(string $authorsName): void
    {
        $this->authorsName = $authorsName;
    }

    /**
     * @return mixed
     */
    public function getLowestPrice()
    {
        return $this->lowestPrice;
    }

    /**
     * @param mixed $lowestPrice
     */
    public function setLowestPrice($lowestPrice): void
    {
        $this->lowestPrice = $lowestPrice;
    }

    /**
     * @return mixed
     */
    public function getHighestPrice()
    {
        return $this->highestPrice;
    }

    /**
     * @param mixed $highestPrice
     */
    public function setHighestPrice($highestPrice): void
    {
        $this->highestPrice = $highestPrice;
    }

}
