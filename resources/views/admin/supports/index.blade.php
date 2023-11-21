<h1>Listagem dos Suportes</h1>
<a href="{{ route('supports.create') }}">Criar Dúvida</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Editar</th>
        <th>Detalhes</th>
    </thead>
    <tbody>
        @foreach($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.showUpdate', $support->id) }}">Editar</a>
                </td>
                <td>
                    <a href="{{ route('supports.detail', $support->id) }}">Detalhes</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>