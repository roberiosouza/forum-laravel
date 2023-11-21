<h1>Detalhes da dúvida</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
</ul>

<form action="{{ route('supports.delete', $support->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>