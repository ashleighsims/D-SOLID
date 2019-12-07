<?php

namespace App\DependencyInversionPrinciple;

use App\DependencyInversionPrinciple\Interfaces\OrderRepositoryInterface;

class DBOrderRepository implements OrderRepositoryInterface
{
    public function getAll()
    {
        return "Get all orders from DB";
    }

    public function getById($id)
    {
        return "Get order by ID: {$id} from DB.";
    }

}
