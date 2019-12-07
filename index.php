<?php

namespace App;

use App\DependencyInversionPrinciple\DBOrderRepository;
use App\DependencyInversionPrinciple\OrderService;

require 'vendor/autoload.php';

echo "Dependency Inversion Principle";

// With the help of an IoC container we wouldn't need to pass the OrderRepository class through.
$orderService = new OrderService(new DBOrderRepository());

echo $orderService->getAllOrders();
echo $orderService->getOrderById(1);
