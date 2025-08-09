<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = ['nombre', 'usuario', 'contrasena', 'rol', 'creado_en'];
    protected $hidden = ['contrasena'];

    // Laravel valida el login leyendo este valor
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Si algún código del framework intenta setear/leer "password",
     * lo mapeamos a la columna real "contrasena".
     */
    public function setPasswordAttribute($value): void
    {
        // NO hash acá para evitar doble hash; ya hasheamos en el controlador.
        $this->attributes['contrasena'] = $value;
    }

    public function getPasswordAttribute(): ?string
    {
        return $this->contrasena;
    }

    // IMPORTANTE: Si copiaste algo como "casts() => ['password' => 'hashed']", borrarlo.
    // Usamos el hash explícito en el controlador (bcrypt) para tener control.
}
