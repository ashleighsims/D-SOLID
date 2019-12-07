<?php

namespace App\DependencyInversionPrinciple;

use App\DependencyInversionPrinciple\Interfaces\OrderRepositoryInterface;

class OrderService {

    public $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo) {
        $this->orderRepo = $orderRepo;
    }

    public function getAllOrders() {
        return $this->orderRepo->getAll();
    }

    public function getOrderById($id) {
        return $this->orderRepo->getById($id);
    }

}
