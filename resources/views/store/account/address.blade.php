@extends('store.account.index')

    @section('data')

            <h3>Dados de Entrega</h3>

            <div class="col-lg-9">
            <table class="table">
                <tbody>
                <tr>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Cidade</th>
                    <th>País</th>
                    <th>Ação</th>
                </tr>
                @forelse($address as $addr)
                <tr>
                    <td>{{ $addr->zip_code }}</td>
                    <td>{{ $addr->street }}</td>
                    <td>{{ $addr->city }}</td>
                    <td>{{ $addr->country }}</td>
                    <td><a href="{{ route('account_address_edit', ['id' => $addr->id]) }}" title="Editar" >Atulizar</a></td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5"><h2>Endereço não cadastrado, Por favor <a href="{{ route('account_address_new') }}" title="" class="btn-link">cadastre-se</a></h2></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            </div>
@stop