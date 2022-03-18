@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-sm-12">

        <div class="card">
            <div class="card-header text-white text-bold text-lg-left h3" style="background-color:#3C4B64;">
                User List
            </div>
            <div class="card-body">
                <span class="text-success">
                @if (session('success'))
                    <i class="bi bi-check2-all">{{ session('success') }}</i>
                @endif
            </span>
                <table class="table table-bordered table-md">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">{{ __('lang.S.N') }}</th>
                            <th scope="col">{{ __('lang.userName') }}</th>
                            <th scope="col">{{ __('lang.email') }}</th>
                            <th scope="col">{{ __('lang.Role') }}</th>
                            <th scope="col" colspan="2" class="text-center">{{ __('lang.operation') }}</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($members as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->role }}</td>
                                <td><a href="{{ route('user.edit', $user->id) }}"><i
                                            class="bi bi-pencil-square text-success"></i></a></td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are You Sure')"
                                            class="btn btn-sm"><i class="bi bi-trash-fill text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-danger">Member Not Found.</td>
                            </tr>
                        @endforelse



                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
