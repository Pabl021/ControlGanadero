@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: black;">GANAPP - Software que te facilita tus procesos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 style="color: black;">Datos generales</h5>
                        <div class="row">

                            <div class="col-md-4 col-xl-4">

                                <div class="card text-white mb-3" style="background-color: #9AA49F;">
                                    <div class="card-block" style="color: black;">
                                        <h5>Nombre</h5>

                                        <h2 class="text-right"><i class="fa fa-signature"></i>&nbsp;&nbsp;<span>Ganadería ZN</span></h2>


                                    </div>
                                </div>
                            </div>

                           
                            <div class="card text-white mb-3" style="background-color: #9AA49F;">
                                <div class="card-block" style="color: black;">
                                    <h5>Ubicación</h5>

                                    <h2 class="text-right"><i class="fa fa-map-pin f-left"></i>&nbsp;&nbsp;<span>San Carlos, Quesada, Aguas Zar...</span></h2>


                                </div>
                            </div>
                    

                            <div class="col-md-4 col-xl-11">
                                <div class="card text-white mb-3" style="background-color: #9AA49F;">
                                    <div class="card-block" style="color: black;">
                                        <h5>Usuario actual</h5>

                                        <h2 class="text-right"><i class="fa fa-hat-cowboy-side"></i>&nbsp;&nbsp;<span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span></h2>


                                    </div>
                                </div>
                            </div>

                           


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection