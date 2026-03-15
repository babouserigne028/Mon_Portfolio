@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-10">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-primary">Mes Projets</h1>
        <p class="text-secondary">Gérez vos réalisations affichées sur le portfolio.</p>
    </div>
    <button type="button" onclick="openCreateProjetModal()"
        class="flex items-center gap-2 rounded-full bg-cta px-6 py-3 text-sm font-semibold text-white hover:bg-cta/90 transition-all active:scale-95">
        <span class="material-symbols-outlined">add_circle</span> Nouveau Projet
    </button>
</div>

<div class="bg-background border border-primary/10 rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full text-left border-collapse">
        <thead class="bg-primary/5 border-b border-primary/10">
            <tr>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Aperçu</th>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Titre du Projet</th>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Technologies</th>
                <th class="px-6 py-4 text-xs font-bold text-secondary uppercase text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-primary/5">
            @foreach($projets as $projet)
            <tr class="hover:bg-primary/5 transition-colors">
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $projet->image_couverture) }}"
                        class="w-20 h-14 object-cover rounded-lg border border-primary/10">
                </td>
                <td class="px-6 py-4 text-sm font-bold text-primary">{{ $projet->nom }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-1 flex-wrap">
                        @foreach($projet->technologies as $tech)
                            <span class="px-2 py-0.5 rounded-md bg-primary/5 text-secondary text-[10px] font-bold">{{ $tech->nom }}</span>
                        @endforeach
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <button type="button"
                            class="edit-projet-btn p-2 text-secondary hover:text-cta transition-colors"
                            data-id="{{ $projet->id }}"
                            data-nom="{{ $projet->nom }}"
                            data-description="{{ $projet->description }}"
                            data-image="{{ $projet->image_couverture }}"
                            data-lien="{{ $projet->lien_projet }}"
                            data-technologies="{{ json_encode($projet->technologies->pluck('id')) }}">
                            <span class="material-symbols-outlined">edit_square</span>
                        </button>
                        <form action="{{ route('admin.projets.destroy', $projet->id) }}" method="POST"
                            onsubmit="return confirm('Supprimer ce projet ?')">
                            @csrf @method('DELETE')
                            <button class="p-2 text-secondary hover:text-error transition-colors">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<x-admin.modal-create-projet :technologies="$technologies" />
<x-admin.modal-edit-projet   :technologies="$technologies" />
@endsection

@push('scripts')
    @vite('resources/js/admin/projets.js')
@endpush
