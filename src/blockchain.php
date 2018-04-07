<?php

if(isset($_GET['createBlockchain'])){
    
    $roundId = mt_rand();

    $blockchain = fopen(DIRECTORY . '/blockchain/' . $roundId . '.json', 'w');

    $data = array (
        'info' => 
            array (
                'roundId' => $roundId,
                'totalBlocks' => '',
            ),
        'blocks' => 
            array (
            
            ),
    );
      
    fwrite($blockchain, json_encode($data));

    fclose($blockchain);

    $_GET['createBlock'] = true;

    $_GET['roundId'] = $roundId;

}

if(isset($_GET['createBlock'])){
    
    $_GET['roundId'] = (int)$_GET['roundId'];

    $bcHandle = fopen(DIRECTORY . '/blockchain/' . $_GET['roundId'] . '.json', "r");
    
    $blockchain = fread($bcHandle, filesize(DIRECTORY . '/blockchain/' . $_GET['roundId'] . '.json'));

    $blockchain = json_decode($blockchain, true);

    if(count($blockchain["blocks"]) < 1){
        
        $data = array (
            'blockHash' => hash('sha256', 0 . $_GET['roundId'] . time() . 1),
            'blockPosition' => 0,
            'roundId' => $_GET['roundId'],
            'timestamp' => time(),
            'special' => true,
        );

        array_push($blockchain['blocks'], $data);

        $bcHandle = fopen(DIRECTORY . '/blockchain/' . $_GET['roundId'] . '.json', "w");
            
        fwrite($bcHandle, json_encode($blockchain));

    }else{

        $previousBlock = end($blockchain["blocks"]);

        $newBlock = array(
            'blockHash' => hash('sha256', $previousBlock['blockHash'] . ($previousBlock['blockPosition'] + 1) . $_GET['roundId'] . time()),
            'previousBlockHash' => $previousBlock['blockHash'],
            'blockPosition' => $previousBlock['blockPosition'] + 1,
            'roundId' => $_GET['roundId'],
            'timestamp' => time(),
        );

        $blockchain['info']['totalBlocks'] = $newBlock['blockPosition'];

        array_push($blockchain['blocks'], $newBlock);

        $bcHandle = fopen(DIRECTORY . '/blockchain/' . $_GET['roundId'] . '.json', "w");

        fwrite($bcHandle, json_encode($blockchain));

    }

    fclose($bcHandle);

}