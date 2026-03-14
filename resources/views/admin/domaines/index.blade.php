@extends('layouts.admin')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-primary">Domaines de Compétence</h1>
            <p class="text-secondary">Gérez les domaines de compétence affichés sur votre portfolio.</p>
        </div>
        <button type="button" onclick="openCreateModal()"
            class="flex items-center gap-2 rounded-full bg-cta px-6 py-3 text-sm font-semibold text-white hover:bg-cta/90 transition-all active:scale-95">
            <span class="material-symbols-outlined">add_circle</span> Ajouter
        </button>
    </div>

    <div class="bg-background border border-primary/10 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead class="bg-primary/5 border-b border-primary/10">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Nom</th>
                    <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Icône</th>
                    <th class="px-6 py-4 text-xs font-bold text-secondary uppercase">Couleur</th>
                    <th class="px-6 py-4 text-xs font-bold text-secondary uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/5">
                @foreach ($domaines as $domaine)
                    <tr class="hover:bg-primary/5 transition-colors">
                        <td class="px-6 py-4 text-sm font-bold text-primary">{{ $domaine->nom }}</td>
                        <td class="px-6 py-4 text-sm text-secondary">
                            @if ($domaine->icone)
                                <span class="material-symbols-outlined text-base">{{ $domaine->icone }}</span>
                            @else
                                <span class="text-secondary/40">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($domaine->couleur)
                                <span class="inline-flex items-center gap-2 text-sm text-secondary">
                                    <span class="inline-block w-4 h-4 rounded-full border border-primary/10"
                                        style="background-color: {{ $domaine->couleur }}"></span>
                                    {{ $domaine->couleur }}
                                </span>
                            @else
                                <span class="text-secondary/40">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <button type="button"
                                    class="flex items-center gap-1 text-secondary hover:text-cta transition-colors text-sm font-medium edit-domaine-btn"
                                    data-id="{{ $domaine->id }}"
                                    data-nom="{{ $domaine->nom }}"
                                    data-icone="{{ $domaine->icone ?? '' }}"
                                    data-couleur="{{ $domaine->couleur ?? '' }}">
                                    <span class="material-symbols-outlined text-sm">edit_square</span> Modifier
                                </button>
                                <form action="{{ route('admin.domaines.destroy', $domaine->id) }}" method="POST"
                                    onsubmit="return confirm('Supprimer ce domaine ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center gap-1 text-secondary hover:text-error transition-colors text-sm font-medium">
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
<x-admin.modal-create-domaine />
<x-admin.modal-edit-domaine />

@endsection

@push('scripts')
    @vite('resources/js/admin/domaines.js')
@endpush
