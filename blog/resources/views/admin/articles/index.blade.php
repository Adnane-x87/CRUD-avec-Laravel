@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Articles</h1>

  @if (session('status'))
    <div style="background:#e6ffed;border:1px solid #86efac;padding:.5rem;margin-bottom:1rem;">
      {{ session('status') }}
    </div>
  @endif

@can('create-article')
       <a href="{{ route('admin.articles.create') }}"
          class="inline-flex items-center rounded bg-blue-600 px-4 py-2 text-sm font-semibold text-black hover:bg-blue-700 border border-black">
           Ajouter un article
       </a><br>
   @endcan
  <table style="width:100%;border-collapse:collapse;">
    <thead>
      <tr>
        <br><th style="border-bottom:1px solid #ccc;text-align:left;">Titre</th>
        <th style="border-bottom:1px solid #ccc;text-align:left;">Slug</th>
        <th style="border-bottom:1px solid #ccc;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($articles as $article)
         <tr>
           <td class="px-4 py-2">{{ $article->title }}</td>
           <td class="px-4 py-2">{{ $article->slug }}</td>
           <td class="px-4 py-2">
               <a href="{{ route('admin.articles.edit', $article) }}" class="inline-block mr-2 text-blue-600 hover:text-blue-800">✏️</a>
               @can('delete-article', $article)
                   <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                         onsubmit="return confirm('Confirmer la suppression ?')" style="display:inline;">
                       @csrf
                       @method('DELETE')
                       <button type="submit"
                               class="inline-flex items-center rounded bg-red-600 px-3 py-1 text-xs font-semibold text-black hover:bg-red-700">
                           Supprimer
                       </button>
                   </form>
               @endcan
           </td>
       </tr>
      @empty
        <tr><td colspan="3" class="px-4 py-2 text-center">Aucun article disponible.</td></tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top:1rem;">
    {{ $articles->links() }}
  </div>
@endsection