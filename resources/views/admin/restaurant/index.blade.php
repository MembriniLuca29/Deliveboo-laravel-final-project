@extends('layouts.app')

@section('page-title', 'Tutti i ristoranti')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('restaurants.create') }}">
                Aggiungi Ristorante
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $restaurant)
                        <tr>
                            <th scope="row">
                                {{ $restaurant->id }}
                            </th>
                            <td>
                                {{ $restaurant->name }}
                            </td>

                            <td>
                                {{-- <a href="{{ route('dishes.show', ['dish' => $dish->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('restaurant.edit', ['dish' => $dish->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                                <form action="{{ route('restaurant.destroy', ['dish' => $dish->id]) }}" method="dish" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
