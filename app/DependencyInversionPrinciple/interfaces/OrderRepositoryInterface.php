<?php

namespace App\DependencyInversionPrinciple\Interfaces;

interface OrderRepositoryInterface {
    public function getAll();
    public function getById($id);
}
