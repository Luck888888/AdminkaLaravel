@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новый продукт</h1>
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
                        <h3 class="card-title">Новый продукт</h3>
                    </div>
                    <!-- /.card-header -->

                    <form role="form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="art">Артикул</label>
                                <input type="text" name="art"
                                       class="form-control @error('art') is-invalid @enderror" id="art"
                                       placeholder="Артикул">
                            </div>

                            <div class="form-group">
                                <label for="name">Название</label>
                                <textarea name="name" class="form-control @error('name') is-invalid
                                @enderror" id="name" rows="3" placeholder="Название"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="data">Данные</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        Color:
                                    </div>
                                    <div class="col-md-4">
                                        Size:
                                    </div>
                                </div>
                                @for ($i=0; $i <= 1; $i++)
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="data[{{ $i }}][key]" class="form-control" value="{{ old('data['.$i.'][key]') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="data[{{ $i }}][value]" class="form-control" value="{{ old('data['.$i.'][value]') }}">
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="form-group">
                                <label for="status">Выберите статус продукта</label>
                                <select name="status" class="form-control @error('status') is-invalid
                                @enderror">
                                    <option value="available">available</option>
                                    <option value="unavailable">unavailable</option>
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
        </div>
        </section>
@endsection
