@extends('layouts.app')

@section('content')
<section class="box_inicial panel_completo" id="home">
    <div class="box_foto cont_foto">
        <div class="box_opacidad">
        </div>
        
    </div>
    <div class="box_flecha">
        <span class="glyphicon glyphicon-menu-down"></span>  
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="cont_home" id="estadisticas">
                <div class="cnt_title">
                    <h2>Estadisticas</h2>
                </div>
            </section>
            <section class="cont_home" id="graficas">
                <div class="cnt_title">
                    <h2>Gráficas  </h2>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
