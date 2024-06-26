<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRolePermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'read_permission',
        'create_permission',
        'update_permission',
        'delete_permission'
    ];
}
