{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Usuarios" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Autores" icon="la la-question" :link="backpack_url('autor')" />
<x-backpack::menu-item title="Categorias" icon="la la-question" :link="backpack_url('categoria')" />
<x-backpack::menu-item title="Tipos de copia" icon="la la-question" :link="backpack_url('tipo-de-copia')" />
<x-backpack::menu-item title="Tipos de documento" icon="la la-question" :link="backpack_url('tipo-de-documento')" />
<x-backpack::menu-item title="Documentos" icon="la la-question" :link="backpack_url('documento')" />
<x-backpack::menu-item title="Copias" icon="la la-question" :link="backpack_url('copia')" />
<x-backpack::menu-item title="Reservas" icon="la la-question" :link="backpack_url('reserva')" />

<x-backpack::menu-dropdown title="Prestamos" icon="la la-group">
    <x-backpack::menu-dropdown-item title="Cancelar prestamos" icon="la la-user" :link="backpack_url('cancelarPrestamo')" />
    <x-backpack::menu-dropdown-item title="Aprobar prestamos" icon="la la-group" :link="backpack_url('aprobarPrestamos')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Roles" icon="la la-question" :link="backpack_url('role')" />
