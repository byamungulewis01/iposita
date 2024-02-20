<?php

namespace App\Models;

use App\FileManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchTopup extends Model
{
    use HasFactory;

    const STATUS_APPROVED = 'CONFIRMED';

    public function getAttachment()
    {
        return $this->attachment ? \Storage::url(FileManager::TOP_UP_ATTACHMENT_PATH . $this->attachment) : null;
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
