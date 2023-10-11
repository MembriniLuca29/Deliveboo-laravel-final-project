@extends('layouts.app')

@section('page-title', 'Tutti i piatti')

@section('main-content')
    <div class="row">
        <div class="col">
            {{-- <a href="{{ route('admin.dish.create') }}" class="btn w-100 btn-success mb-5"> --}}
                + Aggiungi
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Immagine</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <th scope="row">
                                {{ $dish->id }}
                            </th>
                            <td>
                                {{ $dish->name }}
                            </td>
                            <td>
                                {{ $dish->description }}
                            </td>
                            <td>
                                {{ $dish->price }}
                            </td>
                            <td>
                                {{ $dish->thumb }}
                            </td>
                            <td>
                                {{-- <a href="{{ route('dishes.show', ['dish' => $dish->id]) }}" class="btn btn-primary"> --}}
                                    Vedi
                                </a>
                                <a href="{{ route('dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                                <form action="{{ route('dishes.destroy', ['dish' => $dish->id]) }}" method="dish" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
