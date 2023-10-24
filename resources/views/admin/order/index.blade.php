@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<h2 id="completed-orders-toggle" class="fs-5 completed-button">Mostra completati</h2>
@foreach ($orders as $order)
    <div class="card order-card ms-4 mb-2 {{ $order->status === 'completato' ? 'd-none' : '' }}" data-status="{{ $order->status }}">
                <div class="card-header">
                    <div class="d-flex justify-content-between"><h3>{{ $order->name }} {{ $order->last_name }}  </h3><h2 class="me-4"> costo: {{ $order->total_price}}</h2></div><h6>data: {{ $order->updated_at }} </h6>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">numero: {{ $order->phone_number }} </li>
                  <li class="list-group-item">email: {{ $order->email }}</li>
                  <li class="list-group-item ">
                
                    <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ $order->name }}">
                        <input type="hidden" name="last_name" value="{{ $order->last_name }}">
                        <input type="hidden" name="phone_number" value="{{ $order->phone_number }}">
                        <input type="hidden" name="email" value="{{ $order->email }}">
                        <input type="hidden" name="address" value="{{ $order->address }}">
                        <input type="hidden" name="total_price" value="{{ $order->total_price }}">
                        <input type="hidden" name="status" value="{{ $order->status }}">

                       <div class="status">
                        <select name="status" class="form-select">
                            <option value="inviato" {{ $order->status === 'inviato' ? 'selected' : '' }}>Inviato</option>
                            <option value="produzione" {{ $order->status === 'produzione' ? 'selected' : '' }}>Produzione</option>
                            <option value="completato" {{ $order->status === 'completato' ? 'selected' : '' }}>Completato</option>
                        </select>
                        <button type="submit" class="btn btn-update-status {{ $order->status === 'inviato' ? 'btn-primary' : ($order->status === 'produzione' ? 'btn-warning' : 'btn-success') }} ms-2">Aggiorna</button>
                    </form>
                </li>
                  <li class="list-group-item"></li>
                  <ul>
                    @foreach ($order->dishes as $dish)
                <li>{{ $dish->pivot->quantity }} {{ $dish->name }} </li>
            @endforeach
                </ul>
                </ul>
              </div>
             
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var completedOrdersToggle = document.getElementById('completed-orders-toggle');
            var orderCards = document.querySelectorAll('.order-card');
    
            completedOrdersToggle.addEventListener('click', function() {
                var buttonText = '';
    
                orderCards.forEach(function(card) {
                    var status = card.getAttribute('data-status');
                    if (status === 'completato') {
                        card.classList.toggle('d-none');
                    }
                });
    
                // Modifica il testo del pulsante in base allo stato dei completati
                if (orderCards[0].classList.contains('d-none')) {
                    buttonText = 'Mostra completati';
                } else {
                    buttonText = 'Nascondi completati';
                }
                completedOrdersToggle.textContent = buttonText;
            });
        });
    </script>

@endsection
