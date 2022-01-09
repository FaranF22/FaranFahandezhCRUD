<?php

namespace CRUD\Controller;
use CRUD\Model\Actions;

use CRUD\Helper\PersonHelper;


class PersonController
{
    public function switcher($uri,$request)
    {
        switch ($uri)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }
        private $obj;

    public function createAction($request)
    {
        $obj = new PersonHelper();
        $obj -> insert();
    }

    public function updateAction($request)
    {
        $obj = new PersonHelper();
        $obj -> update();
    }

    public function readAction($request)
    {
        $id = $request['id'];
        $obj = new PersonHelper();
        $obj -> fetch($id);
    }
    public function readAllAction($request)
    {
        $obj = new PersonHelper();
        $obj -> fetchAll();
    }

    public function deleteAction($request)
    {
        $obj = new PersonHelper();
        $obj -> delete();
    }

}