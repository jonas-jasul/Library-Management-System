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
                            <h5 class="card-title">Total Publishers:</h5>
                            <p class="card-text pt-2">{{ $publishers}}</p>
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
                            <h5 class="card-title">Total Authors::</h5>
                            <p class="card-text pt-2">{{ $authors }}</p>
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
                <div class="col-md-3 pt-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                        <h5 class="card-title">Total Users:</h5>
                            <p class="card-text pt-2">{{ $users }}</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pt-3">
                    <div class="card card-dash">
                        <div class="card-body-dash text-center">
                         <h5 class="card-title">Total Books Issued:</h5>
                            <p class="card-text pt-2">{{ $issued_books }}</p>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </x-slot>

</x-app-layout>
