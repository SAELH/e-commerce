@extends('layouts.app')

@section('content')

        <!-- Cars -->
    <div class="container my-5">
        <h2 class="text-center mb-4">السيارات المتوفرة</h2>

        <div class="row g-4">

            @foreach ($carCategories as $item)
                
            @endforeach
            <!-- Car 1 -->
            <div class="col-md-4">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">تويوتا كامري 2023</h5>
                <p class="card-text">السعر: 95,000 ريال</p>
                <button class="btn btn-danger w-100">احجز الآن</button>
                </div>
            </div>
            </div>

        </div>
    </div>


@endsection