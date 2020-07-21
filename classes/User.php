<?php
class User 
{

    protected function AlertMessage($msg)
    {
        echo "<script>alert('$msg');</script>";
    }

    // Sprawdzenie czy pola rejestracji nie są puste
    protected function CheckRegister($first_name, $last_name, $email, $gender, $password)
    {
        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($gender) && !empty($password)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    // Metoda do sprawdzenia czy pola logowania nie są puste.
    protected function CheckLogin($email, $password)
    {
        if (!empty($email) && !empty($password)) 
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    // Sprawdzenie ciągu znaków w celu eliminacji wszystkich nieprawidłowości.
    protected function sanitize($input)
    {
        //database obj
        global $database;

        $sanitizedInput = $database->escapeString(trim($input));

        return $sanitizedInput;
    }

    public function addnews($title, $desc, $author)
    {
        global $database;
        //Zmiana autora na ciąg znaków w celu wyświetlenia twórcy treści poprzez pseudonim.
        $sql       = "INSERT INTO news VALUES (null, '{$title}', '{$desc}', 1, NOW(), NOW(), '{$author}')";
        $query_result = $database->m_query($sql);

        if ($database->m_affectedRows()) 
        {
             $this->AlertMessage("Dodano news!");
        } 
        else 
        {
            $this->AlertMessage("Nie można dodać tego newsa.");
        }
    }

    public function delnews($id)
    {
        global $database;


        $sql       = "DELETE FROM news WHERE id = '{$id}';";
        $query_result = $database->m_query($sql);

        if ($database->m_affectedRows()) 
        {   
             $this->AlertMessage("Usunięto news!");
        } 
        else 
        {
            $this->AlertMessage("Nie można usunąć tego newsa.");
        }
    } 

    private function display($resultSet)
    {
        // Wyświetlanie listy wiadomości
        echo "<ul>";
        while($row = $resultSet->fetch_object()) {
            echo "<li>{$row->id} - {$row->description} - {$row->author_id}";
        }
        echo "</ul>";

    }

    // Aktualne newsy
    public function fetchAllNews()
    {
        //database obj;
        global $database;

        $sql = "SELECT * FROM news";
        $resultSet = $database->m_query($sql);

        if($database->m_numr($resultSet))
        {
            $this->display($resultSet);
        } 
        else 
        {
            echo "<p>Brak wiadomości</p>";
        }

    }


    // Rejestracja użytkownika.
	public function register($first_name, $last_name, $email, $gender, $password)
    {
        //database obj
        global $database;

        if ($this->CheckRegister($first_name, $last_name, $email, $gender, $password)) 
        {
            //Sprawdzanie zmiennych, usuwanie zbędnych znaków etc.
            $safeFirstName = $this->sanitize($first_name);
            $safeLastName = $this->sanitize($last_name);
            $safeEmail    = $this->sanitize($email);
            $safeGender    = $this->sanitize($gender);
            $safePass     = $this->sanitize($password);

            $sql       = "SELECT first_name FROM users WHERE first_name = '{$safeFirstName}' LIMIT 1";
            $query_result = $database->m_query($sql);

		
            if ($database->m_numr($query_result)) 
			{
                $this->AlertMessage("Taki użytkownik już istnieje w bazie danych.");
            } 
			else
			{
                //Proces rejestracji.

                //Hashowanie hasła
                $hash = password_hash($safePass, PASSWORD_BCRYPT);

				//Wprowadzenie do bazy danych:
                $sql = "INSERT INTO users VALUES (null, '{$safeFirstName}', '{$safeLastName}', '{$safeEmail}', '{$safeGender}', '{$hash}', '1', NOW(), NOW())";
                $query_result = $database->m_query($sql);

                if ($database->m_affectedRows()) 
				{
                    header("Location: index.php");
                } 
				else 
				{
                    $this->AlertMessage("Nie można dodać tego użytkownika.");
                }
            }
        } 
		else 
		{
            $this->AlertMessage("Uzupełnij puste pola!");
        }
    }

    // Metoda - logowanie użytkownika
    public function logIn($email, $password)
    {
        // database obj;
        global $database;

		//Sprawdzanie czy pola do logowania nie są puste.
        if ($this->CheckLogin($email, $password)) 
		{

            $safeEmail = $this->sanitize($email);
            $safePass	= $this->sanitize($password);

            // Pobranie hasła
            $sql       = "SELECT id, password FROM users WHERE email = '{$safeEmail}' LIMIT 1";
            $query_result = $database->m_query($sql);

            // Sprawdzanie czy użytkownik istnieje
            if ($database->m_numr($query_result)) 
			{
                // Pozyskiwanie hasła
                $extractedHash = $query_result->fetch_object();

                //Weryfikacja hasła
                if (password_verify($safePass, $extractedHash->password)) 
				{
                    session_start();
                    $_SESSION['id'] = $query_result->id;
                    $_SESSION['email'] = $safeEmail;
                    $_SESSION['is_active'] = 1;
                    header("Location: success.php");

                } 
				else 
				{
                    $this->AlertMessage("Nieprawidłowe hasło.");
                }
            } 
			else 
			{
                $this->AlertMessage("Nie ma takiego użytkownika.");
            }
        } 
		else 
		{
            $this->AlertMessage("Wypełnij wszystkie pola!");
        }
    }
}