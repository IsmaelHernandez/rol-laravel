@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- Boton nuevo --}}
                            @can('crear-blog')
                            <a class="btn btn-warning" href="{{route('blogs.create')}}">Nuevo</a>
                            @endcan
                            {{-- table --}}
                            <table class="table table-striped mt-2">
                                <thead class="bg-info">
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Contenido</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->titulo}}</td>
                                        <td>{{$blog->contenido}}</td>

                                        <td>
                                            @can('editar-blog')
                                                <a class="btn btn-info" href="{{route('blogs.edit', $blog->id)}}">Editar</a>
                                            @endcan
                                            {{-- boton que ya hace submit --}}
                                            @can('borrar-blog')
                                            {!! Form::open(['method'=>'DELETE','route'=>['blogs.destroy', $blog->id], 'style'=>'display:inline']) !!}
                                                {!! Form::submit('borrar',['class'=>'btn btn-danger'])!!}
                                            @endcan
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="pagination justify-content-end">
                                {!! $blogs->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

