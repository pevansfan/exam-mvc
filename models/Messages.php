<?php
require_once 'models/Database.php';

class Message extends Database
{
    public $id;
    public $text;
    public $dateCreated;
    public $idUser;
    public $idBlog;


    public function getAllMessagesByBlog(int $idBlog) {
        $sql = 'SELECT * FROM messages WHERE id_blogs = :id_blog';
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindParam(':id_blogs', $idBlog, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMessageInBlog(string $text, string $dateCreated, int $idUser, int $idBlog)
    {
        $sql = 'INSERT INTO tasks (text, created_at, id_users, id_blogs) VALUES (:text, :created_at, :id_users, :id_blogs)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':text' => $text,
            ':dateCreated' => $dateCreated,
            ':id_users' => $idUser,
            ':id_blogs' => $idBlog,
        ]);
    }
}
