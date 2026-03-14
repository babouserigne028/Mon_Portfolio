@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-10">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-primary">Technologies</h1>
        <p class="text-secondary">Gérez les technologies affichées sur votre portfolio.</p>
    </div>
    <button type="button" onclick="openCreateTechModal()"
        class="flex items-center gap-2 rounded-full bg-cta px-6 py-3 text-sm font-semibold text-white hover:bg-cta/90 transition-all active:scale-95">
        <span class="material-symbols-outlined">add_circle</span> Ajouter
    </button>
</div>

<div class="bg-background border border-primary/10 rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full text-left">
        <thead class="bg-primary/5 border-b border-primary/10">
            <tr>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Nom</th>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Domaines</th>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-primary/5">
            @foreach($technologies as $tech)
            <tr class="hover:bg-primary/5 transition-colors">
                <td class="px-6 py-4 text-sm font-bold text-primary">{{ $tech->nom }}</td>
                <td class="px-6 py-4">
                    <div class="flex flex-wrap gap-1">
                        @foreach($tech->domaines as $domaine)
                            <span class="px-2 py-0.5 rounded-md bg-primary/5 text-secondary text-[10px] font-bold">{{ $domaine->nom }}</span>
                        @endforeach
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-4">
                        <button type="button"
                            class="edit-tech-btn flex items-center gap-1 text-secondary hover:text-cta transition-colors text-sm font-medium"
                            data-id="{{ $tech->id }}"
                            data-nom="{{ $tech->nom }}"
                            data-domaines="{{ json_encode($tech->domaines->pluck('id')) }}">
                            <span class="material-symbols-outlined text-sm">edit_square</span> Modifier
                        </button>
                        <form action="{{ route('admin.technologies.destroy', $tech->id) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-1 text-secondary hover:text-error transition-colors text-sm font-medium">
                                <span class="material-symbols-outlined text-sm">delete</span> Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<x-admin.modal-create-technologie :domaines="$domaines" />
<x-admin.modal-edit-technologie   :domaines="$domaines" />
@endsection

@push('scripts')
    @vite('resources/js/admin/technologies.js')
@endpush
