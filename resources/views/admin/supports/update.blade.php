<h1>Dúvida {{ $support->id }}</h1>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input type="text" value="{{ $support->subject }}" placeholder="Assunto" name="subject">
    <textarea name="body" cols="30" rows="5">{{ $support->body }}</textarea>
    <button type="submit">Salvar</button>
</form>