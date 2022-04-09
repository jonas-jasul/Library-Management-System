@extends("layouts.dash")
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-5">
            {{ __('Dashboard') }}
        </h2>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                            <h5 class="card-title">Total Authors:</h5>
                            <p class="card-text pt-2">{{ $authors }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                            <h5 class="card-title">Total Publishers:</h5>
                            <p class="card-text pt-2">{{ $publishers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                            <h5 class="card-title">Total Categories:</h5>
                            <p class="card-text pt-2">{{ $categories }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                            <h5 class="card-title">Total Books:</h5>
                            <p class="card-text pt-2">{{ $books }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                            <p class="card-text">{{ $users }}</p>
                            <h5 class="card-title mb-0">Total Users:</h5>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                            <p class="card-text">{{ $issued_books }}</p>
                <h5 class="card-title mb-0">Book Issued</h5>
            </div>
        </div>
        </div> --}}
        </div>
        </div>
        </div>

    </x-slot>

</x-app-layout>
