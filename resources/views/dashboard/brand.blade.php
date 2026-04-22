@extends('layouts.app_dash')


@section('content')

  <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('add_brand') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">اسم الفئة</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">فئة السيارة</label>
                            <select type="text" class="form-select" name="type">
                                <option value="sedan">sedan</option>
                                <option value="suv">suv</option>
                                <option value="sport">sport</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الوصف</label>
                            <textarea class="form-control" name="description" row="3"></textarea>
                            @error('description')
                                <div class="invalid-feedbaCK text-danger"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الايقونه</label>
                            <input type="text" class="form-control" name="icons">
                            @error('icons')
                                <div class="invalid-feedbaCK text-danger"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title mb-0 fw-bold text-dark text-center w-100">الفئات المضافه</h5>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover align-middle">
                            <thead class="table-light">
                              <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>نوع الفئة</th>
                                <th>الوصف</th>
                                <th>ايقونة الفئة</th>
                                <th>الإجراءات</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($brands as $brand)
                              <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->type }}</td>
                                <td>{{ $brand->description }}</td>
                                <td><i class="bi {{ $brand->icons }} display-5"></i></td>
                                <td class="text-center">
                                  <div class="btn-group" role="group">
                                    <a href="{{ route('edit_brand',['id'=>$brand->id]) }}" 
                                        class="btn btn-outline-primary btn-sm" title="تعديل">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('delete_brand',['id'=>$brand->id]) }}" 
                                        class="btn btn-outline-danger btn-sm" 
                                        onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟')" title="حذف">
                                        <i class="bi bi-trash"></i>
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
        </div>
    </div>
  </div>

@endsection 