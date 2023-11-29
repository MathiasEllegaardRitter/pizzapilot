<?php

namespace App\enum; 

class StatusEnum
{
    // when the customer creates an order
    const CREATED = 'created';
    // Approved when the customer has paid for it
    const APPROVED = 'approved';
    // When order has been delivered and completed
    const COMPLETED = 'completed';
    // If the order has been declined in any way.
    const DECLINED = 'declined';
}