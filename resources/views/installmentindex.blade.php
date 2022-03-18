@extends('layouts.app')

@section('content')

    <div class="col-md-10 col-sm-12">
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr class="table-success">
                    <th scope="col">SN</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Loan Date</th>
                    <th scope="col">Installment Amount</th>

                    <th scope="col">Installment Date</th>
                    <th scope="col" colspan="2" class="text-center">Actios</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                @forelse ($customer as $customers)
                    <tr>
                        <td>{{ $counter++ }}</td>

                        <td class="text-dark">{{ $customers->cname }}</td>

                        <td>{{ $customers->loan->loanDate }}</td>
                        <td>
                            @foreach ($customers->installment as $installments)
                                <li class="list-unstyled pt-2 text-decoration-underline text-success">
                                    {{ $installments->amount }}</li>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($customers->installment as $installments)
                                <li class="list-unstyled pt-2">{{ $installments->installmentDate }}</li>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($customers->installment as $installments)
                                <li class="list-unstyled pt-2"> <a
                                        href="{{ route('installment.edit', $installments->id) }}"><i
                                            class="bi bi-pencil-square text-success"></i></a></li>
                            @endforeach
                        <td>
                            @foreach ($customers->installment as $installments)
                                <li class="list-unstyled pt-2">
                                    <form action="{{ route('installment.destroy', $installments->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are You Sure')"
                                            class="btn btn-sm"><i class="bi bi-trash-fill text-danger"></i></button>
                                    </form>
                                </li>
                            @endforeach
                        </td>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-danger">Member Not Found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $customer->links() }}
    </div>
@endsection
