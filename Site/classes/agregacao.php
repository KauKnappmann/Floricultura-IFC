<?php

    require_once('newUser.php');
    require_once('Address.php');

    $user1 = new userTest('Marcela', 'Leite', '0000-00-00', '11111111111', 'Feminino', '47999898939', 'marcela.leite@ifc.edu.br', '123456Aa', 'Cactos', 'm.png');
    $user2 = new userTest('Eduardo', 'Bidese', '0000-00-00', '22222222222', 'Masculino', '48999316573', 'eduardo.puhl@ifc.edu.br', '098765Aa', 'Mudas', 'e.png');

    $address1 = new Address(89160202, 'Abraham Lincoln', 210, 'Jardim América', 'Rio do Sul', 'Santa Catarina');
    $address2 = new Address(89160000, 'Mafalda L. Porto', 93, 'Progresso', 'Rio do Sul', 'Santa Catarina');

    $user2->addAddress($address1);
    $user2->addAddress($address2);

    echo $user2->displayAddresses();

?>