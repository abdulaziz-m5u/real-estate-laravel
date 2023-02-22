@extends('layouts.frontend')

@section('header')
<header class="header" id="header">
      <nav class="nav container">
        <div class="nav__logo">
          <a href="{{ route('homepage') }}"
            >Ho<span>mie</span> <i class="bx bxs-home-heart"></i>
          </a>
        </div>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#home" class="nav__link active-link"> Home </a>
            </li>
            <li class="nav__item">
              <a href="#about" class="nav__link"> About </a>
            </li>
            <li class="nav__item">
              <a href="#blog" class="nav__link"> Blog </a>
            </li>
            <li class="nav__item">
              <a href="#contact" class="nav__link"> Contact </a>
            </li>
          </ul>
          <div class="nav__close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
        </div>
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-menu"></i>
        </div>
      </nav>
    </header>
@endsection

@section('content')
 <section class="home section" id="home">
        <div class="home__container container grid">
          <div class="home__data">
            <h1 class="home__title">Helping people get their dream home</h1>
            <p class="home__description">
              Find a different of home that comportable for you
              <br class="home__br" />
              forget the hard thing about finding great home
            </p>

            @if(session()->has('message'))
              <div class="alert" style="text-align: center;position: relative;margin-bottom: .5rem;padding: .5rem;border-radius: .25rem;background-color: lightgreen;color: green;" class="alert">
                {{session()->get('message')}}
                <i id="hide" style="font-size: 1.5rem;cursor: pointer;position: absolute;top: .25rem;right: .25rem;" class='bx bx-x'></i>
              </div>
            @endif

            <form action="{{ route('subscribers.store') }}" method="post" class="home__search">
              @csrf 
              <input
                type="search"
                placeholder="Enter your email..."
                class="home__search-input"
                name="email"
                value="{{old('email') }}"
              />
              <button type="submit" class="button">Subscribe</button>
            </form>
          </div>
          <div class="home__images">
            <div class="home__orbe"></div>

            <div class="home__img">
              <img src="{{ asset('frontend/assets/images/home.jpg')}}" alt="" />
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle">Best Categories</span>
          <h2 class="section__title">Explore categories<span>.</span></h2>

          <div class="popular__container grid">
            @foreach($categories as $category)
                <article class="popular__card">
                <img
                    src="{{ Storage::url($category->banner) }}"
                    alt=""
                    class="popular__img"
                />
                <div class="popular__data">
                    <h3 class="popular__title">{{ $category->name }}</h3>
                    <span class="popular__description"> {{$category->properties->count()}} Properties </span>
                </div>
                </article>
            @endforeach
          </div>
        </div>
      </section>

      <section class="section" id="property">
        <div class="container">
          <span class="section__subtitle">Best Choice</span>
          <h2 class="section__title">Popular Property<span>.</span></h2>

          <div class="property__container grid">
            @foreach($properties as $property)
                <article class="property__card">
                <a href="{{ route('detail', $property->slug)}}">
                    <div class="property__images">
                    <img
                        src="{{ Storage::url($property->galleries()->first()->photo) }}"
                        alt=""
                        class="property__img"
                    />
                    <span class="property__badge">{{ $property->category->name}} </span>
                    </div>
                    <div class="property__data">
                    <h2 class="property__price"><span>$</span>{{ $property->price }}</h2>
                    <h3 class="property__title">{{ $property->name }}</h3>
                    <span class="property__description">
                        {{ $property->address }}</span
                    >
                    </div>
                </a>
                </article>
            @endforeach
          </div>
        </div>
      </section>

      <section class="subscribe section">
        <div class="subscribe__container container">
          <h2 class="subscribe__title">
            Start listing or buying a <br />
            property with us
          </h2>

          <a href="#" class="button subscribe__button">Get Started </a>
        </div>
      </section>
@endsection

@push('style-alt')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/homepage.css')}}" />
<style>
        .hide {
            display: none;
        }
    </style>
@endpush

@push('script-alt')
<script>
   const hideButton = document.getElementById('hide');
    const alert = document.querySelector('.alert');
    if(hideButton && alert) {
        hideButton.addEventListener('click', () => {   
            alert.classList.add('hide');
        })
    }
</script>
 <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
@endpush