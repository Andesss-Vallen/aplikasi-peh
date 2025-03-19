@extends('tataletak.app')

@section('title', 'Data Kuliner Nusantara')

@section('content')
    <div class="container my-5">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-4">
                <h3>Makes your moment <br> looks epic.</h3>
                <img src="{{ asset('img/img2.jpg') }}" alt="Couple Holding Hands" class="img-fluid">
                <p>Every detail, tears, and moment is more precious than any jewelry in the world.</p>
            </div>

            <!-- Kolom Tengah (Gambar Besar) -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/img1.jpg') }}" alt="Bride and Groom" class="img-fluid">
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-4">
                <h3>Hello, We are pehpotret.</h3>
                <img src="{{ asset('img/img3.jpg') }}" alt="Wedding Rings" class="img-fluid">
                <p>Their moment is more precious than any jewelry in the world.</p>
            </div>
        </div>
    </div>
@endsection
