<?php
//esta es la clase (controlador)
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mascota;

class Mascotas extends Component
{
    //definicion de variables
    public $mascotas, $nombre_mascota, $raza, $edad, $id_mascota;
    public $modal=false;

    public function render()
    {
        $this->mascotas = Mascota::all();
        return view('livewire.mascotas');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal=true;
    }

    public function cerrarModal(){
        $this->modal=false;
    }

    public function limpiarCampos(){
        $this->id_mascota="";
        $this->nombre_mascota="";
        $this->raza="";
        $this->edad="";
    }

    public function editar($id_mascota){
        $mascota = Mascota::findOrFail($id_mascota);
        $this->id_mascota = $id_mascota;
        $this->nombre_mascota = $mascota->nombre_mascota;
        $this->raza = $mascota->raza;
        $this->edad = $mascota->edad;
        $this->abrirModal();
    }

    public function borrar($id_mascota){
        Mascota::find($id_mascota)->delete();
    }

    public function guardar(){
        Mascota::updateOrCreate(['id'=>$this->id_mascota],
        [
            'nombre_mascota' => $this->nombre_mascota,
            'raza' => $this->raza,
            'edad' => $this->edad
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }

}
