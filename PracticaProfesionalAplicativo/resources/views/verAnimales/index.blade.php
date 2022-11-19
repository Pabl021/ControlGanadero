@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Animales en venta</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        @foreach ($verAnimales as $verAni)



                        <div class="card">

                            <div class="card  shadow-lg mb-3 bg-white rounded">
                                <div class="row">
                                    <div class="col-md-4">

                                        <img class="img-fluid " src="/imagenEnVenta/{{$verAni->imagen}}">
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <div class="card-body"> -->
                                        <h5 class="card-title">{{$verAni->genero}}</h5>
                                        <p class="card-text">Descripción : {{$verAni->observaciones}}</p>
                                        <p class="card-text">Peso: {{$verAni->peso}} kg</p>
                                        <p class="card-text"">Precio: ₡{{$verAni->precioDeVenta}}</p>
                           
                                            
                                        <!-- </div> -->
                                    </div>
                                </div>
                        </div>
                                            </div>
                      
                        

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection