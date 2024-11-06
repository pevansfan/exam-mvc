<?php
require_once 'models/Database.php';

class Blog extends Database
{
    public $id;
    public $title;
    public $dateCreated;
    public $idUser;


    public function getAllBlogs()
    {
        $sql = 'SELECT * FROM blogs';
        return $this->db->query($sql)->fetchAll();
    }

    public function addBlog(string $title, int $idUser)
    {
        $dateCreated = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO blogs (title, created_at, id_users) VALUES (:title, :created_at, :id_users)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':created_at' => $dateCreated,
            ':id_users' => $idUser,
        ]);
    }
    public function deleteBlogByUser(int $id, int $idUser)
    {
        $sql = 'DELETE FROM blogs WHERE id = :id AND id_users = :id_users';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':id_users' => $idUser,
        ]);
    }

    public function deleteBlog(int $id)
    {
        $sql = 'DELETE FROM blogs WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function updateTitleBlog(int $id, string $title)
    {   
        $sql = "UPDATE blogs SET title = :newTtile  WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':newTitle' => $title,
            ':id' => $id
        ]);

        return $stmt->rowCount() > 0;
    }
}


