<div class="sidebar bg-dark text-light p-4">
    <h2 class="text-danger">Paramètres Athlète</h2>
    <ul class="list-unstyled">
        <li>
            <strong>Profil</strong>
            <ul class="list-unstyled ms-3">
                <li><a href="/dashboard/user" class="text-decoration-none text-light">Infos personnelles</a></li>
                <li><a href="/dashboard/user/password" class="text-decoration-none text-light">Sécurité</a></li>
            </ul>
        </li>

        <li class="mt-3">
            <strong>Mes groupes / équipes</strong>
            <ul class="list-unstyled ms-3">
                @foreach($groupsList as $groupItem)
                    @if($groupItem->id != 1)
                        <li><a href="/dashboard/group/view/{{$groupItem->id}}" class="text-decoration-none text-light">{{ $groupItem->name }}</a></li>
                    @endif
                        @endforeach
                <li><a href="{{ route('dashboard.groups.index') }}" class="text-decoration-none text-light">Toutes les équipes</a></li>
            </ul>
        </li>

        <li class="mt-3">
            <strong>Mes entraînements</strong>
            <ul class="list-unstyled ms-3">
                <li><a href="{{ route('dashboard.practices.index') }}" class="text-decoration-none text-light">Historique</a></li>
                <li><a href="{{ route('dashboard.practice.create') }}" class="text-decoration-none text-light">Nouvel entraînement</a></li>
            </ul>
        </li>
    </ul>

    <h2 class="text-danger mt-5">Paramètres Coach</h2>
    <ul class="list-unstyled">
        <li>
            <strong>Groupes</strong>
            <ul class="list-unstyled ms-3">
                <li><a href="{{ route('dashboard.group.create') }}" class="text-decoration-none text-light">Créer un groupe</a></li>
                <li><a href="{{ route('dashboard.groups.mygroups') }}" class="text-decoration-none text-light">Mes groupes</a></li>
            </ul>
        </li>
    </ul>
</div>
