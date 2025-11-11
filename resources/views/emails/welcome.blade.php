<x-mail::message>
# Selamat Datang, {{ $user->name }}!

Terima kasih telah bergabung dengan Studivine. Berikut adalah ringkasan data pendaftaran Anda:

<x-mail::panel>
**Nama:** {{ $user->name }}
**Email:** {{ $user->email }}
**Tanggal Pendaftaran:** {{ $user->created_at->format('d M Y') }}
</x-mail::panel>

Mari berkembang bersama Studvine!

<x-mail::button :url="url('/')">
Kunjungi Studivine
</x-mail::button>

Hormat kami,<br>
Tim {{ config('app.name') }}
</x-mail::message>