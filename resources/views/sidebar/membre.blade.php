s<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    MOINI
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Tableau De Bord</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('change/password') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Modifier Password</span>
                    </a>
                </li>

                @if (Auth::user()->role_name == 'Admin')
                    
                @endif
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-chat-right-dots-fill"></i>
                        <span>Réunion</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('reunion.create') }}">Ajouter un rapport</a>
                            <a href="{{ route('reunion.index') }}">Consulter</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Etat des comptes</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('compte.index') }}">Déclaration</a>
                            {{-- <a href="{{ route('userManagement') }}">Paiement</a> --}}
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->role_name == 'Admin')
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Association</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('association.index') }}">Créer une Association</a>
                            <a href="{{ route('membre.index') }}">Membres</a>
                            <a href="{{ route('cycle.index') }}">Cycles</a>
                            <a href="redirections.php?page=edit-category.php">Paramètres</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Cycles</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('admin.systemCalendar') }}"
                            class=" {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">Calendrier</a>
                            <a href="{{ route('events.index') }}">Liste des Reunions</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Activités</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('activite.create') }}">Nouvelle activité</a>
                            <a href="{{ route('activite.index') }}">Consulter</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Paramètres</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('permissions.index') }}" >Gestion des Permissions</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('roles.index') }}" >Gestion des Roles</a>
                        </li>
                    </ul>
                </li>
                @endif
                
                {{-- @endif --}}

                <li class="sidebar-item">
                    <a href="{{ url('admin/filemanager') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Gestionnaire des Fichiers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('lock_screen') }}" class='sidebar-link'>
                        <i class="bi bi-lock-fill"></i>
                        <span>Écran verrouillé</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Se déconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
