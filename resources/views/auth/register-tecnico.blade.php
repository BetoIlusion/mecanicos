

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<x-guest-layout>
    <form method="POST" action="{{ route('taller.tecnicoStore') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre Titular')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <br>
        <!-- Name de empresa -->
        <div>
            <x-input-label for="name" :value="__('Apellido')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>
        <br>
        <!-- Número de teléfono de la empresa -->
        <div>
            <x-input-label for="phone" :value="__('Telefono')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone_empresa" :value="old('phone')"
                required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Carnet de identidad de la empresa -->
        <div>
            <x-input-label for="carnet_identidad" :value="__('Carnet de Identidad')" />
            <x-text-input id="carnet_identidad" class="block mt-1 w-full" type="text" name="ci"
                :value="old('carnet_identidad')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('carnet_identidad')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <input type="hidden" name="rol" value="Tecnico">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <h1>este es el registro de tecnico</h1>
    </form>
</x-guest-layout>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
