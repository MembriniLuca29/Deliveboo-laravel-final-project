@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<div class="order-container overflow-scrool">
<h2 id="completed-orders-toggle" class="fs-5 completed-button">Mostra completati</h2>
    @php  
        $orders = $orders->reverse();
    @endphp
@foreach ($orders as $order)
    <div class="card order-card ms-4 mb-2 {{ $order->status === 'completato' ? 'd-none' : '' }}" data-status="{{ $order->status }}">
                <div class="card-header">
                    <div class="d-flex justify-content-between"><h4>{{ $order->name }} {{ $order->last_name }}  </h4><h2 class="me-4"> costo: {{ $order->total_price}}</h2>
                    </div><h6>Data: {{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i') }}</h6>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">numero: {{ $order->phone_number }} </li>
                  <li class="list-group-item">email: {{ $order->email }}</li>
                  <li class="list-group-item">indirizzo:  {{ $order->address }}</li>
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
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let completedOrdersToggle = document.getElementById('completed-orders-toggle');
        let orderCards = document.querySelectorAll('.order-card');
        let showCompleted = true; // Variabile di stato per tenere traccia del toggle

        completedOrdersToggle.addEventListener('click', function() {
            orderCards.forEach(function(card) {
                let status = card.getAttribute('data-status');
                if (status === 'completato') {
                    card.classList.toggle('d-none', !showCompleted); // Nasconde completati se showCompleted è falso
                }
            });

            // Modifica il testo del pulsante in base allo stato di showCompleted
            if (showCompleted) {
                completedOrdersToggle.textContent = 'Mostra completati';
            } else {
                completedOrdersToggle.textContent = 'Nascondi completati';
            }

            showCompleted = !showCompleted; // Inverte lo stato del toggle
        });
    });
</script>


@endsection
