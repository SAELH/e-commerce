@extends('layouts.app_dash')


@section('content')

    <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('add_car') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">اسم السيارة</label>
                            <input type="text" class="form-control" name="model_name">
                            @error('model_name')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">سعر السيارة</label>
                            <input type="text" class="form-control" name="price">
                            @error('price')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">لون السيارة</label>
                            <input type="text" class="form-control" name="color">
                            @error('color')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">سنة الصنع</label>
                            <input type="text" class="form-control" name="year">
                             @error('year')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ممشى السيارة</label>
                            <input type="text" class="form-control" name="mileage">
                            @error('mileage')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">فئة السيارة</label>
                            <select name="brand_id" class="form-select">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">صورة السيارة</label>
                            <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg,.gif,.webp,.pdf">
                            @error('image')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0 fw-bold text-dark text-center w-100">أسطول السيارات المسجلة</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>السيارة</th>
                                            <th>السعر</th>
                                            <th>التفاصيل</th>
                                            <th>الصورة</th>
                                            <th>فئة السيارة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cars as $car)
                                        <tr>
                                            <td class="fw-bold text-muted">{{ $car->id }}</td>
                                            <td>
                                                <div class="fw-bold text-primary">{{ $car->model_name }}</div>
                                            </td>
                                            <td class="fw-bold text-success text-nowrap">{{ number_format($car->price) }} ريال</td>
                                            <td>
                                                <div class="small">اللون: <span class="text-muted">{{ $car->color }}</span></div>
                                                <div class="small">الموديل: <span class="text-muted">{{ $car->year }}</span></div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('images/'.$car->image) }}" 
                                                    class="img-thumbnail rounded-3 shadow-sm" 
                                                    style="width: 80px; height: 50px; object-fit: cover;"
                                                    alt="{{ $car->model_name }}">
                                            </td>
                                            <td>{{ $car->name }}</td>
                                            <td class="text-center">
                                                <div class="btn-group shadow-sm" role="group">
                                                    <a href="{{ route('edit_car', ['id' => $car->id]) }}" class="btn btn-outline-primary btn-sm" title="تعديل">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="{{ route('delete_car',['id'=>$car->id]) }}" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    onclick="return confirm('هل أنت متأكد من حذف هذه السيارة؟')" title="حذف">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection