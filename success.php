<?php require_once 'includes/header.php'; ?>

<?php
session_start();  
    $email = $_SESSION['email'];
    if(isset($_POST['add'])) 
    {
        $createnews = new User();
        $createnews->addnews($_POST['title'], $_POST['text1'], $_POST['author']);
    }
    if(isset($_POST['delete'])) 
    {
        $deletenews = new User();
        $deletenews->delnews($_POST['iddel']);
    }
?>

<div class="container">
	<h1>Strona użytkownika</h1>
	<h3> Witaj. Twoj adres to: <?php echo $email; ?> </h3>
    <form method="post" action="">
    Autor: <input name="author" size="40" maxlength="255">
    <br>
    Tytuł: <input name="title" size="40" maxlength="255">
    <br>
    Opis: <textarea name="text1" rows="7" cols="30"></textarea>
    <br>
    <input type="submit" name="add" value="Dodaj wpis">
    </form>

    <form method="post" action="">
    Admin Panel - ID wpisu do usunięcia:<br> <input name="iddel" size="40" maxlength="255">
    <input type="submit" name="delete" value="Usuń Wpis">
    </form>
    <?php
        $fetchNews = new User();
        $fetchNews->fetchAllNews();
    ?>

    <form action="logout.php">
	<input type="submit" value="Wyloguj">
	</form>
</div>

<?php require_once 'includes/footer.php'; ?>

