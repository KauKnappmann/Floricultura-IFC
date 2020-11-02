<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once $_SERVER['DOCUMENT_ROOT'] . 'conf/Conexao.php';

final class ActivateUserTest extends TestCase
{
  public function testSendEmail(): void
  {
    $connection = Conexao::getInstance();
    $activateUser = new ActivateUser('teste@gmail.com', $connection);
    $this->assertEquals(true, $activateUser->sendActivateUserEmail());
  }

  public function testActivateUser(): void
  {
    $connection = Conexao::getInstance();
    $activateUser = new ActivateUser('teste@gmail.com', $connection);
    $this->assertEquals(false, $activateUser->activateUser()); 
    // Precisa mudar para true com um email inativo
  }

  public function testInvalidActivateUser(): void
  {
    $connection = Conexao::getInstance();
    $activateUser = new ActivateUser('teste2@gmail.com', $connection);
    $this->assertEquals(false, $activateUser->activateUser());
  }
}
