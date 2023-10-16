@extends('painel.template')
@section('css')
<link href="{{ asset('app/css/pages/index.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-xl-12  bg-secondary rounded p-4">
            <!-- with msg -->
            @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{session('success')}}
            </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">EMPRESA</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
        </div>


    </div>
</div>

<!-- modal -->
<div class="modal fade " id="modalBanner" tabindex="-1" aria-labelledby="modalBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  bg-secondary d-flex justify-content-center">
                <img src="" alt="" class="img-fluid img_banner">
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade " id="modalExcluir" tabindex="-1" aria-labelledby="modalBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBannerLabel">Deletar anuncio</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  bg-secondary d-flex justify-content-center">
                <span class="text-white">Deseja realmente excluir este anúncio?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-danger" data-bs-dismiss="modal">Cancelar</button>
                <a href="" class="btn btn-primary bg-success confir_delet">Confirmar</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('app/js/pages/shop/index.js') }}"></script>
@endsection