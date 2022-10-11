<?php require 'components/header.php';
    $name = $email = $body = '';
    $name_error = $email_error = $body_error = '';
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $name_error = 'name is required';
        }else{
            $name = $_POST['name'];
        }
        if(empty($_POST['email'])){
            $email_error = 'email is required';
        }else{
            $email = $_POST['email'];
        }
        if(empty($_POST['body'])){
            $body_error = 'body is required';
        }else{
            $body = $_POST['body'];
        }
    }
    $validate_success = empty($name_error) && empty($email_error) && empty($body_error);
    if($validate_success){
        $sql = "insert into feedback(name, email, body) values (?, ?, ?)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $email);
        $statement->bindParam(3, $body);
        $statement->execute();
        header('Location: ./feedback_list.php');
    }

?>
<div class="flex flex-col items-center">
    <h1 class="text-red-800 font-bold text-4xl">send your feedback</h1>
    <form class=" flex flex-col mt-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input class="p-3 outline-none border border-red-800 mt-2" type="text" placeholder="What is your name?" name="name">
        <p class="text-red-800"><?php echo $name_error ?></p>
        <input class="p-3 outline-none border border-red-800 mt-2" type="text" placeholder="Email" name="email">
        <p class="text-red-800"><?php echo $email_error ?></p>
        <input class="p-3 outline-none border border-red-800 mt-2" type="textarea" rows="3" name="body">
        <p class="text-red-800"><?php echo $body_error ?></p>
        <input type="submit" name="submit" class="p-2 bg-red-800 mt-2 text-white font-bold cursor-pointer">
    </form>
</div>
<?php include 'components/footer.php'; ?>