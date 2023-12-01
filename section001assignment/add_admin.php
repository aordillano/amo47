<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    require_once('database.php');

    // Adds new admin information and hashed password into the shoeManagers table
    function add_shoe_manager($shoe_manager_id, $email, $password, $first_name, $last_name) {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO shoeManagers (emailAddress, password, firstName, lastName)
                  VALUES (:email, :password, :firstName, :lastName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $first_name);
        $statement->bindValue(':lastName', $last_name);
        $statement->execute();
        $statement->closeCursor();
    }

    // Calls function above to add information below
    add_shoe_manager('mary_gardner@gmail.com', 'cynoShoes4ever', 'Mary', 'Gardner');
    add_shoe_manager('sophie.vasquez@gmail.com', 'iLoveSh03s', 'Sophie', 'Vasquez');
    add_shoe_manager('morgantaylor@gmail.com', 'sh03Designer', 'Morgan', 'Taylor');
?>