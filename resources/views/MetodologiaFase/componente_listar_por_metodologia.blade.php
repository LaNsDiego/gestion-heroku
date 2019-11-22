

<ul class="nav nav-tabs">

    <?php

    ?>
    @foreach($ListadoMetodologiaFase as $indice  => $ObjFase)

        @php
            $activo = $indice == 0 ? "active show" : "";
        @endphp


        <li class="nav-item"><a class="nav-link {{$activo}}" data-toggle="tab" href="#Fase{{$ObjFase->Id}}">{{$ObjFase->Nombre}}</a></li>

    @endforeach
        <input id="FasesId" type="hidden" name="FasesId" value="">

</ul>
<!-- tab content -->
<div class="tab-content" id="myTabContent">
    <!-- tab 1 -->
    @foreach($ListadoMetodologiaFase as $indice => $ObjFase)

        @php
            $activo = $indice == 0 ? "active show" : "";
        @endphp
        <div class="tab-pane fade {{ $activo }}" id="Fase{{ $ObjFase->Id}}">
            <input type="hidden" name="FaseId[]" value="{{ $ObjFase->Id}}">
            <div class="pt-3">

            @foreach( $ObjFase->ListadoElementoConfiguracion as $ObjElemento)
                <!-- checkbox -->
                    <div class="animated-checkbox box-elemento">
                        <label>
                            <input name="Elemento{{$ObjElemento->ElementoConfiguracion->Nombre}}[]" value="{{$ObjElemento->ElementoConfiguracion->Id}}>" type="checkbox"><span class="label-text">{{$ObjElemento->ElementoConfiguracion->Nombre}}</span>
                        </label>
                    </div>
                    <!-- checkbox -->
                @endforeach
            </div>
        </div>
@endforeach
{{--<!-- tab 2 -->--}}
{{--    <div class="tab-pane fade" id="Fase2">--}}
{{--        <div class="pt-3">--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento1" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento2" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento3" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento4" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento5" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento6" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento7" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento8" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento9" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento10" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento11" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Preparacion[]" value="elemento12" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- tab 3 -->--}}
{{--    <div class="tab-pane fade" id="Fase3">--}}
{{--        <div class="pt-3">--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Construccion[]"  value="elemento1"  type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Construccion[]"  value="elemento2" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Construccion[]"  value="elemento3" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--            <!-- checkbox -->--}}
{{--            <div class="animated-checkbox box-elemento">--}}
{{--                <label>--}}
{{--                    <input name="Construccion[]"  value="elemento4" type="checkbox"><span class="label-text">Elemento</span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <!-- checkbox -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}