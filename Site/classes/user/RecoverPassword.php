<?php

require_once 'Email.php';

class RecoverPassword
{

  private $connection;

  public function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function sendRecoverPasswordEmail(string $hash, string $email): bool
  {
    $emailObj = new Email($email);

    $message = '<a href="neetree.com/recuperar-senha?email=' . $email . '&hash='. $hash. '">Recupere sua senha clicando aqui</a>';
    $subject = 'Ative seu email!';
    $altBody = 'copie esse link e cole no seu navegador: neetree.com/recuperar-senha?email=' . $email . '&hash=' . $hash;

    $sendEmail = $emailObj->sendEmail($message, $subject, $altBody);

    return $sendEmail;
  }

  public function generateHash(string $email): string
  {
    return sha1($email);
  }

  public function setHash(string $hash, string $email): string
  {
    $hash = htmlspecialchars(strip_tags($hash));
    $email = htmlspecialchars(strip_tags($email));

    $sqlQuery = "UPDATE `Usuario` 
                    SET `hashPassword` = :hashPassword
                  WHERE `email` = :email";

    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(":hashPassword", $hash);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $stmt->rowCount() == 1 ? true : false;
  }

  public function validateHash(string $hash, string $email): bool
  {
    $hash = htmlspecialchars(strip_tags($hash));
    $email = htmlspecialchars(strip_tags($email));
   
    $sqlQuery = "SELECT `email` 
                   FROM `Usuario`
                  WHERE `email` = :email 
                    AND `hashPassword` = :hashPassword";

    $stmt = $this->connection->prepare($sqlQuery);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":hashPassword", $hash);

    $stmt->execute();
    
    $result = $stmt->rowCount();

    return $result == 1 ? true : false;
  }
  
  public function updatePassword(string $hash, string $email, string $password): bool
  {
    $hash = htmlspecialchars(strip_tags($hash));
    $email = htmlspecialchars(strip_tags($email));
    $password = htmlspecialchars(strip_tags($password));

    if (!$this->validateHash($hash, $email)) {
      return false;
    } else {
      $sqlQuery = "UPDATE `Usuario` 
                      SET `senha` = :senha,
                          `hashPassword` = null
                    WHERE `email` = :email";
  
      $stmt = $this->connection->prepare($sqlQuery);
      $stmt->bindParam(":senha", $password);
      $stmt->bindParam(":email", $email);
      $stmt->execute();
  
      return $stmt->rowCount() == 1 ? true : false;

    }

  }

}
