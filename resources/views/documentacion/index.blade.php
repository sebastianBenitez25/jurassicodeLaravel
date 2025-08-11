@extends('layouts.public')

@section('title', 'JurassiDraft – Documentación')

@section('content')
<div class="container py-4">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-12 col-md-auto">
            <h2 class="mb-0">📁 Documentación JurassiDraft</h2>
        </div>
    </div>

    @if ($relativePath)
        <div class="mb-3">
            <a href="{{ route('documentacion', dirname($relativePath)) }}" class="btn btn-outline-secondary">⬅ Volver</a>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @foreach ($items as $item)
            @php
                $estaBloqueada = $item['isDir'] && in_array($item['name'], $bloqueadas);
            @endphp
            <div class="col">
                <div class="card file-card shadow-sm h-100 {{ $estaBloqueada ? 'opacity-50' : '' }}">
                    @if ($item['isDir'])
                        <div class="card-body">
                            <h6 class="card-title">📂 {{ $item['name'] }}</h6>
                            @if ($estaBloqueada)
                                <button class="btn btn-sm btn-outline-secondary w-100" disabled>🔒 Aún no disponible</button>
                            @else
                                <a href="{{ route('documentacion', $item['link']) }}" class="btn btn-sm btn-outline-success w-100">Abrir carpeta</a>
                            @endif
                        </div>
                    @elseif ($item['isImage'])
                        <img src="{{ asset('docs/' . $item['link']) }}" class="file-preview card-img-top" alt="{{ $item['name'] }}">
                        <div class="card-body">
                            <h6 class="card-title text-truncate">🖼 {{ $item['name'] }}</h6>
                            <a href="{{ asset('docs/' . $item['link']) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">Ver imagen</a>
                        </div>
                    @elseif ($item['isPDF'])
                        <iframe src="{{ asset('docs/' . $item['link']) }}" class="file-preview card-img-top" frameborder="0"></iframe>
                        <div class="card-body">
                            <h6 class="card-title text-truncate">📄 {{ $item['name'] }}</h6>
                            <a href="{{ asset('docs/' . $item['link']) }}" target="_blank" class="btn btn-sm btn-outline-danger w-100">Ver PDF</a>
                        </div>
                    @else
                        <div class="card-body">
                            <h6 class="card-title text-truncate">📎 {{ $item['name'] }}</h6>
                            <a href="{{ asset('docs/' . $item['link']) }}" target="_blank" class="btn btn-sm btn-outline-dark w-100">Descargar</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
