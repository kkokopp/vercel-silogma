<x-mail::message>
# Account Created
    
Akun anda telah berhasil dibuat.
    
Password anda adalah : {{ $password }}
    
Silahkan login dengan menggunakan email yang anda daftarkan dan password tersebut.

<x-mail::button :url="url('/login')">
            Login
</x-mail::button>
        
Terimakasih!
</x-mail::message>
