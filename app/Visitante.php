<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Visitante
 *
 * @package App
 * @property string $ci
 * @property string $nombres_apellidos
 * @property string $telefono
 * @property string $correo
 * @property string $procedencia
 * @property string $motivo
 * @property string $fecha_entrada
 * @property string $fecha_salida
 * @property string $observaciones
*/
class Visitante extends Model
{
    use SoftDeletes;

    protected $fillable = ['ci', 'nombres_apellidos', 'telefono', 'correo', 'procedencia', 'motivo', 'fecha_entrada', 'fecha_salida', 'observaciones'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFechaEntradaAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['fecha_entrada'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['fecha_entrada'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFechaEntradaAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFechaSalidaAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['fecha_salida'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['fecha_salida'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFechaSalidaAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
}
