<?php 
    require './components/header.php';
    try{
        $sql = "select name, email, body from feedback;";

        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        $feedbacks = $statement->fetchAll();
        echo "<ul>";
        foreach($feedbacks as $feedback){
            $name = $feedback['name'] ?? '';
            $email = $feedback['email'] ?? '';
            $body = $feedback['body'] ?? '';
            echo "<li class='bg-amber-800 text-white my-2 p-2'>$name  $email $body</li>";
        }
        echo "</ul>";

    }catch(Exception $e){
        throw new Exception($e);
    }

    include './components/footer.php';
?>