<?php

namespace Modules\Ladmin\Menus\Submenus;

use Hexters\Ladmin\Menus\Gate;
use Hexters\Ladmin\Supports\BaseMenu;

class AuditLog extends BaseMenu
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'log.audit.index';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = 'Audit Log';

    /**
     * Font icons
     *
     * @var string
     */
    protected $icon = 'fas fa-history'; // fontawesome

    /**
     * Menu description
     *
     * @var string
     */
    protected $description = 'User can access audit log changes';

    /**
     * Inspecting The Request Path / Route active
     * https://laravel.com/docs/master/requests#inspecting-the-request-path
     *
     * @var string
     */
    protected $isActive = 'audit*';

    /**
     * Menu ID
     *
     * @var string
     */
    protected $id = '';

    /**
     * Route name
     *
     * @return Array|null
     * @example ['route.name', ['uuid', 'foo' => 'bar']]
     */
    protected function route(): ?array
    {
        return ['log.audit.index'];
    }

    /**
     * Other gates
     *
     * @return Array(Hexters\Ladmin\Menus\Gate)
     */
    protected function gates()
    {
        return [
            new Gate(gate: 'log.audit.show', title: 'View details', description: 'User can view details'),
            new Gate(gate: 'log.audit.destroy', title: 'Delete record', description: 'User can delete audit log'),
        ];
    }

    /**
     * Other menus
     *
     * @return void
     */
    protected function submenus()
    {
        return [
            // OtherMenu::class
        ];
    }
}
