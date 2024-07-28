|<?php 
    $data = [];

    // requisição
    if(isset($_GET['option'])) {
        switch ($_GET['option']) {
            case 'status':
                $data['status'] = 'SUCCESS';
                $data['data'] = 'API running';
                break;
            
            default: 
                $data['status'] = 'ERROR';
                break;
        }
    } else {
        $data['status'] = 'ERROR';
    }

    // msoitrar a resposta da api  
    response($data);

    function response($data) {
        header("Content-Type:application/json");
        echo json_encode($data);
    }

    // montar a resposta