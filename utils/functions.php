<?php 

function db_connect()
{
    try {
        $dsn = new PDO("mysql:host=localhost;dbname=todolist", 'root', 'root', [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
        return $dsn;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

function getAllTasks()
{
    try {
        $db = db_connect();
        $sql = 'SELECT * FROM tasks';
        $stmt = $db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

function getAllCategories()
{
    try {
        $db = db_connect();
        $sql = 'SELECT id, name 
                FROM category';
        $stmt = $db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

function getCategoryName($taskId)
{
    try {
        $db = db_connect();
        $sql = 'SELECT category.name AS category_name 
                FROM category 
                JOIN tasks ON tasks.id_category = category.id 
                WHERE tasks.id = :taskId';
        $stmt = $db->prepare($sql);
        $stmt->execute(['taskId' => $taskId]);

        return $stmt->fetch(PDO::FETCH_ASSOC)['category_name'] ?? 'No Category';
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

function getColorCategory($taskId)
{
    try {
        $db = db_connect();
        $sql = 'SELECT category.color AS category_color 
                FROM category 
                JOIN tasks ON tasks.id_category = category.id 
                WHERE tasks.id = :taskId';
        $stmt = $db->prepare($sql);
        $stmt->execute(['taskId' => $taskId]);

        return $stmt->fetch(PDO::FETCH_ASSOC)['category_color'] ?? 'No Category';
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

function search($searchTerm)
{
    try {
        $db = db_connect();
        $sql = 'SELECT tasks.id, tasks.name, category.name AS category_name 
                FROM tasks 
                JOIN category ON tasks.id_category = category.id 
                WHERE tasks.name LIKE :searchTerm 
                   OR category.name LIKE :searchTerm';
        $stmt = $db->prepare($sql);
        $stmt->execute(['searchTerm' => '%' . $searchTerm . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

function addTask($taskName, $categoryId)
{
    try {
        $db = db_connect();
        $sql = 'INSERT INTO tasks (name, computed, id_category) VALUES (:taskName, 0, :categoryId)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':taskName', $taskName);
        $stmt->bindValue(':categoryId', $categoryId);

        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Une erreur s'est produite lors de l'insertion des données.";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function deleteTask($id)
{
    try {
        $db = db_connect();
        $stmt = $db->prepare('DELETE FROM tasks WHERE id = :id');
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

function toggleTaskStatus($taskId, $status)
{
    try {
        $db = db_connect();
        $sql = 'UPDATE tasks SET computed = :status WHERE id = :taskId';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'status' => $status,
            'taskId' => $taskId
        ]);
    } catch (PDOException $ex) {
        var_dump($ex);
        die();
    }
}

?>