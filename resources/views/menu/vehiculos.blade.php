@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a href="{{ route('vehiculo.create') }}">
        <x-adminlte-button label="Añadir vehiculo" />
    </a>

    <div class="contact-body">
        <div data-simplebar class="nicescroll-bar">
            <div class="contact-list-view">
                <table id="datable_1" class="table nowrap w-100 mb-5">
                    <thead>
                        <tr>
                            <th><span class="form-check mb-0">
                                    <input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
                                    <label class="form-check-label" for="customCheck1"></label>
                                </span></th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>año</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehiculos as $vehiculo)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="contact-star marked"><span class="feather-icon"><i
                                                    data-feather="star"></i></span></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="d-block text-high-em">{{ $vehiculo->marca }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">{{ $vehiculo->modelo }}</td>
                                <td class="text-truncate">{{ $vehiculo->anio }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-icon btn-warning btn-rounded flush-soft-hover btn-sm ms-1"
                                            data-bs-toggle="tooltip" data-placement="top" title="Editar"
                                            href="{{ route('vehiculo.edit', ['vehiculo' => $vehiculo]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-icon btn-success btn-rounded flush-soft-hover btn-sm ms-1"
                                            data-bs-toggle="tooltip" data-placement="top" title="Ver" href="">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-icon btn-danger btn-rounded flush-soft-hover btn-sm"
                                            data-bs-toggle="tooltip" data-placement="top" title="Eliminar"
                                            href="{{ route('vehiculo.destroy', ['vehiculo' => $vehiculo]) }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    </div>



                                    {{-- <div class="dropdown">
                                    <button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit Contact</span></a>
                                        <a class="dropdown-item" href=""><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
                                        <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="copy"></i></span><span>Duplicate</span></a>
                                    </div>
                                </div> --}}
            </div>
            </td>
            </tr>
            @endforeach


            </tbody>
            </table>
        </div>
    </div>
    </div>





@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
