<?php

require_once 'Email.php';

class ActivateUser
{

  private $email;
  private $connection;

  public function __construct(string $email, $connection)
  {
    $this->email = htmlspecialchars(strip_tags($email));
    $this->connection = $connection;
  }

  public function sendActivateUserEmail(): bool 
  {
    $email = new Email($this->email);

    $message = '<a href="neetree.com/ativar-email?email=' . $this->email . '">Ative seu email clicando aqui</a>';
    $subject = 'Ative seu email!';
    $altBody = 'copie esse link e cole no seu navegador: neetree.com/ativar-email?email=' . $this->email;

    $sendEmail = $email->sendEmail($message, $subject, $altBody);

    return $sendEmail;
  }

  public function activateUser(): bool 
  {
    $sqlQuery = "UPDATE `Usuario` 
                    SET `ativo` = true
                  WHERE `email` = :email";

    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(":email", $this->email);
    $stmt->execute();

    return $stmt->rowCount() == 1 ? true : false;
  }

}
  