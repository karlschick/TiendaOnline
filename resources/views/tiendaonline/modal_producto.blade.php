<!-- Modal Reutilizable para los productos -->
<div class="modal fade" id="productModal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitle{{ $producto->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193e66; color: white;">
                <h5 class="modal-title" id="modalTitle{{ $producto->id }}">{{ $producto->nombre_producto }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Columna para las opciones de compra -->
                    <div class="col-md-7 text-center">
                        <div class="card text-white bg-secondary mb-3 shadow-sm">
                            <div class="card-header">
                                <i class="fas fa-fw fa-money-bill-alt fa-2x" aria-hidden="true"></i><br>
                                {{ $producto->nombre_producto }}<br>
                            </div>
                        </div>

                        <!-- Opciones de compra -->
                        @if($producto->valor_unitario_mes != '0')
                            <a href="/tienda/savecarrito/{{ $producto->id }}" class="card text-white bg-primary mb-3 shadow-sm" style="max-width: 18rem;">
                                <div class="card-body">
                                    <p>Valor 1 Mes c/u</p>
                                    <b>${{ $producto->valor_unitario_mes }} COP</b>
                                </div>
                            </a>
                        @endif

                        @if($producto->valor_seis_meses != '0')
                            <a href="/tienda/savecarrito/{{ $producto->id }}" class="card text-white bg-primary mb-3 shadow-sm" style="max-width: 18rem;">
                                <div class="card-body">
                                    <p>Valor 6 Meses c/u</p>
                                    <b>${{ $producto->valor_seis_meses }} COP</b>
                                </div>
                            </a>
                        @endif

                        @if($producto->valor_doce_meses != '0')
                            <a href="/tienda/savecarrito/{{ $producto->id }}" class="card text-white bg-primary mb-3 shadow-sm" style="max-width: 18rem;">
                                <div class="card-body">
                                    <p>Valor 12 Meses c/u</p>
                                    <b>${{ $producto->valor_doce_meses }} COP</b>
                                </div>
                            </a>
                        @endif
                    </div>

                    <!-- Columna para la imagen -->
                    <div class="col-md-5 text-center">
                        <img src="{{ $producto->imagen ? asset('storage/' . $producto->imagen) : asset('images/libro1.png') }}" alt="Product Image" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

                                    <!-- Fin del Modal para este producto -->