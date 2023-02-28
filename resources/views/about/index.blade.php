@extends('layouts.app')

@section('title', 'About Me')
@section('content')

<div class="container">
    <div class="mx-auto bg-light shadow-lg m-20 p-10 text-center">
        <img src="{{ asset('assets/images/about.png') }}" class="rounded-circle mx-auto my-4 img-about" alt="avatar"/>
        <h1>Bayu Samodera</h1>
        <p class="mb-4">Web Programmer</p>
        <p class="mb-3">Hello, I'm Bayu. i'm a web developer and programmer living in Jakarta, Indonesia. 
            I make an application, usually with php. <br> You can find out more about me in the following links:</p>

            <a style="color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram fa-2x mb-5"></i></a>
            <a style="color: #1969D6;" href="#!" role="button"><i class="fab fa-facebook fa-2x m-3"></i></a>
            <a style="color: #36E048 ;" href="#!" role="button"><i class="fab fa-whatsapp fa-2x"></i></a>
    </div>
</div>
@endsection