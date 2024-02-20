<?php

namespace App\Constants;

class StatusColor
{
    const PENDING = 'warning';
    const APPROVED = 'success';
    const REJECTED = 'danger';
    const CANCELLED = 'danger';
    const REFUNDED = 'danger';
    const COMPLETED = 'success';
    const FAILED = 'danger';

    const CONFIRMED = 'success';
    const DEFAULT = 'primary';

     public static function getStatusColor($status): string
     {
         $status = strtolower($status);

            switch ($status) {
                case 'pending':
                    return self::PENDING;
                    break;
                case 'approved':
                    return self::APPROVED;
                    break;
                case 'rejected':
                    return self::REJECTED;
                    break;
                case 'cancelled':
                    return self::CANCELLED;
                    break;
                case 'refunded':
                    return self::REFUNDED;
                    break;
                case 'completed':
                    return self::COMPLETED;
                    break;
                case 'failed':
                    return self::FAILED;
                    break;
                case 'confirmed':
                    return self::CONFIRMED;
                    break;
                default:
                    return self::DEFAULT;
                    break;
            }
     }

}
