<div class="sidebar">
    <a href="{{ route('dashboard') }}" class="sidebar-link">Dashboard</a>
    <a href="{{ route('show.index') }}" class="sidebar-link">Spectacles</a>
    <a href="{{ route('representation.index') }}" class="sidebar-link">Réservations</a>
    <a href="{{ route('reservation.mesreservations') }}" class="sidebar-link">Mes réservations</a>

    @auth
    @php
    $user = Auth::user();
    $roleList = $user->roles->pluck('name')->toArray();
    $isAdmin = in_array('admin', $roleList);
    @endphp

    <div class="relative">
        <button class="sidebar-link" onclick="toggleSubMenu()">Profil</button>
        <div id="subMenu" class="collapse">
            <a href="{{ route('profile.show') }}" class="sidebar-link">Profil</a>
            <a href="{{ route('profile.edit') }}" class="sidebar-link">Edit Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link">Log out</button>
            </form>
        </div>
    </div>

    @if($isAdmin)
    <a href="{{ route('artist.index') }}" class="sidebar-link">CRUD Artistes</a>
    <a href="{{ route('show.index') }}" class="sidebar-link">CRUD Spectacles</a>
    @endif
    @else
    <a href="{{ route('login') }}" class="sidebar-link">Se connecter</a>
    <a href="{{ route('register') }}" class="sidebar-link">S'inscrire</a>
    @endauth
</div>

<script>
    function toggleSubMenu() {
        var subMenu = document.getElementById("subMenu");
        subMenu.classList.toggle("collapse");
    }
</script>