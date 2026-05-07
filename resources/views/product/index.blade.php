@extends('template')

@section('title', 'Daftar Product')

@section('content')

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-10">

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">

                <span>{{ session('msg') }}</span>

                <a href="{{ route('product.create') }}"
                   class="btn btn-primary">
                    Tambah
                </a>

            </div>

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Variant</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($products as $d)

                    <tr>

                        <td>{{ $d->name }}</td>

                        <td>{{ $d->price }}</td>

                        <td>

                            @foreach($d->variants as $v)

                                {{ $v->name }} <br>

                            @endforeach

                        </td>

                        <td>

                            <a href="{{ route('product.edit', $d->id) }}"
                               class="btn btn-sm btn-primary">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('product.destroy', $d->id) }}"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection