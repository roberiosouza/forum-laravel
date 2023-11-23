<x-alert />

<h1>Dúvida {{ $support->id }}</h1>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include("admin/supports/partils/form",
        [
            'subject' => $support->subject,
            'body' => $support->body
        ]
    )
</form>