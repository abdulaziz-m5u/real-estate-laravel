<x-mail::message>
# New Information

{{$messages}}

<x-mail::button :url="''">
    Link
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>