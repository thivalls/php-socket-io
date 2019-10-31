<?php
    /**
     * Pegando os dados do formulário
     */
    $data = [
        'title' => $_POST['title'],
        'body' => $_POST['body']
    ];

    /**
     * Configurando dados e requisição via CURL
     */
    $url = 'http://localhost:3333/';
    $params = http_build_query($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type : application/x-www-form-urlencoded']);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

    /**
     * Enviando requisição para disparar a notification
     */
    $response = curl_exec($ch);
    curl_close($ch);

    // var_dump($response);