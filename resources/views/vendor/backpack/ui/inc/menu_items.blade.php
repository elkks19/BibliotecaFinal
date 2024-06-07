{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Usuarios" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Autores" icon="la la-user-edit" :link="backpack_url('autor')" />
<x-backpack::menu-item title="Categorias" icon="la la-braille" :link="backpack_url('categoria')" />
<x-backpack::menu-item title="Tipos de copia" icon="la la-object-group" :link="backpack_url('tipo-de-copia')" />
<x-backpack::menu-item title="Tipos de documento" icon="la la-object-ungroup" :link="backpack_url('tipo-de-documento')" />
<x-backpack::menu-item title="Libros" icon="la la-book" :link="backpack_url('documento')" />
<x-backpack::menu-item title="Copias de libros" icon="la la-copy" :link="backpack_url('copia')" />
<x-backpack::menu-item title="Reservas" icon="la la-hand-pointer" :link="backpack_url('reserva')" />

<x-backpack::menu-dropdown title="Prestamos" icon="la la-clipboard">
    <x-backpack::menu-dropdown-item title="Cancelar prestamos" icon="la la-times" :link="backpack_url('cancelarPrestamo')" />
    <x-backpack::menu-dropdown-item title="Aprobar prestamos" icon="la la-check" :link="backpack_url('aprobarPrestamos')" />
    <x-backpack::menu-dropdown-item title="Registrar devolución" icon="la la-clipboard-check" :link="backpack_url('registrarDevolucion')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Roles" icon="la la-user-check" :link="backpack_url('role')" />
