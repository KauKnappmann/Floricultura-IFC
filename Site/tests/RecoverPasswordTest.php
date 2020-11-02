<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once $_SERVER['DOCUMENT_ROOT'] . 'conf/Conexao.php';

final class RecoverPasswordTest extends TestCase
{ 

  public function testSendEmailHash(): void
  {
    $email = 'teste@gmail.com';
    $connection = Conexao::getInstance();
    $recoverPassword = new RecoverPassword($connection);
    $hash = $recoverPassword->generateHash($email);
    $this->assertEquals(true, $recoverPassword->sendRecoverPasswordEmail($hash, $email));
  }

  public function testGenerateHashValid(): void
  {
    $email = 'teste@gmail.com';
    $connection = Conexao::getInstance();
    $recoverPassword = new RecoverPassword($connection);
    $this->assertEquals(sha1($email), $recoverPassword->generateHash($email));
  }

  public function testSetHash(): void
  {
    $email = 'teste@gmail.com';
    $connection = Conexao::getInstance();
    $recoverPassword = new RecoverPassword($connection);
    $hash = $recoverPassword->generateHash($email);
    $this->assertEquals(true, $recoverPassword->setHash($hash, $email));
  }

  public function testValidHash(): void
  {
    $email = 'teste@gmail.com';
    $connection = Conexao::getInstance();
    $recoverPassword = new RecoverPassword($connection);
    $hash = $recoverPassword->generateHash($email);
    $this->assertEquals(true, $recoverPassword->validateHash($hash, $email));
  }

  public function testUpdatePassword(): void
  {
    $email = 'teste@gmail.com';
    $connection = Conexao::getInstance();
    $recoverPassword = new RecoverPassword($connection);
    $hash = $recoverPassword->generateHash($email);
    $this->assertEquals(true, $recoverPassword->updatePassword($hash, $email, 'teste123456'));
  }

}
