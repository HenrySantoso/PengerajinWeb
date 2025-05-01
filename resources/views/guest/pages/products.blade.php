@extends('guest.layouts.main')
@section('title', 'Berbagai Macam Produk')
@section('content')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Temukan Produk Favoritmu!</h2>
                        <span>Pilihan lengkap & harga terbaik hanya di toko kami</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('guest-singleProduct', $produk->slug) }}"><i class="fa fa-eye"></i></a>
                                        </li>
                                        <li><a href=""><i class="fa fa-star"></i></a></li>
                                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('storage/' .  $produk->fotoProduk->first()->file_foto_produk) }}" alt="{{ $produk->nama_produk }}">
                            </div>
                            <div class="down-content">
                                <h4>{{ $produk->nama_produk }}</h4>
                                <span>Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                <ul class="stars">
                                    @for ($i = 0; $i < 5; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul>
                                <p>{{ $produk->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection
