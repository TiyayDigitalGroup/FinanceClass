<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatePoster extends Component
{
    public string $titulo;
    public string $mensaje;
    public string $tipo;
    public bool $mostrarIcono;
    public bool $mostrarBotonVolver;
    public string $urlVolver;
    public string $textoBotonVolver;
    public bool $mostrarProgreso;
    public int $porcentajeProgreso;
    public string $clasePersonalizada;
    public string $iconComponent;

    public array $config;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $titulo = 'Página en Desarrollo',
        string $mensaje = 'Esta página está actualmente en construcción. Pronto estará disponible.',
        string $tipo = 'warning',
        bool $mostrarIcono = true,
        bool $mostrarBotonVolver = true,
        string $urlVolver = '/',
        string $textoBotonVolver = 'Volver al Inicio',
        bool $mostrarProgreso = false,
        int $porcentajeProgreso = 0,
        string $clasePersonalizada = ''
    ) {
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
        $this->tipo = $tipo;
        $this->mostrarIcono = $mostrarIcono;
        $this->mostrarBotonVolver = $mostrarBotonVolver;
        $this->urlVolver = $urlVolver;
        $this->textoBotonVolver = $textoBotonVolver;
        $this->mostrarProgreso = $mostrarProgreso;
        $this->porcentajeProgreso = $porcentajeProgreso;
        $this->clasePersonalizada = $clasePersonalizada;

        $this->config = $this->tipos()[$tipo] ?? $this->tipos()['warning'];
        $this->iconComponent = 'icon.' . $this->config['svg'];
    }

    protected function tipos(): array
    {
        return [
            'warning' => [
                'bg' => 'bg-yellow-50',
                'border' => 'border-yellow-200',
                'icono' => 'text-yellow-600',
                'titulo' => 'text-yellow-800',
                'texto' => 'text-yellow-700',
                'boton' => 'bg-yellow-600 hover:bg-yellow-700 text-white',
                'svg' => 'alert',
            ],
            'info' => [
                'bg' => 'bg-blue-50',
                'border' => 'border-blue-200',
                'icono' => 'text-blue-600',
                'titulo' => 'text-blue-800',
                'texto' => 'text-blue-700',
                'boton' => 'bg-blue-600 hover:bg-blue-700 text-white',
                'svg' => 'info',
            ],
            'success' => [
                'bg' => 'bg-green-50',
                'border' => 'border-green-200',
                'icono' => 'text-green-600',
                'titulo' => 'text-green-800',
                'texto' => 'text-green-700',
                'boton' => 'bg-green-600 hover:bg-green-700 text-white',
                'svg' => 'check',
            ],
            'error' => [
                'bg' => 'bg-red-50',
                'border' => 'border-red-200',
                'icono' => 'text-red-600',
                'titulo' => 'text-red-800',
                'texto' => 'text-red-700',
                'boton' => 'bg-red-600 hover:bg-red-700 text-white',
                'svg' => 'error',
            ],
        ];
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.state-poster');
    }
}
