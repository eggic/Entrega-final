<?php
// app/Models/Pedido.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['usuario_id', 'fecha_pedido', 'estado', 'total'];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
