@extends('layouts.app')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'TrueTech') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('bar')}}">Bar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('doughnut')}}">Doughnut</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('pie')}}">Pie</a>
              </li>
            </ul>
          </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <h4 style="text-align: center">Sales expenses for yesterday</h4>

                    </div>
                    <div class="card">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Shifts</th>
                                <th scope="col">Branche Name</th>
                                <th scope="col">Sales</th>
                                <th scope="col">Expenses</th>
                                <th scope="col">Net</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $key =>  $item)


                              <tr>
                                <td scope="row">{{$key+1}}</td>
                                <td scope="row">{{$item->date}}</td>
                                <td scope="row">{{$item->date}}</td>
                                <td scope="row">{{$item->name}}</td>
                                <td scope="row">{{$item->sales}}</td>
                                <td scope="row">{{$item->expenses}}</td>
                                <td scope="row">{{$item->sales - $item->expenses}}</td>
                              </tr>

                              @endforeach
                              <tr>
                                <td scope="row">9</td>
                                <td scope="row">Total Sales</td>
                                <td scope="row">{{$total_sales}}</td>
                                <td scope="row">Total Expenses</td>
                                <td scope="row">{{$total_expenses}}</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <div class="card">
                </div>
            </div>
        </div>
    </div>
</div>
