@extends('layouts.app')

@section('page-title', 'Modifica '.$dish->name)

@section('main-content')
    <div class="row">
        <div class="col bg-info-subtle">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="dish" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">nome</label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="255" value="{{ old('title', $dish->title) }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">descrizione</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $dish->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Immagine</label>
                    <input class="form-control" type="file" name="cover_img" id="cover_img" accept="image/*">

                    @if ($dish->cover_img)
                        <div>
                           
                            <img src="{{ asset('storage/' . $dish->cover_img) }}" class="w-50" alt="{{ $dish->title }}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remove_cover_img" id="remove_cover_img">
                            <label class="form-check-label" for="remove_cover_img">
                                Rimuovi immagine
                            </label>
                        </div>
                    @endif
                </div>



                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
