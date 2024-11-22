@extends('template.index')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th>email</th>
                            <th scope="col">mobil</th>
                            <th scope="col">reviw</th>
                            <th>rating</th>
                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr class="">
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$item->user->email}}</td>
                            <td>{{$item->car->name}}</td>
                            <td>{{$item->review}}</td>
                            <td>
                                @for ($i = 1; $i <= $item->rating; $i++)
                                <i class="fas fa-star text-warning"></i>
                                @endfor
                                @for ($i = $item->rating + 1; $i <= 5; $i++)
                                    <i class="far fa-star text-warning"></i>
                                @endfor
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-warning me-2">edit</button>
                                    <form action="{{route('review.destroy', $item->id) }}"" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <td class="text-center">tidak ada data</td>
                        @endforelse
                        <h1>halo dek</h1>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
@endsection
