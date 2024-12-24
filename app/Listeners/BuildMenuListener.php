<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\OrdemServico;

class BuildMenuListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BuildingMenu $event)
    {
        $totalClientes = Cliente::count();
        $totalServicao = Servico::count();
        $totalOrdens = OrdemServico::count();

        $event->menu->add(
            // Sidebar items:
            [
                'type' => 'sidebar-menu-search',
                'text' => 'search',
            ],
            ['header' => 'PÁGINAS'],
            [
                'text' => 'blog',
                'url' => 'admin/blog',
                'can' => 'manage-blog',
            ],
            [
                'text' => 'Clientes',
                'url'  => 'clientes',
                'icon' => 'fas fa-user-tie',
                'label' => $totalClientes,
                'label_color' => 'success',
            ],
            [
                'text' => 'Serviços',
                'url'  => 'servicos',
                'icon' => 'fas fa-tools',
            ],
            [
                'text' => 'Ordens de Serviço',
                'url'  => 'ordens-servico',
                'icon' => 'fas fa-clipboard-list',
            ],
            [
            'text' => 'Cadastros',
            'icon' => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Clientes',
                    'url'  => 'clientes/create',
                    'icon' => 'fas fa-user-tie',
                ],
                [
                    'text' => 'Serviços',
                    'url'  => 'servicos',
                    'icon' => 'fas fa-tools',
                ],
                [
                    'text' => 'Ordens de Serviço',
                    'url'  => 'ordens-servico',
                    'icon' => 'fas fa-clipboard-list',
                ],
                [
                    'text' => 'level_one',
                    'url' => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url' => '#',
                        ],
                        [
                            'text' => 'level_two',
                            'url' => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url' => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url' => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url' => '#',
                ],
            ],
        ],
            
            ['header' => 'CONFIGURAÇÕES DA CONTA'],
            [
                'text' => 'profile',
                'url' => 'admin/settings',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'logout',
                'url' => 'logout',
                'icon' => 'fas fa-fw fa-sign-out-alt',
                'sidebar' => true,
            ],
        );
    }
}
