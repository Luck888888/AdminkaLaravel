@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование продукта</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product "{{ $product->name }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('products.update', ['product'=>$product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="art">Артикул</label>
                                    <input type="text" name="art"
                                           class="form-control @error('art') is-invalid @enderror" id="art"
                                           value="{{ $product->art }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <textarea name="name" class="form-control @error('name') is-invalid
                                @enderror" id="name" rows="3">{{ $product->name }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="data">Данные</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            Key:
                                        </div>
                                        <div class="col-md-4">
                                            Value:
                                        </div>
                                    </div>
                                    @for ($i=0; $i <= 1; $i++)
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" name="data[{{ $i }}][key]" class="form-control"
                                                       value="{{ $product->data[$i]['key'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="data[{{ $i }}][value]" class="form-control"
                                                       value="{{ $product->data[$i]['value'] ?? '' }}">
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="form-group">
                                    <label for="status">Выберите статус продукта</label>
                                    <select name="status" id="status" class="form-control
                                          @error('status') is-invalid
                                @enderror">
                                        <option {{ $product->status == 'available' ? 'selected':'' }}>available</option>
                                        <option {{ $product->status == 'unavailable' ? 'selected':'' }}>unavailable</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

