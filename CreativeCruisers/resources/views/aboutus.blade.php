<!--@extends('header')-->
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/aboutus.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_details.css') }}" />

<div class="aboutusbody">
    
        <img src="/images/logo.png" >
        <p>Creative Cruisers is more than just a brand; it's a sanctuary for the imaginative and daring souls who seek to express themselves through the art of crafting bespoke masterpieces. At Creative Cruisers, we believe in empowering individuals to unleash their creativity and channel their unique designs onto custom boards that reflect their personality, style, and spirit of adventure.</p>
        <p>Our ethos is built upon the idea that every board tells a story, and we provide the canvas for individuals to narrate their tales through vibrant colors, intricate patterns, and innovative designs. Whether you're a seasoned rider or just starting your journey, Creative Cruisers offers a platform for self-expression and exploration on the roads.</p>
        <p>Join us at Creative Cruisers and embark on a journey of creativity, freedom, and self-discovery as you craft your own unique masterpiece and ride the roads in style. Let your imagination run wild, and let your board be your canvas as you express yourself and leave your mark on the world of skating.</p>
        
        <form class="contactusform" method="POST" action="{{ url('aboutus') }}">
                {{ csrf_field() }}
                <h2>Contact us </h2>
                <label for="name" class="label">{{ __('Name') }}</label>
                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" required autocomplete="name" autofocus>
                <label for="email" class="label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" required autocomplete="name" autofocus>
                <label for="text" class="label">Review</label>
                <textarea placeholder="review"  id="review" name="review" type="text" class="review_input @error('review') is-invalid @enderror" required></textarea>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>




</div>





@include('footer')
@endsection