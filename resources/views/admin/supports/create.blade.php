<x-alert />

<h1>Nova Dúvida</h1>
<form action="{{ route('supports.store') }}" method="POST">
    @include("admin/supports/partils/form")
</form>