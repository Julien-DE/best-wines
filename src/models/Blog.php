<?php

namespace App\Models;

use Core\Model;

class Blog extends Model
{
    private int $id;
    private string $title;
    private string $content;
    private string $date;
    private string $photo_article;
    private int $id_user;
    protected string $table_name = "blog";

    /**
     * Get the value of id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *  @param string $title
     * @return  void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Get the value of content
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     * @param string $content
     * @return  void
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Get the value of date
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     * @param string $date
     * @return  self
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * Get the value of photo_article
     * @return string
     */
    public function getPhoto_article(): string
    {
        return $this->photo_article;
    }

    /**
     * Set the value of photo_article
     * @param string $photo_article
     * @return  void
     */
    public function setPhoto_article(string $photo_article): void
    {
        $this->photo_article = $photo_article;
    }

    /**
     * Get the value of id_user
     * @return int
     */
    public function getId_user(): int
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     * @param int $id_user
     *
     * @return  void
     */
    public function setId_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function insertArticle(): int|false
    {
        $stmt = $this->pdo->prepare("INSERT INTO article (`title`, `content`, `photo_article`) VALUES (:title, :content,:photo_article)");

        $stmt->execute([
            "title" => $this->title,
            "content" => $this->content,
            // "date" => $this->date,
            // "id_user" => $this->id_user,
            "photo_article" => $this->photo_article,
        ]);

        return $this->pdo->lastInsertId();
    }
}
