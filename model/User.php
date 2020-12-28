<?php
namespace App\Model;

/**
 * Class User
 *
 * @author Daniel Breg
 * @package App\Model;
 */
class User{
    
    
    /**
     * getAll description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function getAll()
    {
        echo json_encode(['message' => 'success']);
    }

    /**
     * put description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function put()
    {
        echo json_encode(['message' => 'put request']);
    }

    /**
     * post description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function post($id)
    {
        echo json_encode(['message' => 'method post', 'id' => $id]);
    }

    /**
     * delete description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function delete()
    {
        echo json_encode(['message' => 'Method delete']);
    }

    public function getOne($id)
    {
        echo json_encode(['message' => 'get one user', 'id' => $id]);
    }
}